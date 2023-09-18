<?php


namespace App\Repository\StudentGraduate;


interface StudentGraduateRepositoryInterface
{
    public function index();
    public function create();
    public function getClassroom($id);
    public function getSection($id);
    public function store($request);
    public function graduateReturn($request);
    public function deleteGraduate($request);
}