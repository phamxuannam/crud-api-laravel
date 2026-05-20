<div class="modal fade" id="addFileModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Upload Files</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="addFile" action="{{ route('files.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="mb-3">
                        <label for="name" class="col-form-label">File Name:</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            id="name">
                        <span class="text-danger error-text name_error"></span>
                    </div>
                    @error('name')
                        <div class="btn btn-danger"></div>
                    @enderror

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">File:</label>
                        <input type="file" name="file" value="{{ old('file') }}" class="form-control"
                            id="file">
                        <span class="text-danger error-text file_error"></span>
                    </div>
                    @error('file')
                        <div class="btn btn-danger"></div>
                    @enderror

                    {{-- <div class="mb-3">
                        <label for="message-text" class="col-form-label">Size:</label>
                        <input type="number" name="size" value="{{ old('size') }}" class="form-control"
                            id="size">
                        <span class="text-danger error-text size_error"></span>
                    </div> --}}

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <input type="text-area" name="description" value="{{ old('description') }}" class="form-control"
                            id="description">
                        <span class="text-danger error-text description_error"></span>
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Create By:</label>
                        <input type="text" value="{{ Auth::user()->name }}" class="form-control" disabled>
                    </div>


                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>

            </form>
        </div>
    </div>
</div>
