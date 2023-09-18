<?php


namespace App\Repository\Setting;


use App\Http\Traits\LibraryTrait;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;

class SettingRepository implements SettingRepositoryInterface
{
    use LibraryTrait;
    public function index()
    {
      $collections = Setting::all();
      $logos = Setting::where('key','logo')->pluck('value')->first();
      $data['logo_folder_name'] =  pathinfo($logos,PATHINFO_FILENAME);
      $data['settings']= $collections->flatMap(function ($collections)
      {
          return [$collections->key => $collections->value];
      });

      return view('pages.settings.index',$data);
    }

    public function update($request)
    {

        DB::beginTransaction();
        try
        {
            $old_name = Setting::where('key','logo')->pluck('value')->first();
            $settings = $request->except('_token','_method','logo');
            foreach ($settings as $key=>$value)
            {
                Setting::where('key',$key)->update(['value'=>$value]);
            }

            if($request->hasFile('logo'))
            {
                $logo = $request->file('logo')->getClientOriginalName();
                Setting::where('key','logo')->update(['value'=>$logo]);

                $this->editUploadFile($request,$old_name,'Settings_Logo');
                $this->uploadFile($request,'logo','Settings_Logo');
            }
            DB::commit();
            toastr()->success('messages.Update');
            return redirect()->route('Setting.index');
        }
        catch (\Exception $ex)
        {
            return $ex;
            return redirect()->route('Setting.index')->withErrors(['error'=>$ex->getMessage()]);
        }
    }
}