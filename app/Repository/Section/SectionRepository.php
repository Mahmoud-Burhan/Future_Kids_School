<?php


namespace App\Repository\Section;


use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Section;
use App\Models\Teacher;

class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        $teachers = Teacher::all();
        $grades = Grade::with(['Sections'])->get();
        $list_grades = Grade::all();
        return view('pages.sections.section',compact('grades','list_grades','teachers'));
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
            $validated = $request->validated();
            $section = new Section();
            $section->section_name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
            $section->status = 1;
            $section->classroom_id = $request->class_id;
            $section->grade_id = $request->grade_id;
            $section->save();
            $section->teachers()->attach($request->teacher_id);
            toastr()->success('messages.Success');
            return redirect()->route('Section.index');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('Section.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function update($request)
    {
        try
        {
            $validated = $request->validated();
            $section = Section::findorfail($request->id);
            $section->section_name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
            if(isset($request->status))
            {
                $section->status = 1;
            }
            else
            {
                $section->status = 0;
            }

            $section->classroom_id = $request->class_id;
            $section->grade_id = $request->grade_id;

            // update pivot tABLE
            if (isset($request->teacher_id)) {
                $section->teachers()->sync($request->teacher_id);
            } else {
                $section->teachers()->sync(array());
            }
            $section->save();
            toastr()->success('messages.Update');
            return redirect()->route('Section.index');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('Section.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try
        {
            Section::findorfail($request->id)->delete();
            toastr()->success('messages.Delete');
            return redirect()->route('Section.index');

        }
        catch (\Exception $ex)
        {
            return redirect()->route('Section.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}