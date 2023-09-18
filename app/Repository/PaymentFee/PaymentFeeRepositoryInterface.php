<?php


namespace App\Repository\PaymentFee;


interface PaymentFeeRepositoryInterface
{
    public function show($id);
    public function store($request);
    public function index();
    public function edit($id);
    public function update($request,$id);
    public function destroy($request,$id);
}