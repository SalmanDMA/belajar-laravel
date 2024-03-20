@extends('pelanggan.layout.index')

@section('content')
    <h4 class="mt-5">Keranjang</h4>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5>Payment List</h5>
            </div>
            <div class="card-body">
                <table class="table table-responsive table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Id Transaction</th>
                            <th>Nama Penerima</th>
                            <th>Total Transaction</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle text-center">
                        @foreach ($allTransaction as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->code_transaction }}</td>
                                <td>{{ $transaction->name_customer }}</td>
                                <td>{{ $transaction->total_price }}</td>
                                <td>
                                    <span
                                        class="badge {{ $transaction->status === 'unpaid' ? 'text-bg-danger' : 'text-bg-primary' }}">{{ $transaction->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('keranjang.bayar', ['id' => $transaction->id]) }}"
                                        class="btn btn-sm btn-success bayar" data-id="{{ $transaction->id }}">Bayar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
