<div class="modal fade" id="graduateStudent{{$student->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{trans('student.Graduate_Student')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('Graduate_Student')}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="modal-title" style="color: red">{{trans('student.Graduate_Message')}}</h6>
                            <input type="hidden" name="id" id="id" value="{{$student->id}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">{{trans('student.Confirm')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="close">{{trans('student.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>