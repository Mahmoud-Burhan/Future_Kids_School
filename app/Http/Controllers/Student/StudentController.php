<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Repository\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student;
    public function __construct(StudentRepositoryInterface $Student)
    {
        return $this->Student = $Student;
    }

    public function index()
    {
        //
        return $this->Student->index();
    }


    public function create()
    {
        return $this->Student->create();
    }


    public function store(StudentRequest $request)
    {
        //
        return $this->Student->store($request);
    }


    public function show($id)
    {
        //
        return $this->Student->show($id);
    }


    public function edit($id)
    {
        //
        return $this->Student->edit($id);
    }


    public function update(StudentRequest $request, $id)
    {
        //
        return $this->Student->update($request,$id);
    }

    public function destroy(Request $request,$id)
    {
        //
        return $this->Student->destroy($request,$id);
    }
    public function student_attachment(Request $request)
    {
        //
        return $this->Student->student_attachment($request);
    }

    public function attachment_download($id,$name)
    {
        //
        return $this->Student->attachment_download($id,$name);
    }
    public function attachment_delete($id,$name)
    {
        //
        return $this->Student->attachment_delete($id,$name);
    }

    public function getClassroom($id)
    {
        return $this->Student->getClassroom($id);
    }

    public function getSection($id)
    {
        return $this->Student->getSection($id);
    }

    public function Graduate_Student(Request $request)
    {
        return $this->Student->Graduate_Student($request);
    }
}
