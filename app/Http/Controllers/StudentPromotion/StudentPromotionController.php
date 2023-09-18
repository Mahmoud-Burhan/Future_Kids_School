<?php

namespace App\Http\Controllers\StudentPromotion;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotion\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class StudentPromotionController extends Controller
{

    protected $Promotion;
    public function __construct(StudentPromotionRepositoryInterface $Promotion)
    {
        return $this->Promotion = $Promotion;
    }

    public function index()
    {
        //
        return $this->Promotion->index();
    }

    public function getClassroom($id)
    {
        return $this->Promotion->getClassroom($id);
    }

    public function getSection($id)
    {
        return $this->Promotion->getSection($id);
    }

    public function getNewClassroom($id)
    {
        return $this->Promotion->getNewClassroom($id);
    }

    public function getNewSection($id)
    {
        return $this->Promotion->getNewSection($id);
    }

    public function create()
    {
        return $this->Promotion->create();
    }


    public function store(Request $request)
    {
        //
        return $this->Promotion->store($request);
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

    public function destroy(Request $request,$id)
    {
        return $this->Promotion->destroy($request,$id);
    }

}
