<?php


namespace App\Repository\ReceiptStudent;


interface ReceiptStudentRepositoryInterface
{
    public function index();
    public function show($id);
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request);
}