<div class="modal fade" id="DeleteModal{{$receipt->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{trans('receipt.Delete')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('ReceiptStudent.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="modal-title" style="color: red">{{trans('receipt.Delete_Message')}}</h6>
                            <input type="hidden" name="id" id="id" value="{{$receipt->id}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('receipt.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('receipt.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>