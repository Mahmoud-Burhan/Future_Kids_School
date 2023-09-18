<?php


namespace App\Repository\Teacher;


use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class TeacherRepository implements TeacherRepositoryInterface
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('pages.teachers.teacher',compact('teachers'));
    }

    public function create()
    {
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('pages.teachers.add_teacher',compact('specializations','genders'));
    }

    public function store($request)
    {
        try {
            $teacher = new Teacher();
            $teacher->email = $request->email;
            $teacher->password= Hash::make($request->password);
            $teacher->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success('messages.Success');
            return redirect()->route('Teacher.index');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['errors' => $ex->getMessage()]);
        }
    }

    public function edit($id)
    {

        $teachers = Teacher::findorfail($id);
        $specializations = Specialization::all();
        $genders = Gender::all();
        return view('pages.teachers.edit_teacher',compact('teachers','specializations','genders'));
    }

    public function update($request, $id)
    {
        try {
            $teacher = Teacher::findorfail($request->id);
            $teacher->email = $request->email;
            $teacher->password= Hash::make($request->password);
            $teacher->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->joining_date = $request->joining_date;
            $teacher->address = $request->address;
            $teacher->save();
            toastr()->success('messages.Update');
            return redirect()->route('Teacher.index');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['errors' => $ex->getMessage()]);
        }
    }
    public function destroy($request, $id)
    {
        try {
            Teacher::findorfail($request->id)->delete();
            toastr()->success('messages.Delete');
            return redirect()->route('Teacher.index');
        } catch (\Exception $ex) {
            return redirect()->back()->withErrors(['errors' => $ex->getMessage()]);
        }
    }
}