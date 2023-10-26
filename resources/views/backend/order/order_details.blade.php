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
                                    <p><b> NOMBRE DE EMPLEADO RESPONSABLE: <span >{{ $order->Users->name }} {{ $order->Users->lastname }}</span></b></p>
                                    <p><b> DEPENDENCIA: <span style="width: 150px;">{{ $order->Users->dependence }}</span></b></p>
                                    <p><b> CARGO: {{ $order->Users->position }}</b></p>
                                    <p><strong>FECHA : </strong> <span>{{ $order->created_at }}</span></p>
                                </div>


                            </div><!-- end col -->
                            <div class="col-md-4 offset-md-2">
                                <div class="mt-3 float-end">
                                    <p><strong>Serie :  </strong> <span class="float-end">{{ $order->series }}</span></p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <h6>Información del responsable</h6>
                                <address>
                                    {{ $order->Users->address }} - {{ $order->Users->city }} , {{ $order->Users->state }}
                                    <br>
                                    <abbr title="Phone">Telefono:</abbr> {{ $order->Users->phone }}<br>
                                    <abbr title="Phone">Email:</abbr> {{ $order->Users->email }}<br>
                                </address>
                            </div> <!-- end col -->


                        </div>
                        <!-- end row -->

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">


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

                                                        @foreach($orderItem as $key => $item)
                                                        <tr>
                                                            <td>{{ $sl++ }}</td>
                                                            <td>1</td>
                                                            <td>
                                                                <b>{{ $item->Items->name }}</b> <br />
                                                            </td>
                                                            <td>
                                                            {{ $item->Items->name }}
                                                            </td>
                                                            <td class="text-end">Q. {{ $item->Items->unit_value }}

                                                            </td>
                                                        </tr>
                                                        @php
                                                            $totalPrice += $item->Items->unit_value;                                                         @endphp
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

                                        <div class="mt-4 mb-1">
                            <div class="text-end d-print-none">
                                <a href="javascript:window.print();" class="btn btn-success rounded-pill waves efect waves-light">
                                    <i class="mdi mdi-printer me-1"></i> Imprimir
                                </a>
                            </div>
                        </div>

                                    </div>
                                </div>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->
                </div> <!-- container -->
            </div> <!-- content -->

            @endsection