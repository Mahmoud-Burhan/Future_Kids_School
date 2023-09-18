<?php


namespace App\Repository\StudentPromotion;


interface StudentPromotionRepositoryInterface
{
    public function index();
    public function create();
    public function getClassroom($id);
    public function getSection($id);
    public function getNewClassroom($id);
    public function getNewSection($id);
    public function store($request);
    public function destroy($request,$id);
}