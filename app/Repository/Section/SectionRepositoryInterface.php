<?php


namespace App\Repository\Section;


interface SectionRepositoryInterface
{
    public function index();
    public function getClasses($id);
    public function store($request);
    public function update($request);
    public function destroy($request);
}