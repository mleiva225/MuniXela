@extends('admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    @php
        $titleIcon = '<i class="fa-solid fa-clipboard-check"></i>';
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
                            <h4> {{ __('edit-responsibility-:attribute', ['attribute' => $sheet->series]) }}
                                {!! $titleIcon !!}</h4>
                        </div>
                        <ol class="breadcrumb m-0 page-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('all.responsibility') }}"
                                    class="btn btn-info rounded-pill waves efect waves-light">{!! $returnIcon !!}
                                    {{ __('responsibilities') }} </a>
                            </li>
                            <li class="breadcrumb-item">{{ __('edit-responsibility') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-8 col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('notification'))
                                <div class="alert alert-{{ Session::get('notification.alert-type') }}">
                                    {{ Session::get('notification.message') }}
                                </div>
                            @endif

                            <div class="tab-pane" id="settings">
                                <form method="post" action="{{ route('responsibility.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $sheet->id }}">

                                    <div class="row"> <!-- init row -->

                                        <div class="col-md-4">
                                            <div class="mb-3">
                                                <label for="series" class="form-label">{{ __('series') }}*</label>
                                                <input type="text" name="series"
                                                    class="form-control @error('series') is-invalid @enderror"
                                                    value="{{ $sheet->series }}">
                                                @error('series')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- end row -->

                                    <div class="text-end">
                                        <button type="submit"
                                            class="btn btn-success waves-effect waves-light mt-2">{!! $saveIcon !!}
                                            {{ __('save') }} </button>
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
