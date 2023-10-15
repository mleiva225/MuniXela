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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Nuevo Colaborador</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Nuevo Colaborador</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <!-- end timeline content-->
                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Nuevo
                                    Colaborador
                                </h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Nombres*</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Apellidos*</label>
                                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror">
                                            @error('lastname')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Correo*</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                            @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Teléfono*</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                            @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="position" class="form-label">Puesto*</label>
                                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror">
                                            @error('position')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="dependence" class="form-label">Dependencia*</label>
                                            <select name="dependence" id="dependence" class="form-select">
                                                <option value="">Selecciona una dependencia</option>
                                                @foreach($datosDependencia['Dependencias'] as $dependencia)
                                                <option value="{{ $dependencia }}">{{ $dependencia }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="row" class="form-label">Renglon*</label>
                                            <input type="text" name="row" class="form-control @error('row') is-invalid @enderror">
                                            @error('row')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="code" class="form-label">Codigo*</label>
                                            <input type="text" name="code" class="form-control @error('code') is-invalid @enderror">
                                            @error('code')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input type="address" name="address" class="form-control @error('address') is-invalid @enderror">
                                            @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="state" class="form-label">Departamento*</label>
                                        <select name="state" id="state" class="form-select">
                                            <option value="">Selecciona un departamento</option>
                                            @foreach($datosGuatemala as $departamento => $municipios)
                                            <option value="{{ $departamento }}">{{ $departamento }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Municipio*</label>
                                        <select name="city" id="city" class="form-select">
                                            <option value="">Selecciona un municipio</option>
                                        </select>
                                    </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Fecha Nacimiento*</label>
                                            <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror">
                                            @error('firstname')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Estatus*</label>
                                            <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="Activo" disabled>
                                            @error('status')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="admin" class="form-label">Administrador*</label>
                                            <select name="admin" class="form-select @error('admin') is-invalid @enderror" id="admin">
                                                <option selected="">El usuario es administrador?</option>
                                                <option value="0">No</option>
                                                <option value="1">Si</option>
                                            </select>
                                            @error('admin')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Contraseña*</label>
                                            <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Imagen</label>
                                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                            @error('image')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label"> </label>
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div> <!-- end col -->

                                </div> <!-- end row -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                        @if(Session::has('notification'))
                        <div class="alert alert-{{ Session::get('notification.alert-type') }}">
                            {{ Session::get('notification.message') }}
                        </div>
                        @endif

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->



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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    const stateSelect = document.getElementById('state');
    const citySelect = document.getElementById('city');

    stateSelect.addEventListener('change', function() {

        const selectedState = stateSelect.value;


        citySelect.innerHTML = '<option value="">Selecciona un municipio</option>';


        if (selectedState) {

            const municipios = {!! json_encode($datosGuatemala) !!}[selectedState];

            municipios.forEach(function(municipio) {
                const option = document.createElement('option');
                option.value = municipio;
                option.text = municipio;
                citySelect.appendChild(option);
            });
        }
    });
</script>

@endsection