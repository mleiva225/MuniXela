@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

@php
$titleIcon = '<i class="fa-solid fa-box"></i>';
$returnIcon = '<i class="fa-solid fa-backward-step"></i>';
$saveIcon = '<i class="mdi mdi-content-save"></i>';
$downloadIcon = '<i class="fa-solid fa-file-arrow-down"></i>';

$firstSectionIcon = '<i class="fa-solid fa-box"></i>';
$secondSectionIcon = '<i class="fa-solid fa-user-check"></i>';
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
                            <a href="{{ route('all.item') }}" class="btn btn-info rounded-pill waves efect waves-light">{!! $returnIcon !!}
                                {{ __('items') }} </a>
                        </li>
                        <li class="breadcrumb-item">{{ __('edit-item') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- start body -->
        <div class="row">
            <div class="col-lg-8 col-xl-12">
                <!-- start tab header -->
                <ul class="nav nav-tabs" id="itemTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="data-tab" data-bs-toggle="tab" data-bs-target="#data" type="button" role="tab" aria-controls="data" aria-selected="true">{{ __('general-data') }}</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="qr-tab" data-bs-toggle="tab" data-bs-target="#qr" type="button" role="tab" aria-controls="qr" aria-selected="false">{{ __('item-qr') }}</button>
                    </li>
                </ul>
                <!-- end tab header -->

                <div class="card">
                    <div class="card-body">

                        <!-- start tab content -->
                        <div class="tab-content" id="itemTabContent">

                            <!-- start data tab content -->
                            <div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">

                                <!-- Item section -->
                                <div class="row">

                                    <form method="post" action="{{ route('item.update') }}" enctype="multipart/form-data">
                                        @csrf

                                        <h5 class="mb-4 text-uppercase text-primary">{!! $firstSectionIcon !!}
                                            {{ __('item-section') }}
                                        </h5>

                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <input type="hidden" name="id_sheet" value="{{ '' }}">
                                        <input type="hidden" name="id_detail" value="{{ '' }}">

                                        <div class="row mb-4"> <!-- init row -->
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="code" class="form-label">{{ __('code') }}*</label>
                                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ $item->code }}">
                                                    @error('code')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">{{ __('name') }}*</label>
                                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $item->name }}" autocomplete="name">
                                                    @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="quantity" class="form-label">{{ __('quantity') }}</label>
                                                    <input type="number" name="quantity" readonly class="form-control @error('quantity') is-invalid @enderror" value="1">
                                                    @error('quantity')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="unit_value" class="form-label">{{ __('unit-value') }}</label>
                                                    <input type="number" name="unit_value" step="0.0001" class="form-control @error('unit_value') is-invalid @enderror" value="{{ $item->unit_value }}">
                                                    @error('unit_value')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="series" class="form-label">{{ __('series') }}</label>
                                                    <input type="text" name="series" class="form-control @error('series') is-invalid @enderror" value="{{ $item->series }}">
                                                    @error('series')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="sicoin_gl" class="form-label">{{ __('sicoin-gl') }}</label>
                                                    <input type="text" name="sicoin_gl" class="form-control @error('sicoin_gl') is-invalid @enderror" value="{{ $item->sicoin_gl }}">
                                                    @error('sicoin_gl')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="observations" class="form-label">{{ __('observations') }}</label>
                                                    <input type="text" name="observations" class="form-control @error('observations') is-invalid @enderror" value="{{ $item->observations }}">
                                                    @error('observations')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="created_at" class="form-label">{{ __('created-at') }}</label>
                                                    <input type="datetime" name="created_at" class="form-control @error('created_at') is-invalid @enderror" value="{{ $item->created_at }}" readonly>
                                                    <small class="text-muted">{{ __('format-datetime-desc') }}</small>
                                                    @error('created_at')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="updated_at" class="form-label">{{ __('updated-at') }}</label>
                                                    <input type="datetime" name="updated_at" class="form-control @error('updated_at') is-invalid @enderror" value="{{ $item->updated_at }}" readonly>
                                                    <small class="text-muted">{{ __('format-datetime-desc') }}</small>
                                                    @error('updated_at')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">{{ __('description') }}</label>
                                                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ $item->description }}"></textarea>
                                                    @error('description')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end row -->
                                        <!-- end Item section -->

                                        <!-- Responsible section -->
                                        <div class="row">
                                            <h5 class="mb-4 text-uppercase text-primary">{!! $secondSectionIcon !!}
                                                {{ __('responsible-section') }}
                                            </h5>

                                            <div class="row"> <!-- init row -->

                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Serie de hoja actual*</label>
                                                        <select name="sheet_series" class="form-control @error('sheet_series') is-invalid @enderror">
                                                            <option value="ninguno" {{ old('sheet_series', optional($item->sheetsdetail)->series) == 'ninguno' ? 'selected' : '' }}>Ninguno</option>
                                                            @foreach ($responsibility_sheets as $responsibility_sheet)
                                                            <option value="{{ $responsibility_sheet->id }}" {{ old('sheet_series', optional($item->sheetsdetail)->series) == $responsibility_sheet->series ? 'selected' : '' }}>
                                                                {{ $responsibility_sheet->series }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        @error('sheet_series')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="col-md-3">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Responsable actual</label>
                                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ optional($users->find(optional($item->sheetsdetail)->id_responsible))->name ?? '' }}">
                                                        @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>


                                            </div> <!-- end row -->

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2">{!! $saveIcon !!}
                                                    {{ __('save') }} </button>
                                            </div>

                                        </div><!-- end row -->
                                        <!-- end Responsible section -->

                                    </form>

                                </div> <!-- end row -->
                            </div> <!-- end data tab content -->

                            <!-- start qr tab content -->
                            <div class="tab-pane fade" id="qr" role="tabpanel" aria-labelledby="qr-tab">

                                <div class="row">
                                    <form method="get" action="{{ route('item.downloadqr', $item->id) }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="visible-print text-center">
                                            <img src="{{ asset($item->getQRPath()) }}" alt="QR Code image" title="{{ __('qr-item-:attribute', ['attribute' => $item->code]) }}">
                                            <span class="h3 d-block">{{ __('view-item-:attribute', ['attribute' => $item->code]) }}
                                            </span>

                                            <div class="text-end">
                                                <button type="submit" class="btn btn-blue waves-effect waves-light mt-2">{!! $downloadIcon !!}
                                                    {{ __('download') }} </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                            </div> <!-- end qr tab content -->

                        </div> <!-- end tab content -->

                    </div>
                </div>
            </div>
        </div>
        <!-- end body -->

    </div>
</div>
@endsection