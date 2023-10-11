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
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Editar Item</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Editar Item</h4>
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

                                <input type="hidden" name="id" value="{{ $user->id }}">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Editar
                                    Empleado</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Nombre</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $item->nombre }}">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
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