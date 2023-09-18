<?php


namespace App\Repository\Grade;


interface GradeRepositoryInterface
{
    public function index();
    public function store($request);
    public function update($request,$id);
    public function destroy($request,$id);
}