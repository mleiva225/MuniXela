<div class="navbar navbar-public mb-2">
    <div class="container-fluid">

        <!-- LOGO -->
        <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
            <span class="logo-sm ml-5">
                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/assets/images/logo-light1.png') }}" alt="" height="60">
            </span>
        </a>

        <a href="{{ route('login') }}" class="nav-link">
            <span class="btn btn-success">
                <i class="fa-solid fa-right-to-bracket"></i> {{ __('log-in') }}
            </span>
        </a>
    </div>
</div>
