<?php


namespace App\Repository\Library;


interface LibraryRepositoryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function download_attachment($id,$file_name);
    public function display_attachment($id,$file_name);
    public function delete_all($request);
}