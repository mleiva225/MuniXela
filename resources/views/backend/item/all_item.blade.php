@extends('admin_dashboard')
@section('admin')
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Colaboradores</a></li>
                            <li class="breadcrumb-item active">Lista</li>
                        </ol>
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('add.item') }}" class="btn btn-success rounded-pill waves efect waves-light">Nuevo Item</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Items</h4>
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
                                    <th>Id</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $key => $item)
                                <tr>
                                    <td>{{ $key++ }}</td>
                                    <td>{{ $item->nombre }}</td>
                                    <td align="right">
                                        <a href="{{ route('view.item',$item->id) }}" class="btn btn-success rounded-pill waves-effect waves-light">Ver</a>
                                        <a href="{{ route('edit.item',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Editar</a>
                                        <a href="{{ route('delete.item',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Eliminar </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(Session::has('notification'))
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