<div class="modal fade" id="modalDemo2{{$student->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h3 class="modal-title">{{trans('student.Delete_Student')}}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('Student.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="modal-title" style="color: red">{{trans('student.Delete_Message')}}</h5>
                            <input type="hidden" name="id" id="id" value="{{$student->id}}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('student.Delete_Student')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="close">{{trans('student.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>