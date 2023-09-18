<?php

namespace App\Http\Controllers\StudentAttendance;

use App\Http\Controllers\Controller;
use App\Repository\StudentAttendance\StudentAttendanceRepositoryInterface;
use Illuminate\Http\Request;

class StudentAttendanceController extends Controller
{

    protected $Attendance;

    public function __construct(StudentAttendanceRepositoryInterface $Attendance)
    {
        return $this->Attendance = $Attendance;
    }

    public function index()
    {
        return $this->Attendance->index();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }


    public function show($id)
    {
        return $this->Attendance->show($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
