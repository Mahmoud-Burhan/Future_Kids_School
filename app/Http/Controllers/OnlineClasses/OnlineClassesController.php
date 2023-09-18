<?php

namespace App\Http\Controllers\OnlineClasses;

use App\Http\Controllers\Controller;
use App\Repository\OnlineClasses\OnlineClassesRepositoryInterface;
use Illuminate\Http\Request;

class OnlineClassesController extends Controller
{
    protected $OnlineClasses;

    public function __construct(OnlineClassesRepositoryInterface $OnlineClasses)
    {
        return $this->OnlineClasses = $OnlineClasses;
    }

    public function index()
    {
        return $this->OnlineClasses->index();
    }


    public function create()
    {
        return $this->OnlineClasses->create();
    }

    public function getClassroom($id)
    {
        return $this->OnlineClasses->getClassroom($id);
    }

    public function getSections($id)
    {
        return $this->OnlineClasses->getSections($id);
    }

    public function store(Request $request)
    {
        return $this->OnlineClasses->store($request);
    }


    public function destroy(Request $request, $id)
    {

        return $this->OnlineClasses->destroy($request,$id);
    }

    public function indirectCreate()
    {
        return $this->OnlineClasses->indirectCreate();
    }

    public function indirectStore(Request $request)
    {
        return $this->OnlineClasses->indirectStore($request);
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


}
