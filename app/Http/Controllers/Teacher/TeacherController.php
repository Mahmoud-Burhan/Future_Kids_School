<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherRequest;
use App\Repository\Teacher\TeacherRepositoryInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    protected $Teacher;
    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        return $this->Teacher =$Teacher;
    }

    public function index()
    {
        return $this->Teacher->index();
    }


    public function create()
    {
        return $this->Teacher->create();
    }


    public function store(TeacherRequest $request)
    {
        //
        return $this->Teacher->store($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        return $this->Teacher->edit($id);
    }


    public function update(Request $request, $id)
    {
        //
        return $this->Teacher->update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        //
        return $this->Teacher->destroy($request, $id);
    }

}
