 <!-- row -->
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                           data-page-length="50"
                           style="text-align: center">
                        <thead>
                        <tr class="table table-success">
                            <th>#</th>
                            <th>{{trans('family.Email')}}</th>
                            <th>{{trans('family.Father_name')}}</th>
                            <th>{{trans('family.Father_National_Id')}}</th>
                            <th>{{trans('family.Father_Passport_Id')}}</th>
                            <th>{{trans('family.Father_Job')}}</th>
                            <th>{{trans('family.Action')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($families as $family)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$family->email}}</td>
                                <td>{{$family->father_name}}</td>
                                <td>{{$family->father_national_id}}</td>
                                <td>{{$family->father_passport_id}}</td>
                                <td>{{$family->father_job}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" wire:click="edit({{$family->id}})" title="{{trans('family.Edit_Parent')}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" wire:click="delete({{$family->id}})" title="{{trans('family.Delete_Parent')}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-success" wire:click="AddFamily">
                    <i class="fa fa-plus"></i>
                    {{trans('family.Add_Parent')}}
                </button>
            </div>
        </div>
    </div>