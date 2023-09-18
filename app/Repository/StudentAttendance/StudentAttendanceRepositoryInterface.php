<?php


namespace App\Repository\StudentAttendance;


interface StudentAttendanceRepositoryInterface
{
    public function index();
    public function show($id);
    public function store($request);
}