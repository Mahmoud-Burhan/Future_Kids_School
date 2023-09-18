<?php

namespace App\Http\Controllers\Classroom;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Repository\Classroom\ClassroomRepositoryInterface;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    //
    protected $Classroom;

    public function __construct(ClassroomRepositoryInterface $Classroom)
    {
        return $this->Classroom = $Classroom;
    }
    public function index()
    {
        return $this->Classroom->index();
    }

    public function store(ClassroomRequest $request)
    {
        return $this->Classroom->store($request);
    }

    public function update(ClassroomRequest $request)
    {
        return $this->Classroom->update($request);
    }

    public function destroy(ClassroomRequest $request)
    {
        return $this->Classroom->destroy($request);
    }

    public function delete_checked(ClassroomRequest $request)
    {
        return $this->Classroom->delete_checked($request);
    }

    public function filter_classroom(ClassroomRequest $request)
    {
        return $this->Classroom->filter_classroom($request);
    }



}
