<!-- Modal -->
<div class="modal fade" id="edit{{ $unit->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="customModalTwoLabel" aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalTwoLabel">Unit Create Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('units.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Unit Name:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name" value="{{ $unit->name }}">
                    </div>
                </div>
                <div class="modal-footer custom">
                    <div class="left-side">
                        <button type="button" class="btn btn-link danger" data-dismiss="modal">Cancel</button>
                    </div>
                    <div class="divider"></div>
                    <div class="right-side">
                        <button type="submit" class="btn btn-link success">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
