<?php


namespace App\Repository\Student;


interface StudentRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request,$id);
    public function show($id);
    public function student_attachment($request);
    public function attachment_download($id,$name);
    public function attachment_delete($id,$name);
    public function getClassroom($id);
    public function getSection($id);
    public function Graduate_Student($request);

}