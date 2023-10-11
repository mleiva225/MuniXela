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
                            <li class="breadcrumb-item"><a>Ver Colaborador</a></li>

                        </ol>
                    </div>
                    <h4 class="page-title">Ver Colaborador</h4>
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

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Colaborador</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Nombres</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" disabled>
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Apellidos</label>
                                            <input type="text" name="lastname" class="form-control" id="lastname" value="{{ $user->lastname }}" disabled>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="lastname" value="{{ $user->email }}" disabled>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Teléfono</label>
                                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" disabled>
                                            @error('phone')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="birthdate" class="form-label">Fecha de nacimiento</label>
                                            <input type="text" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $user->birthdate }}" disabled>
                                            @error('birthdate')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="gender" class="form-label">Genero</label>
                                            <input type="text" name="gender" class="form-control @error('gender') is-invalid @enderror" value="{{ $user->gender }}" disabled>
                                            @error('gender')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ethnicity" class="form-label">Etnia</label>
                                            <input type="text" name="ethnicity" class="form-control @error('ethnicity') is-invalid @enderror" value="{{ $user->ethnicity }}" disabled>
                                            @error('ethnicity')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="address" class="form-label">Dirección</label>
                                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $user->address }}" disabled>
                                            @error('address')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="state" class="form-label">Departamento</label>
                                            <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ $user->state }}" disabled>
                                            @error('state')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="mb-3">
                                            <label for="city" class="form-label">Municipio</label>
                                            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ $user->city }}" disabled>
                                            @error('city')
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