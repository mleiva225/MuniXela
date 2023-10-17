@extends('admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    @php
        $titleIcon = '<i class="fa-solid fa-box"></i>';
        $returnIcon = '<i class="fa-solid fa-backward-step"></i>';
        $saveIcon = '<i class="mdi mdi-content-save"></i>';
    @endphp

    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <h4> {{ __('edit-item-:attribute', ['attribute' => $item->code]) }} {!! $titleIcon !!}</h4>
                        </div>
                        <ol class="breadcrumb m-0 page-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('all.item') }}"
                                    class="btn btn-info rounded-pill waves efect waves-light">{!! $returnIcon !!}
                                    {{ __('items') }} </a>
                            </li>
                            <li class="breadcrumb-item">{{ __('edit-item') }}</li>
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
                                <form method="post" action="{{ route('item.update') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $item->id }}">

                                    <div class="row"> <!-- init row -->
                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="code" class="form-label">{{ __('code') }}*</label>
                                                <input type="text" name="code"
                                                    class="form-control @error('code') is-invalid @enderror"
                                                    value="{{ $item->code }}">
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
                                                    value="{{ $item->name }}" autocomplete="name">
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
                                                    value="{{ $item->quantity }}">
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
                                                    value="{{ $item->series }}">
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
                                                    value="{{ $item->sicoin_gl }}">
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
                                                    value="{{ $item->observations }}">
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
                                                    value="{{ $item->description }}"></textarea>
                                                @error('description')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2">{!! $saveIcon !!} {{ __('save') }} </button>
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
