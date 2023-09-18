<?php


namespace App\Repository\OnlineClasses;


interface OnlineClassesRepositoryInterface
{
    public function index();
    public function create();
    public function getClassroom($id);
    public function getSections($id);
    public function store($request);
    public function destroy($request, $id);
    public function indirectCreate();
    public function indirectStore($request);
}