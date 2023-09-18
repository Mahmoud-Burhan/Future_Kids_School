<div class="modal fade" id="deleteModal{{$question->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('question.Delete')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="false" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('teacherQuestion.destroy','test')}}">
                @csrf
                {{method_field('Delete')}}
                <div class="modal-body">
                    <h5 style="color: red">{{trans('question.Delete_message')}}</h5>
                    <input type="hidden" name="id" id="id" value="{{$question->id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('question.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('question.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>