<?php


namespace App\Repository\StudentAttendance;


use App\Models\Attendance;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\TeacherSection;
use Illuminate\Support\Facades\DB;

class StudentAttendanceRepository implements StudentAttendanceRepositoryInterface
{
    public function index()
    {

        $data['grades'] = Grade::with(['Sections'])->get();
        return view('pages.attendance.index',$data);
    }

    public function show($id)
    {
        $data['students'] = Student::with(['Attendance'])->where('section_id',$id)->get();
        $data['teachers'] = TeacherSection::where('section_id',$id)->first();
        return view('pages.attendance.attendance_list',$data);
    }

    public function store($request)
    {
        DB::beginTransaction();
        try
        {


            foreach ($request->attendance as $student_id =>$attend)
            {
                if( $attend == 'presence' ) {
                    $attendance_status = true;
                } else if( $attend == 'absent' ){
                    $attendance_status = false;
                }

                Attendance::create([
                    'student_id'=> $student_id,
                    'grade_id'=> $request->grade_id,
                    'classroom_id'=> $request->classroom_id,
                    'section_id'=> $request->section_id,
                    'teacher_id'=> $request->teacher_id,
                    'attendance_date'=> date('Y-m-d'),
                    'attendance_status'=> $attendance_status
                ]);
            }
            DB::commit();
            toastr()->success('messages.Success');
            return redirect()->route('StudentAttendance.index');
        }
        catch (\Exception $ex)
        {
            DB::rollBack();
            return redirect()->route('StudentAttendance.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}