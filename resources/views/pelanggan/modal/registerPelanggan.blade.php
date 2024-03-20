<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label">Name <span style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="name" value=""
                            placeholder="Enter your name" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="emailRegister" class="col-sm-3 col-form-label">Email <span
                            style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="emailRegister" id="email" value=""
                            placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="passwordRegister" class="col-sm-3 col-form-label">Password <span
                            style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="passwordRegister"
                            placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-sm-3 col-form-label">Address 1 <span
                            style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" id="address"
                            placeholder="Enter your address" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address2" class="col-sm-3 col-form-label">Address 2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address2" id="address2"
                            placeholder="Enter your address 2">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tlp" class="col-sm-3 col-form-label">Phone <span
                            style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="tlp" id="tlp"
                            placeholder="Enter your phone" required>
                    </div>
                </div>
                <div class="mb-5 row">
                    <label for="date" class="col-sm-3 col-form-label">Date of Birth <span
                            style="color: red">*</span></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="date" id="date"
                            placeholder="Enter your phone" required>
                    </div>
                </div>
                <button type="button" class="btn btn-danger col-sm-12" data-bs-dismiss="modal">Close</button>
                <p class="my-2 text-center" style="font-size: 12px;">If you have an account, please login
                </p>
                <button type="button" class="btn btn-success col-sm-12" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">Login</button>
            </div>
        </div>
    </div>
</div>
