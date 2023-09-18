<?php


namespace App\Repository\Question;


interface QuestionRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request,$id);
}