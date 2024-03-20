<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="emailLogin" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="emailLogin" value=""
                            placeholder="Enter your email">
                    </div>
                </div>
                <div class="mb-5 row">
                    <label for="passwordLogin" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="passwordLogin"
                            placeholder="Enter your password">
                    </div>
                </div>
                <button type="button" class="btn btn-success col-sm-12">Login</button>
                <p class="my-2 text-center" style="font-size: 12px;">If you don't have an account, please register first
                </p>
                <button type="button" class="btn btn-primary col-sm-12" data-bs-toggle="modal"
                    data-bs-target="#registerModal">Register</button>
            </div>
        </div>
    </div>
</div>
