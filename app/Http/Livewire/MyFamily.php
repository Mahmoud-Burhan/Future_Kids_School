<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Family;
use App\Models\FamilyAttachment;
use App\Models\Images;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MyFamily extends Component
{
    use WithFileUploads;
    public $currentStep = 1,
        $email, $password, $father_name_ar, $father_name_en, $father_job_ar, $father_job_en, $father_national_id,
        $father_passport_id, $father_phone, $father_nationality_id, $father_blood_type_id, $father_religion_id, $father_address,
        $mother_name_ar, $mother_name_en, $mother_job_ar, $mother_job_en, $mother_national_id, $mother_passport_id,
        $mother_phone, $mother_nationality_id, $mother_blood_type_id, $mother_religion_id, $mother_address, $family_id;

    public $photos, $family_table = true, $update_fam = false;

    public function render()
    {
        return view('livewire.my-family',
            [
                'nationalities' => Nationality::all(),
                'blood_types' => BloodType::all(),
                'religions' => Religion::all(),
                'families' => Family::all(),
            ]);
    }

    public function AddFamily()
    {
        $this->family_table = false;
    }

    public function submitForm()
    {
        $family = new Family();
        $family->email = $this->email;
        $family->password = Hash::make($this->password);
        $family->father_name = ['en' => $this->father_name_en, 'ar' => $this->father_name_ar];
        $family->father_job = ['en' => $this->father_job_en, 'ar' => $this->father_job_ar];
        $family->father_national_id = $this->father_national_id;
        $family->father_passport_id = $this->father_passport_id;
        $family->father_phone = $this->father_phone;
        $family->father_nationality_id = $this->father_nationality_id;
        $family->father_blood_type_id = $this->father_blood_type_id;
        $family->father_religion_id = $this->father_religion_id;
        $family->father_address = $this->father_address;
        $family->mother_name = ['en' => $this->mother_name_en, 'ar' => $this->mother_name_ar];;
        $family->mother_job = ['en' => $this->mother_job_en, 'ar' => $this->mother_job_ar];;
        $family->mother_national_id = $this->mother_national_id;
        $family->mother_passport_id = $this->mother_passport_id;
        $family->mother_phone = $this->mother_phone;
        $family->mother_nationality_id = $this->mother_nationality_id;
        $family->mother_blood_type_id = $this->mother_blood_type_id;
        $family->mother_religion_id = $this->mother_religion_id;
        $family->mother_address = $this->mother_address;
        $family->save();

        if (!empty($this->photos)){
            foreach ($this->photos as $photo){
                $name = $photo->getClientOriginalName();
                $photo->storeAs('Attachments/Family/' . $this->father_national_id, $photo->getClientOriginalName(), 'upload_attachments');

                $images = new Images();
                $images->file_name = $name;
                $images->imageable_id = $family->id;
                $images->imageable_type = 'App\Models\Family';
                $images->save();

            }
        }
        //THIS IS USED FOR A WHEN STORING IN FAMILY ATTACHMENT MODEL
       /* if (!empty($this->photos)) {
            foreach ($this->photos as $photo) {
                $photo->storeAs($this->father_national_id, $photo->getClientOriginalName(), $disk = 'family_attachments');
                FamilyAttachment::create([
                    'file_name' => $photo->getClientOriginalName(),
                    'family_id' => Family::latest()->first()->id,
                ]);
            }
        }*/

        $this->successMessage = trans('messages.Success');
        $this->clearForm();
        $this->currentStep = 1;
    }

    public function edit($id)
    {
        $this->family_table = false;
        $this->update_fam = true;
        $family = Family::where('id', $id)->first();
        $this->family_id = $id;
        $this->email = $family->email;
        $this->password = $family->password;
        $this->father_name_ar = $family->getTranslation('father_name', 'ar');
        $this->father_name_en = $family->getTranslation('father_name', 'en');
        $this->father_job_ar = $family->getTranslation('father_job', 'ar');
        $this->father_job_en = $family->getTranslation('father_job', 'en');
        $this->father_national_id = $family->father_national_id;
        $this->father_passport_id = $family->father_passport_id;
        $this->father_phone = $family->father_phone;
        $this->father_nationality_id = $family->father_nationality_id;
        $this->father_blood_type_id = $family->father_blood_type_id;
        $this->father_religion_id = $family->father_religion_id;
        $this->father_address = $family->father_address;
        $this->mother_name_ar = $family->getTranslation('mother_name', 'ar');
        $this->mother_name_en = $family->getTranslation('mother_name', 'en');
        $this->mother_job_ar = $family->getTranslation('mother_job', 'ar');;
        $this->mother_job_en = $family->getTranslation('mother_job', 'en');;
        $this->mother_national_id = $family->mother_national_id;
        $this->mother_passport_id = $family->mother_passport_id;
        $this->mother_phone = $family->mother_phone;
        $this->mother_nationality_id = $family->mother_nationality_id;
        $this->mother_blood_type_id = $family->mother_blood_type_id;
        $this->mother_religion_id = $family->mother_religion_id;
        $this->mother_address = $family->mother_address;
    }


    public function firststepsubmit()
    {
        $this->validate([
            'email' => 'required|unique:families,email,' . $this->id,
            'password' => 'required',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'father_job_ar' => 'required',
            'father_job_en' => 'required',
            'father_national_id' => 'required|unique:families,father_national_id,' . $this->id,
            'father_passport_id' => 'required|unique:families,father_national_id,' . $this->id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'father_nationality_id' => 'required',
            'father_blood_type_id' => 'required',
            'father_religion_id' => 'required',
            'father_address' => 'required',
        ]);

        $this->currentStep = 2;
    }


    public function firststepsubmitUpdate()
    {
        $this->update_fam = true;
        $this->validate([
            'email' => 'required|unique:families,email,' . $this->family_id,
            'password' => 'required',
            'father_name_ar' => 'required',
            'father_name_en' => 'required',
            'father_job_ar' => 'required',
            'father_job_en' => 'required',
            'father_national_id' => 'required|unique:families,father_national_id,' . $this->family_id,
            'father_passport_id' => 'required|unique:families,father_national_id,' . $this->family_id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'father_nationality_id' => 'required',
            'father_blood_type_id' => 'required',
            'father_religion_id' => 'required',
            'father_address' => 'required',
        ]);
        $this->currentStep = 2;
    }

    public function secondstepsubmit()
    {
        $this->validate([
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'mother_job_ar' => 'required',
            'mother_job_en' => 'required',
            'mother_national_id' => 'required|unique:families,mother_national_id,' . $this->id,
            'mother_passport_id' => 'required|unique:families,mother_passport_id,' . $this->id,
            'mother_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_nationality_id' => 'required',
            'mother_blood_type_id' => 'required',
            'mother_religion_id' => 'required',
            'mother_address' => 'required',
        ]);
        return $this->currentStep = 3;
    }

    public function secondstepsubmitUpdate()
    {
        $this->update_fam = true;
        $this->validate([
            'mother_name_ar' => 'required',
            'mother_name_en' => 'required',
            'mother_job_ar' => 'required',
            'mother_job_en' => 'required',
            'mother_national_id' => 'required|unique:families,mother_national_id,' . $this->family_id,
            'mother_passport_id' => 'required|unique:families,mother_passport_id,' . $this->family_id,
            'mother_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_nationality_id' => 'required',
            'mother_blood_type_id' => 'required',
            'mother_religion_id' => 'required',
            'mother_address' => 'required',
        ]);
        $this->currentStep = 3;
    }

    public function previous($step)
    {
        return $this->currentStep = $step;
    }

    public function previousUpdate($step)
    {
        return $this->currentStep = $step;
    }

    public function submitFormUpdate()
    {
        if ($this->family_id) {
            $family = Family::where('id', $this->family_id)->first();
            $family->email = $this->email;
            $family->password = Hash::make($this->password);
            $family->father_name = ['en' => $this->father_name_en, 'ar' => $this->father_name_ar];
            $family->father_job = ['en' => $this->father_job_en, 'ar' => $this->father_job_ar];
            $family->father_national_id = $this->father_national_id;
            $family->father_passport_id = $this->father_passport_id;
            $family->father_phone = $this->father_phone;
            $family->father_nationality_id = $this->father_nationality_id;
            $family->father_blood_type_id = $this->father_blood_type_id;
            $family->father_religion_id = $this->father_religion_id;
            $family->father_address = $this->father_address;
            $family->mother_name = ['en' => $this->mother_name_en, 'ar' => $this->mother_name_ar];;
            $family->mother_job = ['en' => $this->mother_job_en, 'ar' => $this->mother_job_ar];;
            $family->mother_national_id = $this->mother_national_id;
            $family->mother_passport_id = $this->mother_passport_id;
            $family->mother_phone = $this->mother_phone;
            $family->mother_nationality_id = $this->mother_nationality_id;
            $family->mother_blood_type_id = $this->mother_blood_type_id;
            $family->mother_religion_id = $this->mother_religion_id;
            $family->mother_address = $this->mother_address;
            $family->save();

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->father_national_id, $photo->getClientOriginalName(), $disk = 'family_attachments');
                    FamilyAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'family_id' => Family::latest()->first()->id,
                    ]);
                }
            }
            $this->updateMessage = trans('messages.Update');
            $this->clearForm();
            $this->currentStep = 1;
        }


    }

    public
    function delete($id)
    {

        $family = Family::findorfail($id);
        Storage::deleteDirectory('/family_attachments/' . $this->father_national_id);
        $family->delete();
        $this->errorMessage = trans('messages.Delete');
        $this->family_table = true;


    }

    public
    function clearForm()
    {

        $this->email = '';
        $this->password = '';
        $this->father_name_ar = '';
        $this->father_name_en = '';
        $this->father_job_ar = '';
        $this->father_job_en = '';
        $this->father_national_id = '';
        $this->father_passport_id = '';
        $this->father_phone = '';
        $this->father_nationality_id = '';
        $this->father_blood_type_id = '';
        $this->father_religion_id = '';
        $this->father_address = '';
        $this->mother_name_ar = '';
        $this->mother_name_en = '';
        $this->mother_job_ar = '';
        $this->mother_job_en = '';
        $this->mother_national_id = '';
        $this->mother_passport_id = '';
        $this->mother_phone = '';
        $this->mother_nationality_id = '';
        $this->mother_blood_type_id = '';
        $this->mother_religion_id = '';
        $this->mother_address = '';
    }
}
