@extends('admin.layout.index')

@section('content')
    <div class="card mb-1">
        <div class="card-body d-flex justify-content-between align-items-center">
            <div class="filter d-flex gap-3">
                <input type="date" class="form-control" name="start_date">
                <input type="date" class="form-control" name="end_date">
                <button class="btn btn-primary">Filter</button>
            </div>
            <input type="text" class="form-control w-25" placeholder="Search...">
        </div>
    </div>
    <div class="card">
        <div class="card-header bg-transparent">
            <button class="btn btn-info d-flex align-items-center gap-2" id="addDataUser">
                <i class="fa fa-plus">
                </i>
                <span>Add User</span>
            </button>
        </div>
        <div class="card-body">
            <table class="table table-responsive table-striped">
                <thead>
                    <tr class="align-middle text-center">
                        <th>No</th>
                        <th>Image</th>
                        <th>NIK</th>
                        <th>Join Date</th>
                        <th>Date of Birth</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr class="align-middle text-center">
                            <td>{{ $data->firstItem() + $loop->index }}</td>
                            <td>
                                <img src="{{ asset('storage/user/' . $item->image) }}" alt="{{ $item->name }}"
                                    style="width: 50px; height: 50px;">
                            </td>
                            <td>{{ $item->nik }}</td>
                            <td>{{ $item->created_at->format('m-d-Y') }}</td>
                            <td>{{ date('m-d-Y', strtotime($item->date_of_birth)) }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ($item->role == 1)
                                    <span class="badge bg-primary">Admin</span>
                                @else
                                    <span class="badge bg-success">Manager</span>
                                @endif
                            </td>

                            <td>
                                @if ($item->is_active == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Non Active</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <input type="hidden" id="nik" value="{{ $item->nik }}">
                                    <button class="btn btn-warning d-flex align-items-center gap-2 editModalUser"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-danger d-flex align-items-center gap-2 deleteModalUser"
                                        data-id="{{ $item->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination d-flex align-items-center justify-content-between">
                <div class="showData">
                    Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                </div>
                <div>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
    <div class="showData" style="display: none;"></div>
    <div class="showEditData" style="display: none;"></div>

    <script>
        $('#addDataUser').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('addModalUser') }}",
                type: 'get',
                success: function(response) {
                    $('.showData').html(response).show();
                    $('#addModalUser').modal('show');
                }
            })
        })

        $('.editModalUser').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('editUser', ['id' => ':id']) }}".replace(':id', id),
                type: 'get',
                success: function(response) {
                    $('.showEditData').html(response).show();
                    $('#editModalUser').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.deleteModalUser').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var nik = $('#nik').val();
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener("mouseenter", Swal.stopTimer);
                    toast.addEventListener("mouseleave", Swal.resumeTimer);
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                },
            });

            Swal.fire({
                title: 'Delete Data ?',
                text: "Are you sure want to delete Nik " + nik + " ?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "{{ route('deleteUser', ['id' => ':id']) }}".replace(
                            ':id', id),
                        dataType: "json",
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: "success",
                                    title: response.success,
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: 'Error',
                                text: 'Terjadi kesalahan saat menghapus data',
                                icon: 'error'
                            });
                        }
                    });
                }
            })
        });
    </script>
@endsection
