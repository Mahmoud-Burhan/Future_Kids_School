<?php

namespace App\Http\Controllers\Section;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Repository\Section\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    protected $Section;

    public function __construct(SectionRepositoryInterface $Section)
    {
        return $this->Section = $Section;
    }

    public function index()
    {
        return $this->Section->index();
    }
    public function getClasses($id)
    {
        return $this->Section->getClasses($id);
    }

    public function store(SectionRequest $request)
    {
        return $this->Section->store($request);
    }

    public function update(SectionRequest $request)
    {
        return $this->Section->update($request);
    }

    public function destroy(SectionRequest $request)
    {
        return $this->Section->destroy($request);
    }
}
