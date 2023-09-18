<?php


namespace App\Repository\Quizzes;


interface QuizRepositoryInterface
{
    public function index();
    public function create();
    public function getClasses($id);
    public function getSections($id);
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request,$id);
}