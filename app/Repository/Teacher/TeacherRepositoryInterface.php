<?php


namespace App\Repository\Teacher;


interface TeacherRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request, $id);
}