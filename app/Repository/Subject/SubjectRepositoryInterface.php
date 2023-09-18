<?php


namespace App\Repository\Subject;


interface SubjectRepositoryInterface
{
    public function index();
    public function create();
    public function getClasses($id);
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request,$id);
}