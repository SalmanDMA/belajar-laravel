@extends('pelanggan.layout.index')

@section('content')
    <form action="{{ route('checkout.bayar') }}" method="POST">
        @csrf
        <div class="row mt-5 mb-5">
            <div class="col-12 mb-3 mb-lg-0  col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Please Enter Your Shipping Address</h3>

                        <div class="d-flex flex-column gap-3 mt-3">
                            <div class="row">
                                <label for="recipient-name" class="col-4  col-form-label">Recipient Name :</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="recipient-name"
                                        placeholder="Enter your recipient name" name="recipient_name" autofocus>
                                </div>
                            </div>
                            <div class="row">
                                <label for="recipient-address" class="col-4 col-form-label">Recipient Address :</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="recipient-address"
                                        placeholder="Enter your recipient address" name="recipient_address" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="recipient-phone" class="col-4 col-form-label">Recipient Phone :</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" id="recipient-phone"
                                        placeholder="Enter your recipient phone" name="recipient_phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <label for="expedition" class="col-4 col-form-label">Expedition :</label>
                                <div class="col-8">
                                    <select name="expedition" id="expedition" class="form-select" required>
                                        <option value="">-- Choose an Expedition --</option>
                                        <option value="jnt">J&T Express</option>
                                        <option value="jne">JNE Express</option>
                                        <option value="sicepat">Sicepat Express</option>
                                        <option value="ninja">Ninja Express</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <p class="m-0 text-center fw-bold fs-5">Order Summary</p>
                        <p class="m-0 text-center">{{ $codeTransaction }}</p>
                    </div>
                    <div class="card-body payment">
                        <input type="hidden" name="code_transaction" value="{{ $codeTransaction }}">
                        <div class="d-flex flex-column gap-3 mt-3">
                            <div class="row">
                                <label for="subtotal" class="col-sm-6 col-form-label">Subtotal</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control subtotal" id="subtotal"
                                        value="{{ $detailBelanja }}" name="subtotal" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label for="discount" class="col-sm-6 col-form-label">Discount</label>
                                <div class="col-sm-6">
                                    @if (Auth::user())
                                        <input type="number" class="form-control discount" id="discount" value="0.1"
                                            name="discount" readonly>
                                    @else
                                        <input type="number" class="form-control discount" id="discount" value="0"
                                            name="discount" readonly>
                                    @endif

                                </div>
                            </div>
                            <div class="row">
                                <label for="tax" class="col-sm-6 col-form-label">Tax</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control tax" id="tax" name="tax" readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label for="shipping" class="col-sm-6 col-form-label">Shipping</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control shipping" id="shipping" name="shipping"
                                        readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label for="total" class="col-sm-6 col-form-label">Total</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control total" id="total" name="total"
                                        readonly>
                                </div>
                            </div>
                            <div class="row">
                                <label for="totalProduct" class="col-sm-6 col-form-label">Total Product</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control totalProduct" id="totalProduct"
                                        name="totalProduct" readonly value="{{ $jumlahBelanja }}">
                                </div>
                            </div>
                            <div class="row">
                                <label for="totalQty" class="col-sm-6 col-form-label">Total Qty</label>
                                <div class="col-sm-6">
                                    <input type="number" class="form-control totalQty" id="totalQty" name="totalQty"
                                        readonly value="{{ $qtyOrder }}">
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-success d-flex align-items-center gap-2 justify-content-center my-3">
                                <i class="fas fa-print"></i>
                                <span>Print</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
