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
                            <a href="{{ route('add.user') }}" class="btn btn-success rounded-pill waves efect waves-light">Nuevo
                                Colaborador</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Colaboradores</h4>
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
                                    <th>Imagen</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Genero</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Etnia</th>
                                    <th>Edad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $key=> $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td> <img src="{{ isset($item->photo) ? asset('upload/admin_image/' . $item->photo) : asset('upload/no_image.jpg') }}" style="width:50px; height: 40px;"> </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->lastname }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->ethnicity }}</td>
                                    <td>{{ $item->age}}</td>
                                    <td>
                                    <a href="{{ route('view.user',$item->id) }}" class="btn btn-success rounded-pill waves-effect waves-light">Ver</a>
                                        <a href="{{ route('edit.user',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Editar</a>
                                        <a href="{{ route('delete.user',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Eliminar </a>
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