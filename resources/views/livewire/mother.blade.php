<div>
    @if($currentStep!=2)
        <div style="display: none" class="row setup-content" id="step-2">
        </div>
    @else
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mother_name_ar"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_name_ar')}}</label>
                    <input type="text" class="form-control" wire:model="mother_name_ar" autocomplete="off">
                    @error('mother_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mother_name_en"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_name_en')}}</label>
                    <input type="text" class="form-control" wire:model="mother_name_en" autocomplete="off">
                    @error('mother_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mother_job_ar"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Job_ar')}}</label>
                    <input type="text" class="form-control" wire:model="mother_job_ar" autocomplete="off">
                    @error('father_job_ar')
                    <div class="mother_job_ar-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mother_job_en"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Job_en')}}</label>
                    <input type="text" class="form-control" wire:model="mother_job_en" autocomplete="off">
                    @error('Mother_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="mother_national_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_National_Id')}}</label>
                    <input type="text" class="form-control" wire:model="mother_national_id" autocomplete="off">
                    @error('mother_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="mother_passport_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Passport_Id')}}</label>
                    <input type="text" class="form-control" wire:model="mother_passport_id" autocomplete="off">
                    @error('mother_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="mother_phone"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Phone')}}</label>
                    <input type="text" class="form-control" wire:model="mother_phone" autocomplete="off">
                    @error('mother_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="mother_nationality_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Nationality')}}</label>
                    <select class="form-control" wire:model="mother_nationality_id" style="height: 10%">
                        <option selected>{{trans('family.Select')}}</option>
                        @foreach($nationalities as $nationality)
                            <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                        @endforeach
                    </select>
                    @error('mother_nationality_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mother_blood_type_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Blood_Type')}}</label>
                    <select class="form-control" wire:model="mother_blood_type_id" style="height: 10%">
                        <option selected>{{trans('family.Select')}}</option>
                        @foreach($blood_types as $blood_type)
                            <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                        @endforeach
                    </select>
                    @error('mother_blood_type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="mother_religion_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Religion')}}</label>
                    <select class="form-control" wire:model="mother_religion_id" style="height: 10%">
                        <option selected>{{trans('family.Select')}}</option>
                        @foreach($religions as $religion)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('mother_religion_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mother_address"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Mother_Address')}}</label>
                    <textarea class="form-control" rows="4" wire:model="mother_address"></textarea>
                    @error('mother_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        @if($update_fam)
        <button type="button" class="btn btn-danger" wire:click="previousUpdate(1)">
            {{trans('family.Previous')}}
        </button>
        @else
            <button type="button" class="btn btn-danger" wire:click="previous(1)">
                {{trans('family.Previous')}}
            </button>
        @endif
        @if($update_fam)
        <button type="button" class="btn btn-success" wire:click="secondstepsubmitUpdate">
            {{trans('family.Next')}}
        </button>
        @else
            <button type="button" class="btn btn-success" wire:click="secondstepsubmit">
                {{trans('family.Next')}}
            </button>
        @endif

    @endif
</div>