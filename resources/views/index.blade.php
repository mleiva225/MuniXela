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
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Tablero</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                                    <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1">Q<span data-plugin="counterup">58,947</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Total ayuda</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                                    <i class="fe-user font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">127</span></h3>
                                                    <p class="text-muted mb-1 text-truncate">Beneficiados</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                                    <i class="fe-bar-chart-line- font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">58</span>%</h3>
                                                    <p class="text-muted mb-1 text-truncate">Meta alcanzada</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->

                            <div class="col-md-6 col-xl-3">
                                <div class="widget-rounded-circle card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                                                    <i class="fe-eye font-22 avatar-title text-white"></i>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="text-end">
                                                    <h3 class="text-dark mt-1"><span data-plugin="counterup">78</h3>
                                                    <p class="text-muted mb-1 text-truncate">Visitas realizadas</p>
                                                </div>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>
                                </div> <!-- end widget-rounded-circle-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="btn-group mb-2">
                                                <button type="button" class="btn btn-xs btn-light">Hoy</button>
                                                <button type="button" class="btn btn-xs btn-light">Semanal</button>
                                                <button type="button" class="btn btn-xs btn-secondary">Mensual</button>
                                            </div>
                                        </div>
    
                                        <h4 class="header-title mb-3">Participantes</h4>
    
                                        <div dir="ltr">
                                            <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                                        </div>
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
                                        <h4 class="header-title mb-3">Programas</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-nowrap table-hover table-centered m-0">
    
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Fecha inicio</th>
                                                        <th>Inversión</th>
                                                        <th>Estado</th>
                                                        <th>Ver</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Educativo</h5>
                                                        </td>
        
                                                        <td>
                                                            Oct 15, 2018
                                                        </td>
        
                                                        <td>
                                                            Q5848.68
                                                        </td>
        
                                                        <td>
                                                            <span class="badge bg-soft-warning text-warning">En proceso</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Talleres</h5>
                                                        </td>
        
                                                        <td>
                                                            Oct 12, 2018
                                                        </td>
        
                                                        <td>
                                                            Q1247.25
                                                        </td>
        
                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Completo</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Agricultura</h5>
                                                        </td>
        
                                                        <td>
                                                            Oct 10, 2018
                                                        </td>
        
                                                        <td>
                                                            Q815.89
                                                        </td>
        
                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Completo</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Construcción</h5>
                                                        </td>
        
                                                        <td>
                                                            Oct 03, 2018
                                                        </td>
        
                                                        <td>
                                                            Q248.75
                                                        </td>
        
                                                        <td>
                                                            <span class="badge bg-soft-danger text-danger">Suspendido</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                    <tr>
                                                        <td>
                                                            <h5 class="m-0 fw-normal">Ix Qanil</h5>
                                                        </td>
        
                                                        <td>
                                                            Sep 15, 2018
                                                        </td>
        
                                                        <td>
                                                            Q358.10
                                                        </td>
        
                                                        <td>
                                                            <span class="badge bg-soft-success text-success">Completo</span>
                                                        </td>
        
                                                        <td>
                                                            <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                                                        </td>
                                                    </tr>
    
                                                </tbody>
                                            </table>
                                        </div> <!-- end .table-responsive-->
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
@endsection