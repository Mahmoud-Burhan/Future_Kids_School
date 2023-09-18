<?php


namespace App\Repository\Subject;


use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Teacher;

class SubjectRepository implements SubjectRepositoryInterface
{
    public function index()
    {
        $data['subjects'] = Subject::all();
        return view('pages.subject.index',$data);
    }

    public function create()
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        $teachers =Teacher::all();
        return view('pages.subject.create',compact('grades','classrooms','teachers'));
    }

    public function getClasses($id)
    {
        $classroom = Classroom::where('grade_id',$id)->pluck('class_name','id');
        return $classroom;
    }

    public function store($request)
    {
        try
        {
            Subject::create(
                [
                    'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                    'grade_id'=>$request->grade_id,
                    'classroom_id'=>$request->classroom_id,
                    'teacher_id'=>$request->teacher_id,
                ]
            );

            toastr()->success('messages.Success');
            return redirect()->route('Subject.index');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('Subject.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        try
        {
            $data['subject'] = Subject::findorfail($id);
            $data['grades'] = Grade::all();
            $data['teachers'] = Teacher::all();
            return view('pages.subject.edit',$data);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('Subject.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try
        {
            Subject::findorfail($request->id)->update(
                [
                    'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
                    'grade_id'=>$request->grade_id,
                    'classroom_id'=>$request->classroom_id,
                    'teacher_id'=>$request->teacher_id,
                ]
            );

            toastr()->success('messages.Update');
            return redirect()->route('Subject.index');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('Subject.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        try
        {
           Subject::destroy($request->id);
            toastr()->success('messages.Delete');
            return redirect()->route('Subject.index');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('Subject.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}