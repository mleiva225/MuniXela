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
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Editar Item</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Editar Item</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>{{ __('new-item') }}</h5>

                                <div class="row"> <!-- init row -->
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="code" class="form-label">{{ __("code") }}*</label>
                                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}">
                                            @error('code')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{ __("name") }}*</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="quantity" class="form-label">{{ __("quantity") }}</label>
                                            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                                            @error('quantity')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="series" class="form-label">{{ __("series") }}</label>
                                            <input type="text" name="series" class="form-control @error('series') is-invalid @enderror" value="{{ old('series') }}">
                                            @error('series')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="sicoin_gl" class="form-label">{{ __("sicoin-gl") }}</label>
                                            <input type="text" name="sicoin_gl" class="form-control @error('sicoin_gl') is-invalid @enderror" value="{{ old('sicoin_gl') }}">
                                            @error('sicoin_gl')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="observations" class="form-label">{{ __("observations") }}</label>
                                            <input type="text" name="observations" class="form-control @error('observations') is-invalid @enderror" value="{{ old('observations') }}">
                                            @error('observations')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="created_at" class="form-label">{{ __("created-at") }}</label>
                                            <input type="date" name="created_at" class="form-control @error('created_at') is-invalid @enderror" value="{{ $fecha_actual }}" readonly>
                                            @error('created_at')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="updated_at" class="form-label">{{ __("updated-at") }}</label>
                                            <input type="date" name="updated_at" class="form-control @error('updated_at') is-invalid @enderror" value="{{ $fecha_actual }}" readonly>
                                            @error('updated_at')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="description" class="form-label">{{ __("description") }}</label>
                                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                                            @error('description')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Guardar</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection