<?php


namespace App\Repository\StudentGraduate;


use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Student;
use App\Repository\StudentPromotion\StudentPromotionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use File;
use \Spatie\Translatable\HasTranslations;


class StudentGraduateRepository implements StudentGraduateRepositoryInterface
{
   public function index()
   {
       $students = Student::onlyTrashed()->get();
       return view('pages.student_graduate.index',compact('students'));
   }

   public function create()
   {
       $grades = Grade::all();
       return view('pages.student_graduate.create',compact('grades'));
   }

   public function getClassroom($id)
   {
       $classroom = Classroom::where('grade_id',$id)->get();
       return $classroom;
   }

   public function getSection($id)
   {
       $section = Section::where('classroom_id',$id)->get();
       return $section;
   }

   public function store($request)
   {
       DB::beginTransaction();
       try {

           $students = Student::where('grade_id', $request->grade_id)->where('classroom_id', $request->classroom_id)->where('section_id', $request->section_id)->get();
           if ($students->count() < 1) {
               return redirect()->back()->with('error', trans('student_graduate.No_Data'));
           }
           foreach ($students as $student) {
               $ids = explode(',', $student->id);
               Student::whereIn('id', $ids)->delete();
           }
           DB::commit();
           toastr()->success(trans('messages.Graduate'));
           return redirect()->route('StudentGraduate.index');
       }
       catch (\Exception $ex) {
           DB::rollBack();
           return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
       }
   }

   public function graduateReturn($request)
   {
       DB::beginTransaction();
       try {

           $students = Student::withTrashed()->where('id',$request->id)->restore();
           $promotion = Promotion::withTrashed()->where('student_id',$request->id)->restore();
           DB::commit();
           toastr()->success(trans('messages.Return_Graduate'));
           return redirect()->route('StudentGraduate.index');
       }
       catch (\Exception $ex) {
           DB::rollBack();
           return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
       }
   }

   public function deleteGraduate($request)
   {
       DB::beginTransaction();
       try {

           $student = Student::withTrashed()->findorfail($request->id);
           $path = (public_path('Attachments/Student/' . $student->getTranslation('name','en')));
           File::deleteDirectory($path);
           $student->forceDelete();
           DB::commit();
           toastr()->success(trans('messages.Delete'));
           return redirect()->route('StudentGraduate.index');
       }
       catch (\Exception $ex) {
           return $ex;
           DB::rollBack();
           return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
       }
   }
}