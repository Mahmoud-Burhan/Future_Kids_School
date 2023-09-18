<?php


namespace App\Repository\StudentPromotion;


use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentPromotionRepository implements StudentPromotionRepositoryInterface
{
    public function index()
    {
        $promotions = Promotion::all();
        return view('pages.student_promotion.index', compact('promotions'));
    }

    public function create()
    {
        $grades = Grade::all();
        return view('pages.student_promotion.student_promotion', compact('grades'));
    }


    public function getClassroom($id)
    {
        $classroom = Classroom::where('grade_id', $id)->pluck('class_name', 'id');
        return $classroom;
    }

    public function getSection($id)
    {
        $sections = Section::where('classroom_id', $id)->pluck('section_name', 'id');
        return $sections;
    }

    public function getNewClassroom($id)
    {
        $new_classroom = Classroom::where('grade_id', $id)->pluck('class_name', 'id');
        return $new_classroom;
    }

    public function getNewSection($id)
    {
        $new_sections = Section::where('classroom_id', $id)->pluck('section_name', 'id');
        return $new_sections;
    }

    public function store($request)
    {

        DB::beginTransaction();
        try {
            $students = Student::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->
            where('section_id', $request->section_id)->where('academic_year', $request->academic_year)->get();

            if ($students->count() < 1) {
                return redirect()->back()->with('error', trans('student_promotion.No_Data'));
            }
            foreach ($students as $student) {
                $ids = explode(',', $student->id);
                Student::whereIn('id', $ids)->update([
                    'grade_id' => $request->new_grade_id,
                    'classroom_id' => $request->new_classroom_id,
                    'section_id' => $request->new_section_id,
                    'academic_year' => $request->new_academic_year,
                ]);

                Promotion::updateOrCreate(
                    [
                        'student_id' => $student->id,
                        'from_grade' => $request->grade_id,
                        'from_classroom' => $request->classroom_id,
                        'from_section' => $request->section_id,
                        'from_academic_year' => $request->academic_year,
                        'to_grade' => $request->new_grade_id,
                        'to_classroom' => $request->new_classroom_id,
                        'to_section' => $request->new_section_id,
                        'to_academic_year' => $request->new_academic_year,
                    ]
                );
            }
            DB::commit();
            toastr()->success(trans('messages.Promotion'));
            return redirect()->route('StudentPromotion.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }

    public function destroy($request, $id)
    {
        DB::beginTransaction();
        try {

            if ($request->page_id == 1) {
                $proms = Promotion::all();
                foreach ($proms as $prom) {
                    $ids = explode(',', $prom->student_id);
                    $student = Student::whereIn('id', $ids)->update(
                        [
                            'grade_id' => $prom->from_grade,
                            'classroom_id' => $prom->from_classroom,
                            'section_id' => $prom->from_section,
                            'academic_year' => $prom->from_academic_year,
                        ]
                    );
                }
                Promotion::truncate();
            } else {
                $promotion = Promotion::findorfail($request->id);
                $student = Student::where('id', $promotion->student_id)->update(
                    [
                        'grade_id' => $promotion->from_grade,
                        'classroom_id' => $promotion->from_classroom,
                        'section_id' => $promotion->from_section,
                        'academic_year' => $promotion->from_academic_year,
                    ]
                );
                $promotion->delete();
            }
            DB::commit();
            toastr()->success(trans('messages.Return_Success'));
            return redirect()->route('StudentPromotion.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);

        }
    }

}