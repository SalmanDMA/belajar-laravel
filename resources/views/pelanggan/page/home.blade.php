@extends('pelanggan.layout.index')

@section('content')
    <h4 class="mt-5">Best Seller</h4>
    <div class="content mb-3 row">
        @if ($best->isEmpty())
            <h3 class="col-md-12">Prodoct Best Seller Not Found</h3>
        @else
            @foreach ($best as $item)
                <div class="col-sm-12 col-md-6 col-lg-3 p-1">
                    <div class="card w-100">
                        <div class="card-header p-4" style="border-radius: 5px; height: 220px">
                            <img src="{{ asset('storage/product/' . $item->image) }}" alt="contoh baju"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <p class="m-0 text-justify">{{ $item->name }}</p>
                            <p class="m-0"><i class="fa-regular fa-star"></i> 5+</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p class="m-0" style="font-size: 16px; font-weight: 600;">
                                <span class="mr-2">IDR</span>
                                <span>{{ number_format($item->price) }}</span>
                            </p>
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-outline-primary d-flex gap-2 align-items-center"
                                    style="font-size: 20px;">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    @endif
    <h4 class="mt-5">New Products</h4>
    <div class="content mb-3 row">
        @if ($data->isEmpty())
            <h3 class="col-md-12">Prodct Not Found</h3>
        @else
            @foreach ($data as $item)
                <div class="col-sm-12 col-md-6 col-lg-3 p-1">
                    <div class="card w-100">
                        <div class="card-header p-4" style="border-radius: 5px; height: 220px">
                            <img src="{{ asset('storage/product/' . $item->image) }}" alt="contoh baju"
                                style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div class="card-body">
                            <p class="m-0 text-justify">{{ $item->name }}</p>
                            <p class="m-0"><i class="fa-regular fa-star"></i> 5+</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p class="m-0" style="font-size: 16px; font-weight: 600;">
                                <span class="mr-2">IDR</span>
                                <span>{{ number_format($item->price) }}</span>
                            </p>
                            <form action="{{ route('addToCart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="productId" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-outline-primary d-flex gap-2 align-items-center"
                                    style="font-size: 20px;">
                                    <i class="fa-solid fa-cart-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>
    @endif
@endsection
