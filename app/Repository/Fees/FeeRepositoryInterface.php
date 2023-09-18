<?php


namespace App\Repository\Fees;


interface FeeRepositoryInterface
{
    public function index();
    public function create();
    public function getClassroom($id);
    public function store($request);
    public function edit($id);
    public function update($id, $request);
    public function destroy($id, $request);
}