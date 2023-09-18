<?php

namespace App\Http\Controllers\Quizzes;

use App\Http\Controllers\Controller;
use App\Repository\Quizzes\QuizRepositoryInterface;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $Quiz;

    public function __construct(QuizRepositoryInterface $Quiz)
    {
        return $this->Quiz = $Quiz;
    }

    public function index()
    {
        return $this->Quiz->index();
    }


    public function create()
    {
        return $this->Quiz->create();
    }

    public function getClasses($id)
    {
        return $this->Quiz->getClasses($id);
    }

    public function getSections($id)
    {
        return $this->Quiz->getSections($id);
    }

    public function store(Request $request)
    {
        return $this->Quiz->store($request);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Quiz->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Quiz->update($request,$id);
    }

    public function destroy(Request $request, $id)
    {
        return $this->Quiz->destroy($request,$id);
    }
}
