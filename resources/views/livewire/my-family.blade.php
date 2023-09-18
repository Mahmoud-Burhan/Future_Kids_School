<div>
    @if (!empty($successMessage))
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $successMessage }}
        </div>
    @endif

        @if (!empty($errorMessage))
            <div class="alert alert-danger" id="danger-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $errorMessage }}
            </div>
        @endif

        @if (!empty($updateMessage))
            <div class="alert alert-primary" id="primary-alert">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $updateMessage }}
            </div>
        @endif
    @if($family_table)
        @include('livewire.family_table')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#step-1" type="button"
                               class="btn btn-circle {{$currentStep!=1 ? 'btn-default': 'btn-success'}}">
                                1
                            </a>
                            <p>{{trans('family.Father_Information')}}</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#step-2" type="button"
                               class="btn btn-circle {{$currentStep!=2 ? 'btn-default': 'btn-success'}}">
                                2
                            </a>
                            <p>{{trans('family.Mother_Information')}}</p>
                        </div>
                        <div class="col-md-4">
                            <a href="#step-3" type="button"
                               class="btn btn-circle {{$currentStep!=3 ? 'btn-default': 'btn-success'}}">
                                3
                            </a>
                            <p>{{trans('family.Ensure')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('livewire.father')
        @include('livewire.mother')

        @if($currentStep!=3)
            <div style="display: none" class="row setup-content" id="step-3">
            </div>
        @else
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="father_name_ar"
                               style="font-size: 15px;font-weight: bolder">{{trans('family.Attachments')}}</label>
                        <input type="file" class="form-control" wire:model="photos" accept="images/*" multiple>
                    </div>
                </div>
            </div>
            @if($update_fam)
                <button type="button" class="btn btn-danger" wire:click="previousUpdate(2)">
                    {{trans('family.Previous')}}
                </button>
            @else
                <button type="button" class="btn btn-danger" wire:click="previous(2)">
                    {{trans('family.Previous')}}
                </button>
            @endif
            @if($update_fam)
                <button type="button" class="btn btn-primary" wire:click="submitFormUpdate">
                    {{trans('family.Submit')}}
                </button>
                @else
                    <button type="button" class="btn btn-primary" wire:click="submitForm">
                        {{trans('family.Submit')}}
                    </button>
                @endif
            @endif
        @endif
</div>
