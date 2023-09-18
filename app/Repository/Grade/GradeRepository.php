<?php


namespace App\Repository\Grade;


use App\Models\Classroom;
use App\Models\Grade;
use Illuminate\Http\Request;

class GradeRepository implements GradeRepositoryInterface
{
    public function index()
    {
        $grades = Grade::all();
        return view('pages.grades.grade',compact('grades'));
    }

    public function store($request)
    {
       try
       {
           $validated = $request->validated();
           $grades = new Grade();
           $grades->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
           $grades->notes = $request->notes;
           $grades->save();
           toastr()->success('messages.Success');
           return redirect()->route('Grade.index');
       }
       catch (\Exception $ex)
       {
           return redirect()->route('Grade.index')->withErrors(['error'=>$ex->getMessage()]);
       }
    }

    public function update($request, $id)
    {
        try
        {
            $validated = $request->validated();
            $grades = Grade::findorfail($request->id);
            $grades->name = ['en'=>$request->name_en,'ar'=>$request->name_ar];
            $grades->notes = $request->notes;
            $grades->save();
            toastr()->success('messages.Update');
            return redirect()->route('Grade.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('Grade.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        try
        {
            $count = Classroom::where('grade_id',$request->id)->pluck('grade_id');
            if(!$count->count() ==0)
            {
                toastr()->error('grade.Cannot_delete');
                return redirect()->route('Grade.index');
            }
            else
            {
                $grades = Grade::findorfail($request->id);
                $grades->delete();
                toastr()->success('messages.Delete');
                    return redirect()->route('Grade.index');
            }
        }
        catch (\Exception $ex)
        {
            return redirect()->route('Grade.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}
