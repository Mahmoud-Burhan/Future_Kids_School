<?php


namespace App\Repository\Library;


use App\Http\Traits\LibraryTrait;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Library;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use File;

class LibraryRepository implements LibraryRepositoryInterface
{
    use LibraryTrait;

    public function index()
    {
        $libraries = Library::all();
        return view('pages.library.index', compact('libraries'));
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        $data['teachers'] = Teacher::all();
        return view('pages.library.create', $data);
    }

    public function store($request)
    {

        DB::beginTransaction();
        try {
            $library = new Library();
            $library->title = $request->title;
            $library->file_name = $request->file('file_name')->getClientOriginalName();
            $library->grade_id = $request->grade_id;
            $library->classroom_id = $request->classroom_id;
            $library->section_id = $request->section_id;
            $library->teacher_id = $request->teacher_id;
            $library->save();

            $this->uploadFile($request, 'file_name','Library');
            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('Library.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('Library.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data['libraries'] = Library::findorfail($id);
        $data['grades'] = Grade::all();
        $data['teachers'] = Teacher::all();
        return view('pages.library.edit', $data);
    }

    public function update($request, $id)
    {

        DB::beginTransaction();
        try {
            $library = Library::findorfail($request->id);

            $old_name = $library->file_name;

            if ($request->hasfile('file_name')) {
                $this->editUploadFile($request, $old_name,'Library');
                $this->uploadFile($request, 'file_name','Library');
            }
            $library->title = $request->title;
            $library->file_name = $request->file('file_name')->getClientOriginalName();
            $library->grade_id = $request->grade_id;
            $library->classroom_id = $request->classroom_id;
            $library->section_id = $request->section_id;
            $library->teacher_id = $request->teacher_id;
            $library->save();
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('Library.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('Library.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function download_attachment($id, $file_name)
    {

        try {
            $library = Library::findorfail($id);
            if ($library) {
                return $this->download($file_name,'Library');
            }
        } catch (\Exception $ex) {

            return redirect()->route('Library.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function display_attachment($id, $file_name)
    {
        try {
            $library = Library::findorfail($id);
            if ($library) {
                return $this->display($file_name,'Library');
            }
        } catch (\Exception $ex) {

            return redirect()->route('Library.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function delete_all($request)
    {
        DB::beginTransaction();
        try {
            $library = Library::findorfail($request->id);
            if($library)
            {
                $this->delete_attachment($request->file_name,'Library');
                $library->delete();
            }
            DB::commit();
            toastr()->success('messages.Delete');
            return redirect()->route('Library.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('Library.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }
}