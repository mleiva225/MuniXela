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
                        <ol class="breadcrumb m-0 page-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('all.user') }}" class="btn btn-info rounded-pill waves efect waves-light"><i
                                        class="fa-solid fa-backward-step"></i>
                                    {{ __('Collaborators') }} </a>
                            </li>
                            <li class="breadcrumb-item">{{ __('View Collaborator') }}</li>
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
                                <form method="post" action="{{ route('user.update') }}" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $user->id }}">

                                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Colaborador
                                    </h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="firstname" class="form-label">Nombres</label>
                                                <input type="text" name="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ $user->name }}" disabled>
                                                @error('name')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Apellidos</label>
                                                <input type="text" name="lastname" class="form-control" id="lastname"
                                                    value="{{ $user->lastname }}" disabled>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="lastname" class="form-label">Correo</label>
                                                <input type="email" name="email" class="form-control" id="lastname"
                                                    value="{{ $user->email }}" disabled>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Teléfono</label>
                                                <input type="text" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    value="{{ $user->phone }}" disabled>
                                                @error('phone')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="position" class="form-label">Puesto*</label>
                                                <input type="text" name="position"
                                                    class="form-control @error('position') is-invalid @enderror"
                                                    value="{{ $user->position }}" disabled>
                                                @error('position')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="dependence" class="form-label">Dependencia*</label>
                                                <select name="dependence" id="dependence" class="form-select" disabled>
                                                    <option value="">Selecciona una dependencia</option>
                                                    @foreach ($datosDependencia['Dependencias'] as $dependencia)
                                                        <option value="{{ $dependencia }}"
                                                            @if ($user->dependence == $dependencia) selected @endif>
                                                            {{ $dependencia }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="row" class="form-label">Renglon*</label>
                                                <input type="text" name="row"
                                                    class="form-control @error('row') is-invalid @enderror"
                                                    value="{{ $user->row }}" disabled>
                                                @error('row')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="code" class="form-label">Codigo*</label>
                                                <input type="text" name="code"
                                                    class="form-control @error('code') is-invalid @enderror"
                                                    value="{{ $user->code }}" disabled>
                                                @error('code')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label for="address" class="form-label">Dirección</label>
                                                <input type="text" name="address"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    value="{{ $user->address }}" disabled>
                                                @error('address')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label for="state" class="form-label">Departamento</label>
                                                <input type="text" name="state"
                                                    class="form-control @error('state') is-invalid @enderror"
                                                    value="{{ $user->state }}" disabled>
                                                @error('state')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3">
                                                <label for="city" class="form-label">Municipio</label>
                                                <input type="text" name="city"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    value="{{ $user->city }}" disabled>
                                                @error('city')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="birthdate" class="form-label">Fecha de nacimiento</label>
                                                <input type="text" name="birthdate"
                                                    class="form-control @error('birthdate') is-invalid @enderror"
                                                    value="{{ $user->birthdate }}" disabled>
                                                @error('birthdate')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="admin" class="form-label">Administrador*</label>
                                                <select name="admin"
                                                    class="form-select @error('admin') is-invalid @enderror"
                                                    id="admin" disabled>
                                                    <option value="">¿El usuario es administrador?</option>
                                                    <option value="0"
                                                        @if ($user->admin == 0) selected @endif>No</option>
                                                    <option value="1"
                                                        @if ($user->admin == 1) selected @endif>Sí</option>
                                                </select>
                                                @error('admin')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Activo*</label>
                                                <select name="status"
                                                    class="form-select @error('status') is-invalid @enderror"
                                                    id="estado" disabled>
                                                    <option value="">¿El usuario esta activo?</option>
                                                    <option value="0"
                                                        @if ($user->status == 0) selected @endif>No</option>
                                                    <option value="1"
                                                        @if ($user->status == 1) selected @endif>Sí</option>
                                                </select>
                                                @error('status')
                                                    <span class="text-danger"> {{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-12">

                                            <div class="mb-3">
                                                <label for="example-fileinput" class="form-label"> </label>
                                                <?php
                                                $photoPath = isset($user->photo) ? asset('upload/admin_image/' . $user->photo) : asset('upload\no_image.jpg');
                                                ?>
                                                <img src=<?php echo $photoPath; ?> class="img-thumbnail" alt="profile-image">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="text-end">
                                        <a href="{{ route('all.user') }}"
                                            class="btn btn-success waves-effect waves-light mt-2"><i></i>Regresar</a>
                                    </div>

                                </form>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
