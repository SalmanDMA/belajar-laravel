<div class="modal modal-lg fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateData', $data['id']) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="sku" class="col-sm-3 col-form-label">Sku</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" id="sku" name="sku"
                                value="{{ $data['sku'] }}" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $data['name'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="type" class="col-sm-3 col-form-label">Product Type</label>
                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-select" id="type">
                                <option value="">-- Choose an option --</option>
                                <option value="pants" {{ $data['type'] == 'pants' ? 'selected' : '' }}>Pants</option>
                                <option value="clothes" {{ $data['type'] == 'clothes' ? 'selected' : '' }}>Clothes
                                </option>
                                <option value="accessories" {{ $data['type'] == 'accessories' ? 'selected' : '' }}>
                                    Accessories</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="category" class="col-sm-3 col-form-label">Category Product</label>
                        <div class="col-sm-9">
                            <select name="category" id="category" class="form-select" id="category">
                                <option value="">-- Choose an option --</option>
                                <option value="men" {{ $data['category'] == 'men' ? 'selected' : '' }}>Men</option>
                                <option value="woman" {{ $data['category'] == 'woman' ? 'selected' : '' }}>Woman
                                </option>
                                <option value="kids" {{ $data['category'] == 'kids' ? 'selected' : '' }}>Kids</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="price" class="col-sm-3 col-form-label">Price</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $data['price'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="qty" class="col-sm-3 col-form-label">Quantity Product</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="qty" name="qty"
                                value="{{ $data['qty'] }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="image" class="col-sm-3 col-form-label">Photo Product</label>
                        <div class="col-sm-9">
                            <img src="{{ asset('storage/product/' . $data['image']) }}" alt="{{ $data['name'] }}"
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
    $('#editModal').on('hidden.bs.modal', function() {
        $('#preview').attr('src', '');
        $('#preview').hide();
        $('#image').val('');
    })

    $('#editModal').on('shown.bs.modal', function() {
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
