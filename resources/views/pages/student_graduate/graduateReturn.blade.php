<div class="modal fade" id="graduateReturn{{$student->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('student_graduate.Return_Student')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close" style="color: red">
                    <span aria-hidden="false">&times;</span>
                </button>
            </div>

            <form method="post" action="{{route('graduateReturn')}}">
                @csrf
                <div class="modal-body">
                    <h5 style="color: red">{{trans('student_graduate.Return_Message')}}</h5>
                    <input type="hidden" id="id" name="id" value="{{$student->id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{trans('student_graduate.Confirm')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('student_graduate.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>