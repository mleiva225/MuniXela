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
                    <h4 class="page-title">Nuevo Item</h4>
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
                            <form method="post" action="{{ route('item.store') }}" enctype="multipart/form-data">
                                @csrf

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Nuevo Item</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nombres*</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                            @error('name')
                                            <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection