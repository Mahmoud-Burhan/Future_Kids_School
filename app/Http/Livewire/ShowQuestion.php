<?php

namespace App\Http\Livewire;

use App\Models\degree;
use App\Models\Question;
use Livewire\Component;

class ShowQuestion extends Component
{
    public $quiz_id, $student_id, $data, $counter = 0, $question_count = 0;
    public $store_value;

    public function render()
    {
        $this->data = Question::where('quiz_id', $this->quiz_id)->get();
        $this->question_count = $this->data->count(); //this is used to count the total number of questions in this exam
        return view('livewire.show-question', ['data']);
    }

    public function nextQuestion($question_id, $score, $answer, $right_answer)
    {
        $stuDegree = degree::where('student_id', $this->student_id)->where('quizzes_id', $this->quiz_id)->first();
        // insert
        if ($stuDegree == null) {
            $degree = new degree();
            $degree->quizzes_id = $this->quiz_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->date = date('Y-m-d');
            $degree->save();
        }
        else {

            // update
            if ($stuDegree->question_id >= $this->data[$this->counter]->id) {
                $stuDegree->score = 0;
                $stuDegree->abuse = '1';
                $stuDegree->save();
                toastr()->error('تم إلغاء الاختبار لإكتشاف تلاعب بالنظام');
                return redirect('Student_Exams');
            } else {

                $stuDegree->question_id = $question_id;
                if (strcmp(trim($answer), trim($right_answer)) === 0) {
                    $stuDegree->score += $score;
                } else {
                    $stuDegree->score += 0;
                }
                $stuDegree->save();
            }
        }

        if ($this->counter < $this->question_count - 1) {
            $this->counter++;
        } else {
            toastr()->success('تم إجراء الاختبار بنجاح');
            return redirect('Student_Exams');
        }
    }
}
