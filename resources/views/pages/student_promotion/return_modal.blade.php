<div class="modal fade" id="returnModal{{$promotion->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('student_promotion.Back')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close" style="color: red">
                    <span aria-hidden="false">&times;</span>
                </button>
            </div>

            <form method="post" action="{{route('StudentPromotion.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <h5 style="color: red">{{trans('student_promotion.Return_Message')}}</h5>
                    <input type="hidden" id="id" name="id" value="{{$promotion->id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('student_promotion.Confirm')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('student_promotion.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>