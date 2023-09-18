<?php

namespace App\Http\Controllers\ProcessingFee;

use App\Http\Controllers\Controller;
use App\Repository\ProcessingFee\ProcessingFeeRepositoryInterface;
use Illuminate\Http\Request;

class ProcessingFeeController extends Controller
{

    protected $Processing;

    public function __construct(ProcessingFeeRepositoryInterface $Processing)
    {
        return $this->Processing = $Processing;
    }

    public function index()
    {
        return $this->Processing->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Processing->store($request);
    }


    public function show($id)
    {
        return $this->Processing->show($id);
    }


    public function edit($id)
    {
        return $this->Processing->edit($id);
    }

    public function update(Request $request, $id)
    {
        //
        return $this->Processing->update($request,$id);
    }


    public function destroy(Request $request,$id)
    {
        //
        return $this->Processing->destroy($request,$id);
    }
}
