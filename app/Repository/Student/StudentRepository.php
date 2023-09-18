<?php


namespace App\Repository\Student;


use App\Models\BloodType;
use App\Models\Classroom;
use App\Models\Family;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Images;
use App\Models\Nationality;
use App\Models\Promotion;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use File;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\directoryExists;

class StudentRepository implements StudentRepositoryInterface
{

    public function index()
    {
        $students = Student::all();
        return view('pages.student.index', compact('students'));
    }

    public function create()
    {
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        $data['grades'] = Grade::all();
        $data['classrooms'] = Classroom::all();
        $data['sections'] = Section::all();
        $data['families'] = Family::all();
        return view('pages.student.create', $data);
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();
            $student = new Student();
            $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationalities_id = $request->nationalities_id;
            $student->blood_id = $request->blood_id;
            $student->date_of_birth = $request->date_of_birth;
            $student->grade_id = $request->grade_id;
            $student->classroom_id = $request->classroom_id;
            $student->section_id = $request->section_id;
            $student->family_id = $request->family_id;
            $student->academic_year = $request->academic_year;
            $student->save();

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $name = $photo->getClientOriginalName();
                    $photo->storeAs('Attachments/Student/' . $request->name_en, $photo->getClientOriginalName(), 'upload_attachments');

                    $images = new Images();
                    $images->file_name = $name;
                    $images->imageable_id = $student->id;
                    $images->imageable_type = 'App\Models\Student';
                    $images->save();
                }
            }
            DB::commit();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('Student.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }

    public function edit($id)
    {
        try {
            $students = Student::findorfail($id);
            $data['genders'] = Gender::all();
            $data['nationalities'] = Nationality::all();
            $data['blood_types'] = BloodType::all();
            $data['grades'] = Grade::all();
            $data['classrooms'] = Classroom::all();
            $data['sections'] = Section::all();
            $data['families'] = Family::all();
            return view('pages.student.edit', $data, compact('students'));
        } catch (\Exception $ex) {
            return redirect()->route('Student.index')->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $student = Student::findorfail($request->id);
            $old_folder_name = $student->getTranslation('name', 'en');
            $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationalities_id = $request->nationalities_id;
            $student->blood_id = $request->blood_id;
            $student->date_of_birth = $request->date_of_birth;
            $student->grade_id = $request->grade_id;
            $student->classroom_id = $request->classroom_id;
            $student->section_id = $request->section_id;
            $student->family_id = $request->family_id;
            $student->academic_year = $request->academic_year;
            $student->save();
            if (file_exists('Attachments/Student/' . $old_folder_name)) {
                rename('Attachments/Student/' . $old_folder_name, 'Attachments/Student/' . $request->name_en);
            }
            DB::commit();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('Student.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function destroy($request, $id)
    {
        try {
            DB::beginTransaction();
            $student = Student::findorfail($request->id);
            $path = (public_path('Attachments/Student/' . $student->getTranslation('name', 'en')));
            File::deleteDirectory($path);
            $student->delete();
            DB::commit();
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('Student.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('pages.student.details', compact('student'));
    }

    public function student_attachment($request)
    {
        try {
            $folder_name = $request->name;
            foreach ($request->file('photos') as $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAs('Attachments/Student/' . $folder_name, $photo->getClientOriginalName(), 'upload_attachments');

                $images = new Images();
                $images->file_name = $name;
                $images->imageable_id = $request->id;
                $images->imageable_type = 'App\Models\Student';
                $images->save();

            }

            DB::commit();
            toastr()->success(trans('messages.Success'));
            return redirect()->route('Student.index');

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function attachment_download($id, $name)
    {
        try {
            $file_name = Images::where('id', $id)->pluck('file_name')->first();
            $path = public_path('Attachments/Student/' . $name . '/' . $file_name);
            return response()->download($path);
        } catch (\Exception $ex) {

            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function attachment_delete($id,$name)
    {
        DB::beginTransaction();
        try {
            $file_name = Images::where('id', $id)->pluck('file_name')->first();
            $id = Images::findorfail($id);
            $path = public_path('Attachments/Student/'.$name.'/'.$file_name);
            File::delete($path);
            $id->delete();
            DB::commit();
            toastr()->success(trans('messages.Delete'));
            return redirect()->route('Student.index');

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }
    }

    public function getClassroom($id)
    {
        $classroom = Classroom::where('grade_id',$id)->pluck('class_name','id');
        return $classroom;
    }

    public function getSection($id)
    {
        $sections = Section::where('classroom_id',$id)->pluck('section_name','id');
        return $sections;
    }

    public function Graduate_Student($request)
    {
        DB::beginTransaction();
        try {
            $promotion = Promotion::where('student_id',$request->id)->delete();
            $students = Student::where('id',$request->id)->delete();
            DB::commit();
            toastr()->success(trans('messages.Graduate'));
            return redirect()->route('Student.index');

        } catch (\Exception $ex) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $ex->getMessage()]);
        }

    }
}
