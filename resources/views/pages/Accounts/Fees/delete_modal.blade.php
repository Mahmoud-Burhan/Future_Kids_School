<div class="modal fade" id="modalDemo2{{$fee->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{trans('Account.Delete_Fees')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('Fees.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="modal-title" style="color: red">{{trans('Account.Delete_Message')}}</h5>
                            <input type="hidden" name="id" id="id" value="{{$fee->id}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('Account.Delete_Fees')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="close">{{trans('student.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>