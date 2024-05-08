@extends('admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <ol class="breadcrumb m-0 page-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('all.dependence') }}"
                                    class="btn btn-info rounded-pill waves efect waves-light"><i
                                        class="fa-solid fa-backward-step"></i>
                                    {{ __('Dependences') }} </a>
                            </li>
                            <li class="breadcrumb-item">{{ __('New Dependence') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- end timeline content-->
                            <div class="tab-pane" id="settings">
                                <form method="post" action="{{ route('dependence.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">{{ __('Name') }}*</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i>{{ __('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                            <!-- end settings content-->
                            @if (Session::has('notification'))
                                <div class="alert alert-{{ Session::get('notification.alert-type') }}">
                                    {{ Session::get('notification.message') }}
                                </div>
                            @endif

                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->
        </div> <!-- container -->
    </div> <!-- content -->
@endsection
