@extends('pelanggan.layout.index')

@section('content')
    <div class="row my-5">
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    Category
                </div>
                <div class="card-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Men
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-3">
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>T-Shirt</span>
                                        </a>
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>Shoes</span>
                                        </a>
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>Trousers</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                    aria-controls="flush-collapseTwo">
                                    Woman
                                </button>
                            </h2>
                            <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-3">
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>T-Shirt</span>
                                        </a>
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>Shoes</span>
                                        </a>
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>Trousers</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseThree" aria-expanded="false"
                                    aria-controls="flush-collapseThree">
                                    Kid's
                                </button>
                            </h2>
                            <div id="flush-collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                    <div class="d-flex flex-column gap-3">
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>T-Shirt</span>
                                        </a>
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>Shoes</span>
                                        </a>
                                        <a href="#" class="page-link d-flex gap-2 align-items-center">
                                            <i class="fa fa-plus"></i>
                                            <span>Trousers</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 d-flex flex-wrap gap-4">
            @if (count($data) == 0)
                <h3>Product Not Found</h3>
            @else
                @foreach ($data as $item)
                    <div class="card" style="width: 220px;">
                        <div class="card-header" style="border-radius: 5px; height: 220px">
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
                            <button class="btn btn-outline-primary d-flex gap-2 align-items-center"
                                style="font-size: 20px;">
                                <i class="fa-solid fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                @endforeach
                <div class="w-100 mt-4">
                    <div class="pagination d-flex align-items-center justify-content-between">
                        <div class="showData">
                            Data ditampilkan {{ $data->count() }} dari {{ $data->total() }}
                        </div>
                        <div>
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
