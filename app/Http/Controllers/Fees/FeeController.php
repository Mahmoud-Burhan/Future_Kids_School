<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use App\Repository\Fees\FeeRepositoryInterface;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    protected $Fees;

    public function __construct(FeeRepositoryInterface $Fees)
    {
        return $this->Fees = $Fees;
    }

    public function index()
    {
        return $this->Fees->index();
    }

    public function getClassroom($id)
    {
        return $this->Fees->getClassroom($id);
    }

    public function create()
    {
        return $this->Fees->create();
    }

    public function store(Request $request)
    {
        return $this->Fees->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Fees->edit($id);
    }


    public function update(Request $request, $id)
    {
        //
        return $this->Fees->update($id, $request);
    }

    public function destroy(Request $request,$id)
    {
        return $this->Fees->destroy($id,$request);
    }
}
