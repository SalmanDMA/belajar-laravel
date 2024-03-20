<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>

    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

    <title>Toko Online Kita | {{ $title }}</title>

    <style>
        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%,
                    hsl(218, 41%, 35%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%),
                radial-gradient(1250px circle at 100% 100%,
                    hsl(218, 41%, 45%) 15%,
                    hsl(218, 41%, 30%) 35%,
                    hsl(218, 41%, 20%) 75%,
                    hsl(218, 41%, 19%) 80%,
                    transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 0%, 100%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }

        .title-custom {
            padding-right: 50px;
        }

        @media (max-width: 768px) {
            .title-custom {
                padding-right: 0;
            }
        }
    </style>
</head>

<body>

    <main>
        <section class="background-radial-gradient d-flex align-items-center justify-content-center"
            style="min-height: 100vh">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0 text-lg-start text-center title-custom" style="z-index: 10">
                        <h1 class="my-5 display-5 fw-bold ls-tight " style="color: hsl(218, 81%, 95%)">
                            The best experience <br />
                            <span style="color: hsl(218, 81%, 75%)">to enjoy online shopping</span>
                        </h1>
                        <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                            Toko Online Kita provides a wide range of products that you can buy very easily and quickly,
                            of course, with an interesting and unforgettable experience when shopping.
                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                        <div class="card bg-glass">
                            <div class="px-4 pt-5 px-md-5">
                                <h5 class="mb-0 p-0 title-custom text-center fs-2 fw-bold">{{ $name }}</h5>
                            </div>
                            <div class="card-body px-4 pt-4 px-md-5">
                                <form action="{{ route('loginProses') }}" method="POST">
                                    @csrf

                                    @if (session()->has('error'))
                                        <script>
                                            let timerInterval;
                                            Swal.fire({
                                                title: "Error!",
                                                icon: "error",
                                                html: "<b>Oopps!</b> " + "{{ session('error') }}",
                                                timer: 3000,
                                                timerProgressBar: true,
                                            })
                                        </script>
                                    @endif


                                    @if (session()->has('success'))
                                        <script>
                                            let timerInterval;
                                            Swal.fire({
                                                title: "Success!",
                                                icon: "success",
                                                html: "{{ session('success') }}",
                                                timer: 3000,
                                                timerProgressBar: true,
                                            })
                                        </script>
                                    @endif


                                    <!-- Name input -->
                                    {{-- <div class="form-outline mb-4">
                                        <label class="form-label" for="name">Name</label>
                                        <input type="text" id="name" class="form-control" name="name" />
                                    </div> --}}

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" id="email" class="form-control" name="email" />
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="position-relative">
                                            <input type="password" id="password" name="password"
                                                class="form-control" />
                                            <i class="fa fa-eye fs-6 bg-white p-2" id="togglePassword"
                                                style="position: absolute; top: 50%; right: 3%; transform: translateY(-50%); cursor: pointer; width: 30px"></i>
                                        </div>
                                    </div>


                                    <!-- Checkbox -->
                                    <div class="d-flex justify-content-between mb-4">
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="remember" />
                                            <label class="form-check-label" for="remember">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="#!" class="text-body">Forgot password?</a>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary w-100 mb-4">
                                        Sign in
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>or sign in with:</p>
                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-google"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-twitter"></i>
                                        </button>

                                        <button type="button" class="btn btn-link btn-floating mx-1">
                                            <i class="fab fa-github"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('sweetalert::alert')


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/custom.js') }}"></script>



    <script>
        async function encryptData(data) {
            return new Promise(resolve => {
                const encryptedData = btoa(data); // Mengenkripsi data menggunakan base64
                resolve(encryptedData);
            });
        }

        async function decryptData(encryptedData) {
            return new Promise(resolve => {
                const decryptedData = atob(encryptedData); // Mendekripsi data menggunakan base64
                resolve(decryptedData);
            });
        }


        document.addEventListener('DOMContentLoaded', async function() {
            const togglePassword = document.querySelector('#togglePassword');
            const remember = document.querySelector('#remember');
            const emailInput = document.querySelector('#email');
            const encryptedKeyEmail = await encryptData('email');
            const encryptedKeyRemember = await encryptData('rememberMe');

            async function setEmailFromLocalStorage() {
                const storedEncryptedEmail = localStorage.getItem(encryptedKeyEmail);
                if (storedEncryptedEmail) {
                    const decryptedEmail = await decryptData(storedEncryptedEmail);
                    emailInput.value = decryptedEmail;
                }
            }

            setEmailFromLocalStorage();

            togglePassword.addEventListener('click', function(e) {
                const password = document.querySelector('#password');
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
                this.classList.toggle('fa-eye');
            });

            remember.addEventListener('change', async function(e) {
                if (this.checked) {
                    const encryptedEmail = await encryptData(emailInput.value);
                    const encryptedRememberMe = await encryptData(remember.checked);
                    localStorage.setItem(encryptedKeyRemember, encryptedRememberMe);
                    localStorage.setItem(encryptedKeyEmail, encryptedEmail);
                } else {
                    localStorage.removeItem(encryptedKeyEmail);
                    localStorage.removeItem(encryptedKeyRemember);
                }
            });

            const rememberMe = localStorage.getItem(encryptedKeyRemember);
            if (rememberMe) {
                remember.checked = true;
            }
        });
    </script>


</body>

</html>
