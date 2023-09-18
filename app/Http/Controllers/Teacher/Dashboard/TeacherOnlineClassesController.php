<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoomTrait;
use App\Models\Grade;
use App\Models\OnlineClass;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use MacsiDigital\Zoom\Facades\Zoom;

class TeacherOnlineClassesController extends Controller
{

    use MeetingZoomTrait;

    public function index()
    {
        $data['online_classes'] = OnlineClass::where('created_by',auth()->user()->email)->get();
        return view('pages..teachers.dashboard.online_classes.index',$data);
    }


    public function create()
    {
        $getTeacher = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('grade_id');
        $data['grades'] = Grade::findorfail($getTeacher);
        return view('pages.teachers.dashboard.online_classes.create',$data);
    }


    public function getTeacherClasses($id)
    {
        $getTeacher = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('classroom_id');
        $classroom = Classroom::where('grade_id',$id)->whereIn('id',$getTeacher)->pluck('class_name','id');
        return $classroom;
    }

    public function getTeacherSection($id)
    {
        $getTeacher = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $sections = Section::where('classroom_id',$id)->whereIn('id',$getTeacher)->pluck('section_name','id');
        return $sections;
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $meeting =$this->createMeeting($request);
            OnlineClass::create(
                [
                    'integration'=>true,
                    'grade_id'=>$request->grade_id,
                    'classroom_id'=>$request->classroom_id,
                    'section_id'=>$request->section_id,
                    'created_by'=>auth()->user()->email,
                    'meeting_id'=>$meeting->id,
                    'topic'=>$request->topic,
                    'start_time'=>$request->start_time,
                    'duration'=>$meeting->duration,
                    'password'=>$meeting->password,
                    'start_url'=>$meeting->start_url,
                    'join_url'=>$meeting->join_url,
                ]
            );
            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('TeacherOnlineClasses.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('TeacherOnlineClasses.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy(Request $request, $id)
    {

        DB::beginTransaction();
        try
        {
            $check = OnlineClass::findorfail($request->id);
            if ($check->integration == true)
            {
                $meeting = Zoom::meeting()->find($request->meeting_id);
                $meeting->delete();
                OnlineClass::destroy($request->id);
            }
            else
            {
                OnlineClass::destroy($request->id);
            }

            DB::commit();
            toastr()->success('messages.Delete');
            return redirect()->route('TeacherOnlineClasses.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('TeacherOnlineClasses.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function teacherIndirectCreate()
    {
        $getTeacher = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('grade_id');
        $data['grades'] = Grade::findorfail($getTeacher);
        return view('pages.teachers.dashboard.online_classes.indirect',$data);
    }

    public function teacherIndirectStore(Request $request)
    {
        DB::beginTransaction();
        try
        {
            OnlineClass::create(
                [
                    'integration'=>false,
                    'grade_id'=>$request->grade_id,
                    'classroom_id'=>$request->classroom_id,
                    'section_id'=>$request->section_id,
                    'created_by'=>auth()->user()->email,
                    'meeting_id'=>$request->meeting_id,
                    'topic'=>$request->topic,
                    'start_time'=>$request->start_time,
                    'duration'=>$request->duration,
                    'password'=>$request->password,
                    'start_url'=>$request->start_url,
                    'join_url'=>$request->join_url,
                ]
            );
            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('TeacherOnlineClasses.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('TeacherOnlineClasses.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

}
