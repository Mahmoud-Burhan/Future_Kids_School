<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestAttendanceReportRequest;
use App\Models\Attendance;
use App\Models\Classroom;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $section_id = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['students'] = Student::whereIn('section_id', $section_id)->get();
        return view('pages.teachers.dashboard.students.student', $data);
    }


    public function sections()
    {
        $section_id = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['sections'] = Section::whereIn('id', $section_id)->get();
        $data['students'] = Student::all();
        return view('pages.teachers.dashboard.sections.section', $data);
    }

    public function student_attendance($grade_id, $classroom_id, $section_id)
    {
        $data['students'] = Student::where('grade_id', $grade_id)->where('classroom_id', $classroom_id)->where('section_id', $section_id)->get();
        return view('pages.teachers.dashboard.attendance.index', $data);
    }

    public function store_attendance(Request $request)
    {
        DB::beginTransaction();
        try {
            $date = date('Y-m-d');
            foreach ($request->attendance as $student_id => $attendance) {
                if ($attendance == 'present') {
                    $attendance_status = true;
                } elseif ($attendance == 'absent') {
                    $attendance_status = false;
                }

                Attendance::updateorCreate(
                    [
                        'student_id' => $student_id,
                        'attendance_date' => $date,
                    ],
                    [

                        'student_id' => $student_id,
                        'grade_id' => $request->grade_id,
                        'classroom_id' => $request->classroom_id,
                        'section_id' => $request->section_id,
                        'teacher_id' => auth()->user()->id,
                        'attendance_status' => $attendance_status,

                    ]
                );
            }
            DB::commit();
            toastr()->success(trans('messages.Success'));
            return redirect()->back();
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors([['error' => $ex->getMessage()]]);
        }
    }

    public function attendance_report()
    {
        try
        {
            $section = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['sections'] = Section::whereIn('id',$section)->get();
            $data['students'] =Student::where('section_id',$section)->get();
            $get_classroom = Section::distinct()->whereIn('id',$section)->pluck('classroom_id');
            $data['classrooms'] = Classroom::whereIn('id',$get_classroom)->get();

            return view('pages.teachers.dashboard.attendance.attendance_report',$data);

        } catch (\Exception $ex) {
            return redirect()->back()->withErrors([['error' => $ex->getMessage()]]);
        }

    }

    public function getTeacherSection($id)
    {
        $section = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $sections = Section::whereIn('id',$section)->where('classroom_id',$id)->pluck('section_name','id');
        return $sections;
    }



    public function attendanceSearch(RequestAttendanceReportRequest $request)
    {
        $validated = $request->validated();
        try
        {
            $section = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
            $data['sections'] = Section::whereIn('id',$section)->get();
            $data['students'] =Student::where('section_id',$section)->get();
            $get_classroom = Section::distinct()->whereIn('id',$section)->pluck('classroom_id');
            $data['classrooms'] = Classroom::whereIn('id',$get_classroom)->get();

            if($request->student_id == 0)
            {
                $data['attendances']= Attendance::where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->whereBetween('attendance_date',[$request->from,$request->to])->orderBy('attendance_date','ASC')->get();
                return view('pages.teachers.dashboard.attendance.attendance_report',$data);
            }
            else
            {

                $data['attendances']= Attendance::where('student_id',$request->student_id)->where('classroom_id',$request->classroom_id)->where('section_id',$request->section_id)->whereBetween('attendance_date',[$request->from,$request->to])->get();
                return view('pages.teachers.dashboard.attendance.attendance_report',$data);
            }

        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withErrors([['error' => $ex->getMessage()]]);
        }

    }

}
