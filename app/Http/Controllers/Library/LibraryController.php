<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Repository\Library\LibraryRepositoryInterface;
use Illuminate\Http\Request;

class LibraryController extends Controller
{

    protected $Library;

    public function __construct(LibraryRepositoryInterface $Library)
    {
        return $this->Library = $Library;
    }

    public function index()
    {
        return $this->Library->index();
    }


    public function create()
    {
        return $this->Library->create();
    }


    public function store(Request $request)
    {
        return $this->Library->store($request);
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return $this->Library->edit($id);
    }


    public function update(Request $request, $id)
    {
        return $this->Library->update($request,$id);
    }

    public function download_attachment($id,$file_name)
    {
        return $this->Library->download_attachment($id,$file_name);
    }

    public function display_attachment($id,$file_name)
    {
        return $this->Library->display_attachment($id,$file_name);
    }

    public function delete_all(Request $request)
    {
        return $this->Library->delete_all($request);
    }

    public function destroy($id)
    {
        //
    }
}
