<?php

namespace App\Http\Controllers\Teacher\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class TeacherQuestionController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
       try
       {
           Question::create(
               [
                   'title'=>$request->title,
                   'answers'=>$request->answers,
                   'right_answers'=>$request->right_answers,
                   'points'=>$request->points,
                   'quiz_id'=>$request->quiz_id,
               ]
           );
           toastr()->success('messages.Success');
           return redirect()->route('teacherQuiz.show',$request->quiz_id);
       }
       catch (\Exception $ex)
       {
           return redirect()->route('teacherQuiz.show',$request->quiz_id)->withErrors(['error'=>$ex->getMessage()]);
       }
    }

    public function show($id)
    {
        $data['quiz_id'] = $id;
        return view('pages.teachers.dashboard.questions.create',$data);
    }


    public function edit($id)
    {
        $data['questions'] = Question::findorfail($id);
        return view('pages.teachers.dashboard.questions.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try
        {
            Question::findorfail($request->id)->update(
                [
                    'title'=>$request->title,
                    'answers'=>$request->answers,
                    'right_answers'=>$request->right_answers,
                    'points'=>$request->points,
                    'quiz_id'=>$request->quiz_id,
                ]
            );
            toastr()->success('messages.Update');
            return redirect()->route('teacherQuiz.show',$request->quiz_id);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('teacherQuiz.show',$request->quiz_id)->withErrors(['error'=>$ex->getMessage()]);
        }
    }


    public function destroy(Request $request,$id)
    {
        try
        {
            $questions = Question::findorfail($request->id);
            $questions->delete();
            toastr()->success('messages.Update');
            return redirect()->route('teacherQuiz.show',$questions->quiz_id);
        }
        catch (\Exception $ex)
        {
            return redirect()->route('teacherQuiz.show',$questions->quiz_id)->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}
