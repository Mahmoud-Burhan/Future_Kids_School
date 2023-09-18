<?php


namespace App\Repository\Question;


use App\Models\Question;
use App\Models\Quiz;

class QuestionRepository implements QuestionRepositoryInterface
{
    public function index()
    {
        $data['questions'] = Question::all();
        return view('pages.question.index',$data);
    }

    public function create()
    {
        $data['quizzes'] = Quiz::all();
        return view('pages.question.create',$data);
    }

    public function store($request)
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
            return redirect()->route('Question.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('Question.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }

    public function edit($id)
    {
        $data['quizzes'] = Quiz::all();
        $data['questions'] = Question::findorfail($id);
        return view('pages.question.edit',$data);
    }

    public function update($request, $id)
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
            return redirect()->route('Question.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('Question.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
    public function destroy($request, $id)
    {
        try
        {
           Question::destroy($request->id);
            toastr()->success('messages.Delete');
            return redirect()->route('Question.index');
        }
        catch (\Exception $ex)
        {
            return redirect()->route('Question.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}