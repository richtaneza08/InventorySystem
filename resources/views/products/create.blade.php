<!-- Modal -->
<div class="modal fade" id="customModalTwo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="customModalTwoLabel" aria-hidden="true"
>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customModalTwoLabel">Products Create Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Image:</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Product Name:</label>
                        <input type="text" name="name" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Categories:</label>
                        <select class="form-control" name="categories_id" placeholder="Please Select Categories">
                            <option value="">Please Select Categories</option>
                            @foreach ($categories as $categoriesId => $categoriesName)
                                <option value="{{ $categoriesId }}" {{ old('categories_id') == $categoriesId ? 'selected' : '' }}>
                                    {{ $categoriesName }}
                                </option>
                            @endforeach
                        </select>
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
