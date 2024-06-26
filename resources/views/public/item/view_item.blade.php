@extends('public.public_dashboard')
@section('public')
    @php
        $titleIcon = '<i class="fa-solid fa-box"></i>';
        $saveIcon = '<i class="mdi mdi-content-save"></i>';

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
                            <h4> {{ __('view-item-:attribute', ['attribute' => $item->code]) }} {!! $titleIcon !!}</h4>
                        </div>
                        <ol class="breadcrumb m-0 page-title">
                            <li class="breadcrumb-item">{{ __('items') }}</li>
                            <li class="breadcrumb-item">{{ __('view-item') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-l-8 col-lg-12 col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="tab-pane" id="settings">

                                <h5 class="mb-4 text-uppercase text-primary">{!! $firstSectionIcon !!}
                                    {{ __('item-section') }}
                                </h5>

                                <input type="hidden" name="id" value="{{ $item->id }}">

                                <div class="row"> <!-- init row -->
                                    <div class="col-md-3">
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

                                    <div class="col-md-3">
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

                                    <div class="col-md-3">
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
                                            <label for="unit_value" class="form-label">{{ __('unit-value') }}</label>
                                            <input type="number" name="unit_value" step="0.0001"
                                                class="form-control @error('unit_value') is-invalid @enderror"
                                                value="{{ $item->unit_value }}" readonly>
                                            @error('unit_value')
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
                                            <label for="observations" class="form-label">{{ __('observations') }}</label>
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
                                            <label for="description" class="form-label">{{ __('description') }}</label>
                                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                                value="{{ $item->description }}" readonly></textarea>
                                            @error('description')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end row -->

                                <div class="row"> <!-- start row -->
                                    <h5 class="mb-4 text-uppercase text-primary">{!! $secondSectionIcon !!}
                                        {{ __('responsible-section') }}
                                    </h5>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Serie de hoja actual*</label>
                                            <select name="sheet_series" class="form-control @error('sheet_series') is-invalid @enderror" readonly>
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
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ optional($users->find(optional($item->sheetsdetail)->id_responsible))->name ?? '' }}" readonly>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div><!-- end row -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
