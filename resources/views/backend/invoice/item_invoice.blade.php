@extends('admin_dashboard')
@section('admin')

<style type="text/css">
    @media print {
        body::after {
            content: "Vista previa";
            position: fixed;
            top: 45%;
            left: 30%;
            opacity: 0.5;
            transform: rotate(-45deg);
            font-size: 100px;
            color: #cccccc;
        }
    }
</style>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hoja de responsabilidades</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Hoja de responsabilidades</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Logo & title -->
                        <div class="clearfix">
                            <div class="float-start">
                                <div class="auth-logo">
                                    <div class="logo logo-dark">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/logo-light1.png') }}" alt="" height="100">
                                        </span>
                                    </div>

                                    <div class="logo logo-light">
                                        <span class="logo-lg">
                                            <img src="{{ asset('backend/assets/images/logo-light1.png') }}" alt="" height="100">
                                        </span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt-3">
                                    <p><b> NOMBRE DE EMPLEADO RESPONSABLE: <span style="display: inline-block; width: 150px;">{{ $user->name }} {{ $user->lastname }} </span></b></p>
                                    <p><b> DEPENDENCIA: <span style="width: 150px;">{{ $user->dependence }}</span></b></p>
                                    <p><b> CARGO: {{ $user->position }}</b></p>
                                    <p><strong>FECHA : </strong> <span> {{ date('M d, Y') }}</span></p>
                                </div>

                            </div><!-- end col -->
                            <div class="col-md-4 offset-md-2">
                                <div class="mt-3 float-end">
                                    <p><strong>Serie. : </strong> <span class="float-end">No disponible en vista previa </span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <h6>Información del responsable</h6>
                                <address>
                                    {{ $user->address }} - {{ $user->city }} , {{ $user->state }}
                                    <br>
                                    <abbr title="Phone">Telefono:</abbr> {{ $user->phone }}<br>
                                    <abbr title="Phone">Email:</abbr> {{ $user->email }}<br>
                                </address>
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table mt-4 table-centered">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th style="width: 10%">Cantidad</th>
                                                <th>Artículo</th>
                                                <th>Serie</th>
                                                <th class="text-end" style="width: 10%">Precio</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $sl = 1;
                                            $totalPrice = 0;
                                            @endphp

                                            @foreach($contents as $key => $item)
                                            <tr>
                                                <td>{{ $sl++ }}</td>
                                                <td>1</td>
                                                <td>
                                                    <b>{{ $item->name }}</b> <br />
                                                </td>
                                                <td>
                                                    @foreach($products as $product)
                                                    @if ($product->id == $item->id)
                                                    {{ $product->series }}
                                                    @endif
                                                    @endforeach
                                                </td>
                                                <td class="text-end">Q. 
                                                    @foreach($products as $product)
                                                    @if ($product->id == $item->id)
                                                    {{ $product->unit_value }}
                                                    @php
                                                    $totalPrice += $product->unit_value; // Sumar el valor al total
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="5" align="center">Final de línea</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" align="right"><b>Total:</b></td>
                                                <td class="text-end">
                                                    <b>Q. {{ $totalPrice }}</b>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div> <!-- end table-responsive -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="clearfix pt-5">
                                    <h6 class="text-muted">Notas:</h6>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                        <div class="mt-4 mb-1">
                            <div class="text-end d-print-none">
                                <a href="javascript:window.print();" class="btn btn-success rounded-pill waves efect waves-light">
                                    <i class="mdi mdi-printer me-1"></i> Imprimir
                                </a>
                                <button type="button" class="btn btn-info waves-effect rounded-pill waves-light" data-bs-toggle="modal" data-bs-target="#signup-modal">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container -->
</div> <!-- content -->

<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4 ">
                    <div class="auth-logo">
                        <h3>Hoja de {{ $user->name }} {{ $user->lastname }}</h3>
                    </div>
                </div>

                <form class="px-3" method="post" action="{{ url('/final-invoice') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label">Numero de serie</label>
                        <input class="form-control" type="text" name="serie" placeholder="Ingrese numero de serie">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Nota</label>
                        <input class="form-control" type="text" name="category_name" placeholder="Nota de hoja de responsabilidad">
                    </div>


                    <input type="hidden" name="customer_id" value="{{ $user->id }}">
                    <input type="hidden" name="order_date" value="{{ date('d-F-Y') }}">


                    <div class="mb-3 text-center">
                        <button class="btn btn-primary" type="submit">Completar Registro </button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection