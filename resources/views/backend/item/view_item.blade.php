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
                            <h4> {{ __('item') }} <i class="fa-solid fa-boxes-stacked"></i></h4>
                        </div>
                        <ol class="breadcrumb m-0 page-title">
                            <li class="breadcrumb-item "><a href="{{ route('all.item') }}" class="link text-primary"><i
                                        class="fa-solid fa-backward-step"></i> {{ __('items') }} </a></li>
                            <li class="breadcrumb-item">{{ __('edit-item-:attribute', ['attribute' => $item->code]) }}</li>
                        </ol>
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

                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                    <h5 class="mb-4 text-uppercase"><i
                                            class="mdi mdi-account-circle me-1"></i>{{ __('edit-item') }}</h5>

                                    <div class="row"> <!-- init row -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="code" class="form-label">{{ __('code') }}*</label>
                                                <input type="text" name="code"
                                                    class="form-control @error('code') is-invalid @enderror"
                                                    value="{{ $item->code }}" readonly>
                                                @error('code')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">{{ __('name') }}*</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $item->name }}" autocomplete="name" readonly>
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="quantity" class="form-label">{{ __('quantity') }}</label>
                                                <input type="number" name="quantity"
                                                    class="form-control @error('quantity') is-invalid @enderror"
                                                    value="{{ $item->quantity }}" readonly>
                                                @error('quantity')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="series" class="form-label">{{ __('series') }}</label>
                                                <input type="text" name="series"
                                                    class="form-control @error('series') is-invalid @enderror"
                                                    value="{{ $item->series }}" readonly>
                                                @error('series')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label for="sicoin_gl" class="form-label">{{ __('sicoin-gl') }}</label>
                                                <input type="text" name="sicoin_gl"
                                                    class="form-control @error('sicoin_gl') is-invalid @enderror"
                                                    value="{{ $item->sicoin_gl }}" readonly>
                                                @error('sicoin_gl')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="observations"
                                                    class="form-label">{{ __('observations') }}</label>
                                                <input type="text" name="observations"
                                                    class="form-control @error('observations') is-invalid @enderror"
                                                    value="{{ $item->observations }}" readonly>
                                                @error('observations')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="created_at" class="form-label">{{ __('created-at') }}</label>
                                                <input type="datetime" name="created_at"
                                                    class="form-control @error('created_at') is-invalid @enderror"
                                                    value="{{ $item->created_at }}" readonly>
                                                <small class="text-muted">{{ __('format-datetime-desc') }}</small>
                                                @error('created_at')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="updated_at" class="form-label">{{ __('updated-at') }}</label>
                                                <input type="datetime" name="updated_at"
                                                    class="form-control @error('updated_at') is-invalid @enderror"
                                                    value="{{ $item->updated_at }}" readonly>
                                                <small class="text-muted">{{ __('format-datetime-desc') }}</small>
                                                @error('updated_at')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="description"
                                                    class="form-label">{{ __('description') }}</label>
                                                <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                                    value="{{ $item->description }}" readonly></textarea>
                                                @error('description')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
