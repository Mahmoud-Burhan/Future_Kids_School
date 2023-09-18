<?php


namespace App\Repository\FeesInvoice;


interface FeesInvoiceRepositoryInterface
{
    public function index();
    public function show($id);
    public function getAmount($id);
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function destroy($request,$id);
}