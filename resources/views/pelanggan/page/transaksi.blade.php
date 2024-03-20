@extends('pelanggan.layout.index')

@section('content')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    <h3 class="mt-5">Cart ({{ $data->count() . ' item' }})</h3>
    @if ($data->isEmpty())
        <h3 class="col-md-12">Prodct Not Found</h3>
    @else
        @foreach ($data as $index => $item)
            <form action="{{ route('checkout.product', $item->id) }}" method="POST">
                @csrf
                <div class="card mb-5">
                    <div class="card-body d-flex align-items-center mx-5">
                        <img src="{{ asset('storage/product/' . $item->product->image) }}" alt="product baju"
                            style="width: 220px; height: auto; max-height: 200px">
                        <div class="desc ms-5 w-100">
                            <p style="font-size: 24px; font-weight: 700">{{ $item->product->name }}</p>
                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                            <input type="number" class="form-control mb-3 border-0 fs-1 price"
                                id="price{{ $index }}" value="{{ $item->price }}" name="price" readonly>
                            <div class="row align-items-center mb-3">
                                <label for="qty" class="col-sm-2 col-form-label fs-5">Quantity :</label>
                                <div class="col-sm-10 row">
                                    <button class="col-sm-1 rounded-start bg-secondary p-2 border-0 plus">+</button>
                                    <input type="number" name="qty" class="col-sm-1 text-center qty" id="qty"
                                        min="0" value="{{ $item->qty }}" max="9999" name="qty" readonly
                                        id="qty{{ $index }}">
                                    <button class="col-sm-1 rounded-end bg-secondary p-2 border-0 minus">-</button>
                                </div>
                            </div>
                            <div class="row align-items-center mb-3">
                                <label for="total{{ $index }}" class="col-sm-2 col-form-label fs-5">Total :</label>
                                <input type="text" class="col-sm-10 form-control w-25 border-0 total" readonly
                                    id="total{{ $index }}" name="total">
                            </div>
                            <div class="row gap-2">


                                <button type="submit" class="btn btn-success d-flex align-items-center gap-2"
                                    style="max-width: max-content">
                                    <i class="fa fa-shopping-cart"></i>
                                    Checkout
                                </button>

                                <button class="btn btn-danger d-flex align-items-center gap-2"
                                    style="max-width: max-content">
                                    <i class="fa fa-trash-alt"></i>
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    @endif
@endsection
