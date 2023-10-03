<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Inicio de Sesión
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{  asset('backend/assets/images/favicon.ico') }}">

    <!-- Bootstrap css -->
    <link href="{{  asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{  asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{  asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{  asset('backend/assets/js/head.js') }}"></script>

</head>

<body class="authentication-bg authentication-bg-pattern" data-theme="dark">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="{{ route('dashboard') }}" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{  asset('backend/assets/images/logo-light1.png') }}" alt="" height="150">
                                        </span>
                                    </a>

                                    <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{  asset('backend/assets/images/logo-light1.png') }}" alt="" height="150">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Ingresa tu correo y contraseña para acceder.</p>
                            </div>
                            <br>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="login" class="form-label">Email/User/Telefono'</label>
                                    <input class="form-control @error('login') is-invalid @enderror" name="login" type="text" id="login" required="" placeholder="Ingresa con email, usuario o telefono">
                                    @error('login')
                                    <span class="text-danger"> El usuario o contraseña es incorrecto </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                                        @error('password')
                                        <span class="text-danger"> El usuario o contraseña es incorrecto </span>
                                        @enderror
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                        <label class="form-check-label" for="checkbox-signin">Recuerdame</label>
                                    </div>
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-primary" type="submit"> Iniciar sesion </button>
                                </div>

                            </form>

                            <div class="row mt-3">
                                <div class="col-12 text-center">
                                    <p> @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                        @endif
                                    </p>
                                </div>
                            </div> <!-- end card-body -->
                        </div>

                        <div class="flex items-center justify-end mt-4">

                        </div>
                        <!-- end card -->

                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2023 - <script>
        </script> &copy; Municipalidad de Quetzaltenango <a href="" class="text-white-50">Universidad Mariano Galvez.</a>
    </footer>

    <!-- Vendor js -->
    <script src="{{  asset('backend/assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{  asset('backend/assets/js/app.min.js') }}"></script>

</body>

</html>