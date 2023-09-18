<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\LibraryTrait;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSettingController extends Controller
{
    use LibraryTrait;
    public function index()
    {
        $info = Teacher::where('id',auth()->user()->id)->first();
        $data['folder_name'] = pathinfo($info->file_name,PATHINFO_FILENAME);
        $data['information'] = Teacher::where('id',auth()->user()->id)->first();

        return view('pages.teachers.dashboard.settings.index',$data);
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $teacher = Teacher::findorfail($id);
            $old_name = $teacher->file_name;

            if ($request->hasfile('file_name')) {
                $this->editUploadFile($request, $old_name,'Teacher');
                $this->uploadFile($request, 'file_name','Teacher');
                $teacher->file_name = $request->file('file_name')->getClientOriginalName();
                $teacher->save();
            }

            if (!empty($request->password)) {
                $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                $teacher->password = Hash::make($request->password);
                $teacher->save();
            } else {
                $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
                $teacher->save();
            }
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('setting.index');
        } catch (\Exception $ex) {
            return $ex;
            DB::rollBack();
            return redirect()->route('setting.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
