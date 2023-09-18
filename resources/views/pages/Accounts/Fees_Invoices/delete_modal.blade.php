<div class="modal fade" id="deleteModal{{$fee_invoice->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{trans('fees_invoice.Delete')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('FeesInvoice.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="modal-title" style="color: red">{{trans('fees_invoice.Delete_Message')}}</h6>
                            <input type="hidden" name="id" id="id" value="{{$fee_invoice->id}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('fees_invoice.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="close">{{trans('fees_invoice.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>