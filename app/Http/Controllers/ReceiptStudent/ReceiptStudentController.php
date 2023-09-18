<?php

namespace App\Http\Controllers\ReceiptStudent;

use App\Http\Controllers\Controller;
use App\Repository\ReceiptStudent\ReceiptStudentRepositoryInterface;
use Illuminate\Http\Request;

class ReceiptStudentController extends Controller
{
    protected $Receipt;

    public function __construct(ReceiptStudentRepositoryInterface $Receipt)
    {
        return $this->Receipt = $Receipt;
    }

    public function index()
    {
        return $this->Receipt->index();
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        return $this->Receipt->store($request);
    }


    public function show($id)
    {
        return $this->Receipt->show($id);

    }


    public function edit($id)
    {
        return $this->Receipt->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Receipt->update($request,$id);
    }


    public function destroy(Request $request,$id)
    {
        return $this->Receipt->destroy($request);
    }
}
