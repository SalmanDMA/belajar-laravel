@extends('pelanggan.layout.index')

@section('content')
    <div class="row my-5 align-items-center">
        <div class="col-md-6">
            <div class="content-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis dolores aliquam perferendis
                porro. Earum, quas ipsam optio commodi illum in soluta. Ratione officia eaque quod voluptate quibusdam quia
                rem
                autem unde hic officiis reprehenderit, nisi, sequi quae perferendis animi repellat quaerat nulla alias
                maiores
                soluta aliquid at. Tenetur et ea nisi adipisci laboriosam quidem ipsa sit, laborum optio sunt labore
                repudiandae
                exercitationem minus officiis esse voluptates ratione harum perferendis laudantium quo nam velit autem
                repellendus similique. Consectetur, laboriosam numquam alias veniam odio culpa maxime maiores labore at
                quisquam
                quidem, ipsum dolorem sunt fugiat deleniti dicta modi beatae aut adipisci earum eum, in sit illo? Accusamus
                hic
                illo consequuntur eaque cumque, sunt, quibusdam ut quia earum tempore unde eius tempora blanditiis?
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('assets/images/profile.png') }}" alt="profile" style="width: 100%;">
        </div>

        <div class="d-flex gap-2 align-items-center justify-content-lg-between mt-2">
            <div class="d-flex gap-2 align-items-center">
                <i class="fa fa-users fa-2x"></i> <span class="fs-5">+ 300 Customers</span>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <i class="fas fa-home fa-2x"></i> <span class="fs-5">+ 300 Sellers</span>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <i class="fas fa-shirt fa-2x"></i> <span class="fs-5">+ 300 Products</span>
            </div>
        </div>


        <h4 class="text-center mt-5">Contact Us</h4>
        <hr class="mt-2" />
        <div class="row mt-2 mb-5">
            <div class="col-md-5">
                <div class="bg-secondary" style="width: 100%; height: 50vh; border-radius: 10px;"></div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center m-0 p-2">Criticisms & Suggestions</h4>
                    </div>
                    <div class="card-body">
                        <p class="p-0 mb-4 text-lg-center">Enter your criticisms and suggestions for us to improve our
                            service</p>
                        <div class="mb-3 row">
                            <label for="emailContact" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="emailContact" value=""
                                    placeholder="Enter your email">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="message" class="col-sm-2 col-form-label">Message</label>
                            <div class="col-sm-10">
                                <textarea name="message" id="message" class="form-control" placeholder="Enter your message"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4 w-100">Send Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
