<div>
    @if($currentStep!=1)
        <div style="display: none" class="row setup-content" id="step-1">
        </div>
    @else
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email" style="font-size: 15px;font-weight: bolder">{{trans('family.Email')}}</label>
                    <input type="email" class="form-control" wire:model="email" autocomplete="off">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Password')}}</label>
                    <input type="password" class="form-control" wire:model="password" autocomplete="off">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="father_name_ar"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_name_ar')}}</label>
                    <input type="text" class="form-control" wire:model="father_name_ar" autocomplete="off">
                    @error('father_name_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="father_name_en"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_name_en')}}</label>
                    <input type="text" class="form-control" wire:model="father_name_en" autocomplete="off">
                    @error('father_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="father_job_ar"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Job_ar')}}</label>
                    <input type="text" class="form-control" wire:model="father_job_ar" autocomplete="off">
                    @error('father_job_ar')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="father_job_en"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Job_en')}}</label>
                    <input type="text" class="form-control" wire:model="father_job_en" autocomplete="off">
                    @error('father_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="father_national_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_National_Id')}}</label>
                    <input type="text" class="form-control" wire:model="father_national_id" autocomplete="off">
                    @error('father_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="father_passport_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Passport_Id')}}</label>
                    <input type="text" class="form-control" wire:model="father_passport_id" autocomplete="off">
                    @error('father_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="father_phone"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Phone')}}</label>
                    <input type="text" class="form-control" wire:model="father_phone" autocomplete="off">
                    @error('father_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="father_nationality_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Nationality')}}</label>
                    <select class="form-control" wire:model="father_nationality_id" style="height: 10%">
                        <option selected>{{trans('family.Select')}}</option>
                        @foreach($nationalities as $nationality)
                            <option value="{{$nationality->id}}">{{$nationality->name}}</option>
                        @endforeach
                    </select>
                    @error('father_nationality_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="father_blood_type_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Blood_Type')}}</label>
                    <select class="form-control" wire:model="father_blood_type_id" style="height: 10%">
                        <option selected>{{trans('family.Select')}}</option>
                        @foreach($blood_types as $blood_type)
                            <option value="{{$blood_type->id}}">{{$blood_type->name}}</option>
                        @endforeach
                    </select>
                    @error('father_blood_type_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="father_religion_id"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Religion')}}</label>
                    <select class="form-control" wire:model="father_religion_id" style="height: 10%">
                        <option selected>{{trans('family.Select')}}</option>
                        @foreach($religions as $religion)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
                        @endforeach
                    </select>
                    @error('father_religion_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="father_address"
                           style="font-size: 15px;font-weight: bolder">{{trans('family.Father_Address')}}</label>
                    <textarea class="form-control" rows="4" wire:model="father_address"></textarea>
                    @error('father_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        @if($update_fam)
            <button type="button" class="btn btn-success" wire:click="firststepsubmitUpdate ">
                {{trans('family.Next')}}
            </button>
        @else
            <button type="button" class="btn btn-success" wire:click="firststepsubmit ">
                {{trans('family.Next')}}
            </button>
        @endif
    @endif
</div>