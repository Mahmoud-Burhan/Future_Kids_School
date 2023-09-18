<?php

namespace App\Http\Controllers\Grade;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGradeRequest;
use App\Repository\Grade\GradeRepositoryInterface;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    protected $Grade;
    public function __construct(GradeRepositoryInterface $Grade)
    {
         $this->Grade = $Grade;
    }

    public function index()
    {
        return $this->Grade->index();
    }

    public function create()
    {
        //
    }


    public function store(StoreGradeRequest $request)
    {
        //
        return $this->Grade->store($request);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(StoreGradeRequest $request, $id)
    {
        //
        return $this->Grade->update($request, $id);
    }

    public function destroy(StoreGradeRequest $request, $id)
    {
        //
        return $this->Grade->destroy($request, $id);
    }
}
