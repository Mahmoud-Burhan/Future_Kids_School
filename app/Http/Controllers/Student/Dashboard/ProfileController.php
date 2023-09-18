<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\LibraryTrait;
use App\Models\Images;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    use LibraryTrait;
    public function index()
    {
        $info = Images::where('imageable_id',auth()->user()->id)->first();
        $data['folder_name'] = pathinfo($info->file_name,PATHINFO_FILENAME);
        $data['information'] = Student::where('id',auth()->user()->id)->first();

        return view('pages.student.dashboard.settings.index',$data,compact('info'));
    }

    public function update(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $teacher = Student::findorfail($id);
            $old_name = $teacher->file_name;

            if ($request->hasfile('file_name')) {
                $this->editUploadFile($request, $old_name,'Student');
                $this->uploadFile($request, 'file_name','Student');
                $name = $request->file('file_name')->getClientOriginalName();


                Images::updateorcreate(
                    [
                        'imageable_id'=>$teacher->id,
                    ],
                    [
                         'file_name'=>$name,
                         'imageable_id'=>$teacher->id,
                         'imageable_type'=>'App\Models\Student',
                    ]
                );
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
            return redirect()->route('profile.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->route('profile.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }
}
