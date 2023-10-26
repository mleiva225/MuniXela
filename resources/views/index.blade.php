@extends('admin_dashboard')

@section('admin')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex align-items-center mb-3">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-0" id="dash-daterange">
                                <span class="input-group-text bg-blue border-blue text-white">
                                    <i class="mdi mdi-calendar-range"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                    <h4 class="page-title">Tablero</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- pantalla principal -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="image-container">
                        <img id="random-image" src="" alt="Imagen aleatoria" width="1200" height="700">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container -->
</div> <!-- content -->

<script>
    // Lista de imágenes
    var images = [
        "upload/1.jpg",
        "upload/2.jpg",
        "upload/3.jpg ",
        // Agrega más imágenes según sea necesario
    ];

    // Seleccionar una imagen aleatoria
    var randomIndex = Math.floor(Math.random() * images.length);
    var randomImage = images[randomIndex];

    // Mostrar la imagen aleatoria
    document.getElementById("random-image").src = randomImage;
</script>
@endsection
