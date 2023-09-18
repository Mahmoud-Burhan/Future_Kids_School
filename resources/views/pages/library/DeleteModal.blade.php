<div class="modal fade" id="DeleteModal{{$library->id}}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{trans('library.Delete')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="false" style="color: red">&times;</span>
                </button>
            </div>
            <form method="post" action="{{route('delete_all')}}">
                @csrf
                <div class="modal-body">
                    <h4 style="color: red">{{trans('library.Delete_message')}}</h4>
                    <input type="hidden" name="id" value="{{$library->id}}">
                    <input type="hidden" name="file_name" id="file_name" value="{{$library->file_name}}">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">{{trans('library.Delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('library.Close')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
