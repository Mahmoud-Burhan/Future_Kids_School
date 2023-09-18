<?php


namespace App\Repository\Quizzes;


use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Facades\DB;

class QuizRepository implements QuizRepositoryInterface
{
    public function index()
    {
        $data['quizzes'] = Quiz::all();
        return view('pages.quizzes.index',$data);
    }

    public function create()
    {
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        $data['grades'] = Grade::all();
        return view('pages.quizzes.create',$data);
    }

    public function getClasses($id)
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
        try
        {
            Quiz::create(
                [
                    'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                    'subject_id'=>$request->subject_id,
                    'grade_id'=>$request->grade_id,
                    'classroom_id'=>$request->classroom_id,
                    'section_id'=>$request->section_id,
                    'teacher_id'=>$request->teacher_id,
                ]
            );
            toastr()->success('messages.Success');
            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $ex)
        {

            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        try
        {
            $data['quiz'] = Quiz::findorfail($id);
            $data['subjects'] = Subject::all();
            $data['teachers'] = Teacher::all();
            $data['grades'] = Grade::all();
            return view('pages.quizzes.edit',$data);
        }
        catch (\Exception $ex)
        {
            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function update($request, $id)
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
                    'teacher_id'=>$request->teacher_id,
                ]
            );
            toastr()->success('messages.Update');
            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        try
        {
            Quiz::destroy($request->id);
            toastr()->success('messages.Delete');
            return redirect()->route('Quizzes.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->back->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}