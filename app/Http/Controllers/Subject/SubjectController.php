<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Repository\Subject\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $Subject;

    public function __construct(SubjectRepositoryInterface $Subject)
    {
        return $this->Subject = $Subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();
    }

    public function getClasses($id)
    {
        return $this->Subject->getClasses($id);
    }

    public function store(Request $request)
    {
        return $this->Subject->store($request);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Subject->edit($id);
    }

    public function update(Request $request, $id)
    {
        return $this->Subject->update($request,$id);
    }


    public function destroy(Request $request, $id)
    {
        return $this->Subject->destroy($request,$id);
    }
}
