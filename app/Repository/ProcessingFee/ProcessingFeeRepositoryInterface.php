<?php


namespace App\Repository\ProcessingFee;


interface ProcessingFeeRepositoryInterface
{
    public function show($id);
    public function store($request);
    public function index();
    public function edit($id);
    public function update($request, $id);
    public function destroy($request, $id);
}