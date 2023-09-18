<?php


namespace App\Repository\Classroom;


use App\Models\Classroom;
use App\Models\Grade;

class ClassroomRepository implements ClassroomRepositoryInterface
{
    public function index()
    {
        $grades = Grade::all();
        $classrooms = Classroom::all();
        return view('pages.classroom.classroom', compact('grades', 'classrooms'));
    }

    public function store($request)
    {
        $Lists_Class = $request->Lists_Class;
        try {
            $validated = $request->validated();
            foreach ($Lists_Class as $lists_Class) {
                $class = new Classroom();
                $class->class_name = ['en' => $lists_Class['name_en'], 'ar' => $lists_Class['name_ar']];
                $class->grade_id = $lists_Class['grade_id'];
                $class->save();
            }
            toastr()->success('messages.Success');
            return redirect()->route('Classroom.index');
        } catch (\Exception $ex) {
            return redirect()->route('Classroom.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function update($request)
    {

        try {
            $validated = $request->validated();

            $class = Classroom::findorfail($request->id);
            $class->class_name = ['en' => $request->name_en,'ar' => $request->name_ar];
            $class->grade_id = $request->grade_id;
            $class->save();

            toastr()->success('messages.Update');
            return redirect()->route('Classroom.index');
        } catch (\Exception $ex) {
            return redirect()->route('Classroom.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $validated = $request->validated();

            $class = Classroom::findorfail($request->id)->delete();


            toastr()->success('messages.Delete');
            return redirect()->route('Classroom.index');
        } catch (\Exception $ex) {
            return redirect()->route('Classroom.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }
    public function delete_checked($request)
    {
        try {
            $validated = $request->validated();

            $check = explode(',',$request->delete_id);
            Classroom::whereIn('id',$check)->delete();
            toastr()->success('messages.Delete');
            return redirect()->route('Classroom.index');
        } catch (\Exception $ex) {
            return redirect()->route('Classroom.index')->withErrors(['error' => $ex->getMessage()]);
        }

    }

    public function filter_classroom($request)
    {
        try {
            $filter = Classroom::select('*')->where('grade_id','=',$request->grade_id)->get();
            $grades = Grade::all();
            return view('pages.classroom.classroom',compact('grades'))->withDetails($filter);


        } catch (\Exception $ex) {
            return redirect()->route('Classroom.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }
}