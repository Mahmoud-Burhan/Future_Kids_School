<?php

namespace App\Http\Controllers\PaymentFee;

use App\Http\Controllers\Controller;
use App\Repository\PaymentFee\PaymentFeeRepositoryInterface;
use Illuminate\Http\Request;

class PaymentFeeController extends Controller
{
    protected $Payment;

    public function __construct(PaymentFeeRepositoryInterface $Payment)
    {
        return $this->Payment = $Payment;
    }

    public function index()
    {
        return $this->Payment->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Payment->store($request);
    }

    public function show($id)
    {
        return $this->Payment->show($id);
    }


    public function edit($id)
    {
        return $this->Payment->edit($id);
    }


    public function update(Request $request,$id)
    {
        return $this->Payment->update($request,$id);
    }

    public function destroy(Request $request,$id)
    {
        return $this->Payment->destroy($request,$id);
    }
}
