@extends('admin_dashboard')
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.item') }}"
                                    class="btn btn-success rounded-pill waves efect waves-light">{{ __('new-item') }}</a>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('list-item') }}</h4>
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
                                        <th>{{ __('code') }}</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('quantity') }}</th>
                                        <th>{{ __('unit-value') }}</th>
                                        <th>{{ __('series') }}</th>
                                        <th>{{ __('sicoin-gl') }}</th>
                                        <th>{{ __('created-at') }}</th>
                                        <th>{{ __('actions') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>Q {{ $item->unit_value }}</td>
                                            <td>{{ $item->series }}</td>
                                            <td>{{ $item->sicoin_gl }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td>
                                                <a href="{{ route('view.item', $item->id) }}"
                                                    class="btn btn-success rounded-pill waves-effect waves-light">Ver</a>
                                                <a href="{{ route('edit.item', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light">Editar</a>
                                                <a href="{{ route('item.delete', $item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Eliminar </a>
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
