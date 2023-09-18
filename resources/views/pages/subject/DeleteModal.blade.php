<div class="modal fade" id="DeleteModal{{$subject->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('subject.Delete')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="false" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('Subject.destroy','test')}}">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">
                    <h4 style="color: red">{{trans('subject.Delete_message')}}</h4>
                    <input type="hidden" name="id" id="id" value="{{$subject->id}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('subject.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('subject.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
