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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Perfil</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                        <h4 class="mb-0">{{ $adminData->name }}</h4>
                        <p class="text-muted">{{ $adminData->email }}</p>
                        <div class="text-start mt-3">

                            <p class="text-muted mb-2 font-13"><strong>Nombre completo :</strong> <span class="ms-2">{{ $adminData->name }} {{ $adminData->lastname }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Fecha Nacimiento :</strong> <span class="ms-2">{{ $adminData->birthdate }} </span></p>

                            <p class="text-muted mb-2 font-13"><strong>Telefono :</strong><span class="ms-2">{{ $adminData->phone }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">{{ $adminData->email }}</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Etnia :</strong><span class="ms-2">{{ $adminData->ethnicity }}</span></p>
                            
                            <p class="text-muted mb-2 font-13"><strong>Genero :</strong><span class="ms-2">{{ $adminData->gender }}</span></p>
                            
                            <p class="text-muted mb-2 font-13"><strong>Dirección :</strong><span class="ms-2">{{ $adminData->address }}</span></p>
                            
                            <p class="text-muted mb-2 font-13"><strong>Departamento :</strong><span class="ms-2">{{ $adminData->state }}</span></p>
                            
                            <p class="text-muted mb-2 font-13"><strong>Municipio :</strong><span class="ms-2">{{ $adminData->city }}</span></p>

                        </div>

                    </div>
                </div> <!-- end card -->
            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">

                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Actualizar Informacion Personal</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Nombres</label>
                                            <input type="text" name="name" class="form-control" id="firstname" value="{{ $adminData->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Apellidos</label>
                                            <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $adminData->lastname }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="lastname" value="{{ $adminData->email }}">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Telefono</label>
                                            <input type="text" name="phone" class="form-control" id="lastname" value="{{ $adminData->phone }}">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ethnicity" class="form-label">Etnia</label>
                                            <select name="ethnicity" class="form-select @error('ethnicity') is-invalid @enderror" id="example-select">
                                                <option selected="">Indique la etnia</option>
                                                <option value="Xinka" {{ $adminData->ethnicity === 'Xinka' ? 'selected' : '' }}>Xinka</option>
                                                <option value="Garífuna" {{ $adminData->ethnicity === 'Garífuna' ? 'selected' : '' }}>Garífuna</option>
                                                <option value="Ladino" {{ $adminData->ethnicity === 'Ladino' ? 'selected' : '' }}>Ladino</option>
                                                <option value="Maya" {{ $adminData->ethnicity === 'Maya' ? 'selected' : '' }}>Maya</option>
                                            </select>
                                            @error('ethnicity')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">genero*</label>
                                            <select name="gender" class="form-select @error('gender') is-invalid @enderror" id="example-select">
                                                <option selected="">Indique el genero</option>
                                                <option value="Masculino" {{ $adminData->gender === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                                <option value="Femenino" {{ $adminData->gender === 'Femenino' ? 'selected' : '' }}>Femenino</option>
                                                <option value="Otro" {{ $adminData->gender === 'Otro' ? 'selected' : '' }}>Prefiero no decirlo</option>
                                            </select>
                                            @error('gender')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Fecha Nacimiento</label>
                                            <input type="date" name="birthdate" class="form-control" id="birthdate" value="{{ $adminData->birthdate }}">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input type="text" name="address" class="form-control" id="address" value="{{ $adminData->address }}">
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="state" class="form-label">Departamento*</label>
                                            <select name="state" class="form-select @error('state') is-invalid @enderror" id="state-select">
                                                @foreach($datosGuatemala as $departamento => $municipios)
                                                <option value="{{ $departamento }}" {{ $adminData->state === $departamento ? 'selected' : '' }}>
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
                                                    @if($adminData->state)
                                                    @foreach($datosGuatemala[$adminData->state] as $municipio)
                                                    <option value="{{ $municipio }}" {{ $adminData->city === $municipio ? 'selected' : '' }}>
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

                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="interruptor" name="interruptor" value="checked" {{ $adminData->theme === 'light' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="interruptor">Tema Obscuro/Claro</label>
                                        </div>
                                    </div> <!-- end col -->

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Foto de perfil</label>
                                            <input type="file" name="photo" id="image" class="form-control">
                                        </div>
                                    </div> <!-- end col -->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label"> </label>
                                            <img id="showImage" src="{{ (!empty($adminData->photo)) ? url('upload/admin_image/'.$adminData->photo) : url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
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