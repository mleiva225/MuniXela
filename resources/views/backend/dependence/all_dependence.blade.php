@extends('admin_dashboard')
@section('admin')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <a href="{{ route('add.dependence') }}"
                                class="btn btn-success rounded-pill waves efect waves-light">{{ __('Add Dependence') }}</a>
                        </div>
                        <h4 class="page-title">{{ __('Dependences') }}</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>{{ __('Name') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dependences as $key => $dependence)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $dependence->name }}</td>
                                            <td>
                                                <a href="{{ route('edit.dependence', $dependence->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light">Editar</a>
                                                <a href="{{ route('dependence.delete', $dependence->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Eliminar</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (Session::has('notification'))
                                <div class="alert alert-{{ Session::get('notification.alert-type') }}">
                                    {{ Session::get('notification.message') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
