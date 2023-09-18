<?php

namespace App\Http\Controllers\Student\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentExamsController extends Controller
{

    public function index()
    {
        $data['quizzes'] = Quiz::where('grade_id',auth()->user()->grade_id)->where('classroom_id',auth()->user()->classroom_id)->where('section_id',auth()->user()->section_id)->orderBy('id','Desc')->get();
        return view('pages.student.dashboard.exams.index',$data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($quiz_id)
    {
        $questions = Quiz::where('grade_id',auth()->user()->grade_id)->where('classroom_id',auth()->user()->classroom_id)->where('section_id',auth()->user()->section_id)->where('id',$quiz_id)->first();

        $student_id = Auth::user()->id;
        return view('pages.student.dashboard.exams.show',compact('questions','student_id','quiz_id'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
