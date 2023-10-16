@extends('admin_dashboard')
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.responsibility') }}"
                                    class="btn btn-success rounded-pill waves efect waves-light">{{ __('new-responsibility') }}</a>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('list-responsibility') }}</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('notification'))
                                <div class="alert alert-{{ Session::get('notification.alert-type') }}">
                                    {{ Session::get('notification.message') }}
                                </div>
                            @endif
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>{{ __('no.') }}</th>
                                        <th>{{ __('series') }}</th>
                                        <th>{{ __('created-at') }}</th>
                                        <th>{{ __('actions') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sheets as $key => $sheet)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $sheet->series }}</td>
                                            <td>{{ $sheet->created_at }}</td>
                                            <td>
                                                <a href="{{ route('view.responsibility', $sheet->id) }}"
                                                    class="btn btn-success rounded-pill waves-effect waves-light">{{ __('see') }}</a>
                                                <a href="{{ route('edit.responsibility', $sheet->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light">{{ __('edit') }}</a>
                                                <a href="{{ route('item.delete', $sheet->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">{{ __('delete') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
