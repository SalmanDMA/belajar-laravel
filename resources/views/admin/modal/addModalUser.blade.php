<div class="modal modal-lg fade" id="addModalUser" tabindex="-1" aria-labelledby="addModalUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalUserLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('addDataUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="nik" name="nik"
                                value="{{ $nik }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="role" id="role" class="form-select" id="role">
                                <option value="">-- Choose an option --</option>
                                <option value="1">Admin</option>
                                <option value="0">Manager</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <img src="" alt="" id="preview" style="width: 100px;" class="mb-2">
                            <input type="file" class="form-control" id="image" name="image"
                                accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#addModalUser').on('hidden.bs.modal', function() {
        $('#preview').attr('src', '');
        $('#preview').hide();
        $('#image').val('');
    })

    $('#addModalUser').on('shown.bs.modal', function() {
        $('#image').on('change', function() {
            const file = this.files[0];
            const preview = $('#preview')[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $(preview).attr('src', e.target
                        .result);
                    $(preview).css('display',
                        'block');
                }
                reader.readAsDataURL(file);
            } else {
                console.error('No file selected.');
            }
        });
    });
</script>
