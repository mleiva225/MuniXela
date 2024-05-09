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
                    <a href="#sidebardependencies" data-bs-toggle="collapse">
                        <i class="mdi mdi-package"></i>
                        <span>{{ __('Dependences') }}</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebardependencies">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.dependence') }}">{{ __('list') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('add.dependence') }}">{{ __('Add New') }}</a>
                            </li>
                        </ul>
                    </div>
                </li>

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
                        <i class="fa-solid fa-boxes"></i>
                        <span>{{ __('items') }}</span>
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
                    <a href="#sidebarresponsibility" data-bs-toggle="collapse">
                        <i class="fa-solid fa-clipboard-check"></i>
                        <span>{{ __('responsibilities') }}</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarresponsibility">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.responsibility') }}">{{ __('list') }}</a>
                            </li>
                            <li>
                                <a href="{{ route('add.responsibility') }}">{{ __('add-new') }}</a>
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
