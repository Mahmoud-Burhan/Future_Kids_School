<?php


namespace App\Repository\OnlineClasses;


use App\Http\Traits\MeetingZoomTrait;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\OnlineClass;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MacsiDigital\Zoom\Facades\Zoom;


class OnlineClassesRepository implements OnlineClassesRepositoryInterface
{
    use MeetingZoomTrait;
    public function index()
    {
        $data['online_classes'] = OnlineClass::where('created_by',auth()->user()->email)->get();
        return view('pages.online_classes.index',$data);
    }

    public function create()
    {
        $data['grades'] = Grade::all();
        return view('pages.online_classes.create',$data);
    }

    public function getClassroom($id)
    {
       $classroom = Classroom::where('grade_id',$id)->pluck('class_name','id');
       return $classroom;
    }

    public function getSections($id)
    {
       $sections = Section::where('classroom_id',$id)->pluck('section_name','id');
       return $sections;
    }

    public function store($request)
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
            return redirect()->route('OnlineClasses.index');
        }
        catch (\Exception $ex)
        {
            return $ex;
            DB::rollBack();
            return redirect()->route('OnlineClasses.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
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
            return redirect()->route('OnlineClasses.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('OnlineClasses.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function indirectCreate()
    {
        $data['grades'] = Grade::all();
        return view('pages.online_classes.indirect',$data);
    }

    public function indirectStore($request)
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
            return redirect()->route('OnlineClasses.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('OnlineClasses.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}