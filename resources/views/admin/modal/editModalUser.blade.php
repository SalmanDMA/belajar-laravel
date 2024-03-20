<div class="modal modal-lg fade" id="editModalUser" tabindex="-1" aria-labelledby="editModalUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalUserLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateDataUser', $data['id']) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="nik" name="nik"
                                value="{{ $data['nik'] }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data['name'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email"
                                value="{{ $data['email'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $data['address'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $data['phone'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="role" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                            <select name="role" id="role" class="form-select">
                                <option value="">-- Choose an option --</option>
                                <option value="1" {{ $data['role'] == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $data['role'] == '0' ? 'selected' : '' }}>Manager
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="date" name="date"
                                value="{{ date('Y-m-d', strtotime($data['date_of_birth'])) }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <img src="{{ asset('storage/user/' . $data['image']) }}" alt="{{ $data['name'] }}"
                                id="preview" style="width: 100px;" class="mb-2">
                            <input type="hidden" name="oldImage" id="oldImage" value="{{ $data['image'] }}">
                            <input type="file" class="form-control" id="image" name="image"
                                accept=".jpg, .jpeg, .png">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#editModalUser').on('hidden.bs.modal', function() {
        $('#preview').attr('src', '');
        $('#preview').hide();
        $('#image').val('');
    })

    $('#editModalUser').on('shown.bs.modal', function() {
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
