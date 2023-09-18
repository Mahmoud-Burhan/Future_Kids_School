<div class="modal fade" id="DeleteModal{{$online_class->meeting_id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('online_classes.Delete')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="false" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('TeacherOnlineClasses.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <h4 style="color: red">{{trans('online_classes.Delete_message')}}</h4>
                    <input type="hidden" name="id" value="{{$online_class->id}}">
                    <input type="hidden" name="meeting_id" value="{{$online_class->meeting_id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('online_classes.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('online_classes.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
