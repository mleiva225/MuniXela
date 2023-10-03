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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Editar Empleado</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Editar Empleado</h4>
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
                                            <label for="firstname" class="form-label">Nombres</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Apellidos</label>
                                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" value="{{ $user->lastname }}">
                                            @error('lastname')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Correo</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">
                                            @error('email')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Teléfono</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}">
                                            @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Fecha Nacimiento*</label>
                                            <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $user->birthdate }}">
                                            @error('birthdate')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">genero*</label>
                                            <select name="gender" class="form-select @error('gender') is-invalid @enderror" id="example-select">
                                                <option selected="">Indique el genero</option>
                                                <option value="Masculino" {{ $user->gender === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                <option value="Femenino" {{ $user->gender === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                <option value="Otro" {{ $user->gender === 'Otro' ? 'selected' : '' }}>Prefiero no decirlo</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ethnicity" class="form-label">Etnia</label>
                                            <select name="ethnicity" class="form-select @error('ethnicity') is-invalid @enderror" id="example-select">
                                                <option selected="">Indique la etnia</option>
                                                <option value="Xinka" {{ $user->ethnicity === 'Xinka' ? 'selected' : '' }}>Xinka</option>
                                                <option value="Garífuna" {{ $user->ethnicity === 'Garífuna' ? 'selected' : '' }}>Garífuna</option>
                                                <option value="Ladino" {{ $user->ethnicity === 'Ladino' ? 'selected' : '' }}>Ladino</option>
                                                <option value="Maya" {{ $user->ethnicity === 'Maya' ? 'selected' : '' }}>Maya</option>
                                            </select>
                                            @error('ethnicity')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                   
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input type="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}">
                                            @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="state" class="form-label">Departamento*</label>
                                            <select name="state" class="form-select @error('state') is-invalid @enderror" id="state-select">
                                                @foreach($datosGuatemala as $departamento => $municipios)
                                                <option value="{{ $departamento }}" {{ $user->state === $departamento ? 'selected' : '' }}>
                                                    {{ $departamento }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('state')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="city" class="form-label">Municipio</label>
                                            <div id="city-container">
                                                <select name="city" class="form-select" id="city-select">
                                                    @if($user->state)
                                                    @foreach($datosGuatemala[$user->state] as $municipio)
                                                    <option value="{{ $municipio }}" {{ $user->city === $municipio ? 'selected' : '' }}>
                                                        {{ $municipio }}
                                                    </option>
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                            @error('city')
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
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label"> </label>
                                            <img src="{{ asset('upload/admin_image/' . $user->photo ) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
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
$(document).ready(function() {
    $('#state-select').on('change', function() {
        var selectedState = $(this).val();
        var cityOptions = '';
        
        // Verifica si el departamento seleccionado existe en los datos de Guatemala
        if (selectedState in {!! json_encode($datosGuatemala) !!}) {
            var municipios = {!! json_encode($datosGuatemala) !!}[selectedState];
            municipios.forEach(function(municipio) {
                cityOptions += '<option value="' + municipio + '">' + municipio + '</option>';
            });
        }
        
        // Actualiza el selector de municipios
        $('#city-container').html('<select name="city" class="form-select" id="city-select">' + cityOptions + '</select>');
    });
});
</script>
@endsection