<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\degree;
use App\Models\Grade;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherQuizController extends Controller
{

    public function index()
    {
        //

        $data['quizzes'] = Quiz::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.dashboard.quizzes.index',$data);

    }

    public function create()
    {
        $getTeacher = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('grade_id');
        $data['grades'] = Grade::findorfail($getTeacher);
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        return view('pages.teachers.dashboard.quizzes.create',$data);
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
        try
        {
            Quiz::create(
                [
                    'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                    'subject_id'=>$request->subject_id,
                    'grade_id'=>$request->grade_id,
                    'classroom_id'=>$request->classroom_id,
                    'section_id'=>$request->section_id,
                    'teacher_id'=>auth()->user()->id,

                ]
            );
            toastr()->success('messages.Success');
            return redirect()->route('teacherQuiz.index');
        }
        catch (\Exception $ex)
        {

            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function show($id)
    {

        $data['quiz_id'] = $id;
        $data['questions'] = Question::where('quiz_id',$id)->get();
        return view('pages.teachers.dashboard.questions.index',$data);
    }


    public function edit($id)
    {
        //
        $data['quiz'] = Quiz::findorfail($id);
        $data['subjects'] = Subject::where('teacher_id',auth()->user()->id)->get();
        $teacher_section = Teacher::findorfail(auth()->user()->id)->Sections()->pluck('grade_id');
        $data['grades'] = Grade::findorfail($teacher_section);
        return view('pages.teachers.dashboard.quizzes.edit',$data);
    }


    public function update(Request $request, $id)
    {
        try
        {
           Quiz::findorfail($request->id)->update(
               [
                   'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                   'subject_id'=>$request->subject_id,
                   'grade_id'=>$request->grade_id,
                   'classroom_id'=>$request->classroom_id,
                   'section_id'=>$request->section_id,
                   'teacher_id'=>auth()->user()->id,
               ]
           );
            toastr()->success('messages.Update');
            return redirect()->route('teacherQuiz.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }


    public function destroy(Request $request,$id)
    {
        try
        {
            Quiz::destroy($request->id);
            toastr()->success('messages.Delete');
            return redirect()->route('teacherQuiz.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function student_quizzes($quizzes_id)
    {
        $degrees = degree::where('quizzes_id', $quizzes_id)->get();
        return view('pages.teachers.dashboard.quizzes.student_quizzes', compact('degrees'));
    }

    public function repeat_quizzes(Request $request)
    {
        degree::where('student_id', $request->student_id)->where('quizzes_id', $request->quizzes_id)->delete();
        toastr()->success('تم فتح الاختبار مرة اخرى للطالب');
        return redirect()->back();
    }
}
