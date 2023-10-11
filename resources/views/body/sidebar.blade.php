<div class="left-side-menu">
    <div class="h-100" data-simplebar>

        <!-- User box Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Menú</li>

                <li>
                    <a href="{{ url('/dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Tablero </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Aplicaciones</li>

                <li>
                    <a href="#sidebarcollaborators" data-bs-toggle="collapse">
                        <i class="mdi mdi-badge-account-outline"></i>
                        <span>Usuarios</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarcollaborators">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.user') }}">Lista</a>
                            </li>
                            <li>
                                <a href="{{ route('add.user') }}">Agregar nuevo</a>
                            </li>
                        </ul>
                    </div>
                </li>


                
                <li>
                    <a href="#sidebarfamily" data-bs-toggle="collapse">
                        <i class="mdi mdi-family-tree"></i>
                        <span>Items</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarfamily">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.item') }}">Lista</a>
                            </li>
                            <li>
                                <a href="{{ route('add.item') }}">Agregar item</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarmembers" data-bs-toggle="collapse">
                        <i class="fa fa-users"></i>
                        <span>Responsabilidades</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarmembers">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('add.member') }}">Lista</a>
                            </li>
                            <li>
                                <a href="{{ route('all.member') }}">Asignacion</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarprograms" data-bs-toggle="collapse">
                        <i class="dripicons-checklist"></i>
                        <span>Reportes</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarprograms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="">Busqueda por item</a>
                            </li>
                            <li>
                                <a href="">Busqueda por Empleado</a>
                            </li>
                            <li>
                                <a href="">Busqueda por dependencia</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        </li>
        </ul>

    </div>

    <div class="clearfix"></div>

</div>

</div>