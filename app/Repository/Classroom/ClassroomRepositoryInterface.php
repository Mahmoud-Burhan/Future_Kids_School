<?php


namespace App\Repository\Classroom;


interface ClassroomRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request);
    public function destroy($request);
    public function delete_checked($request);
    public function filter_classroom($request);
}