<div class="modal fade" id="deleteModal{{$quiz->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('quiz.Delete')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="false" style="color:red;">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('Quizzes.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <h5 style="color: red">{{trans('quiz.Delete_message')}}</h5>
                    <input type="hidden" name="id" id="id" value="{{$quiz->id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('quiz.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('quiz.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>