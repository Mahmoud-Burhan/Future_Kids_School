<?php

namespace App\Http\Controllers\StudentGraduate;

use App\Http\Controllers\Controller;
use App\Repository\StudentGraduate\StudentGraduateRepository;
use App\Repository\StudentGraduate\StudentGraduateRepositoryInterface;
use App\Repository\StudentPromotion\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class StudentGraduateController extends Controller
{
    protected $Graduate;

    public function __construct(StudentGraduateRepositoryInterface $Graduate)
    {
        return $this->Graduate = $Graduate;
    }

    public function index()
    {
        //
        return $this->Graduate->index();
    }


    public function create()
    {
        return $this->Graduate->create();
    }


    public function getClassroom($id)
    {
        return $this->Graduate->getClassroom($id);
    }

    public function getSection($id)
    {
        return $this->Graduate->getSection($id);
    }

    public function graduateReturn(Request $request)
    {
        return $this->Graduate->graduateReturn($request);
    }

    public function deleteGraduate(Request $request)
    {
        return $this->Graduate->deleteGraduate($request);
    }


    public function store(Request $request)
    {
        return $this->Graduate->store($request);
    }


    public function show($id)
    {
        //
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
