<?php


namespace App\Http\Traits;


use App\Models\Images;
use File;
use Illuminate\Support\Facades\Storage;

trait LibraryTrait
{
    public function uploadFile($request,$name,$folder)
    {
        $file_name = $request->file($name)->getClientOriginalName();
        $folder_name =pathinfo($file_name,PATHINFO_FILENAME);
        $request->file($name)->storeAs('Attachments/'.$folder.'/',$folder_name.'/'.$file_name, 'upload_attachments');
    }

    public function editUploadFile($request,$old_name,$folder)
    {
        $folder_name =pathinfo($old_name,PATHINFO_FILENAME);
        if (file_exists('Attachments/'.$folder.'/' . $folder_name))
        {
            File::deleteDirectory('Attachments/'.$folder.'/'. $folder_name);
        }
    }

    public function download($file_name,$folder)
    {
        $folder_name =pathinfo($file_name,PATHINFO_FILENAME);
        $path = public_path('Attachments/'.$folder.'/' . $folder_name.'/'.$file_name);
        return response()->download($path);
    }

    public function display($file_name,$folder)
    {
        $folder_name =pathinfo($file_name,PATHINFO_FILENAME);
        $path = public_path('Attachments/'.$folder.'/' . $folder_name.'/'.$file_name);
        return response()->file($path);
    }

    public function delete_attachment($file_name,$folder)
    {
        $folder_name =pathinfo($file_name,PATHINFO_FILENAME);
        if (file_exists('Attachments/'.$folder.'/' . $folder_name))
        {
            File::deleteDirectory('Attachments/'.$folder.'/'. $folder_name);
        }
    }
}