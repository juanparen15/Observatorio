<aside class="main-sidebar bg-black elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{!! asset('adminlte/dist/img/AdminLTELogo.png') !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="text-light brand-text font-weight-light">Inventario Documental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                {{--  <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link 
            {!! active_class(route('home')) !!}
            ">
              <i class="nav-icon far fa-calendar-check"></i>
              <p>
                Panel administrador
              </p>
            </a>
          </li>   --}}

                @if (auth()->user()->hasRole('Admin'))
                    <li class="nav-item">
                        <a href="{{ route('empresa.index') }}"
                            class="nav-link 
            {!! active_class(route('empresa.index')) !!}
            ">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Empresa
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.cartera.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.cartera.index')) !!}
            ">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>
                                Cartera
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.areas.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.areas.index')) !!}
            ">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Área
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link 
            {!! active_class(route('users.index')) !!}
            ">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuario
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.plandesarrollo.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.plandesarrollo.index')) !!}
            ">
                            <i class="nav-icon fas fa-th-list"></i>
                            <p>
                                Plan de Desarrollo
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.sectores.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.sectores.index')) !!}
            ">
                            <i class="nav-icon fas fa-house-user"></i>
                            <p>
                                Sectores
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.programas.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.programas.index')) !!}
            ">
                            <i class="nav-icon fas fa-list-ul"></i>
                            <p>
                                Programa
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.subprogramas.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.subprogramas.index')) !!}
            ">
                            <i class="nav-icon fas fa-calendar-minus"></i>
                            <p>
                                Sub Programa
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.tipoproductos.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.tipoproductos.index')) !!}
            ">
                            <i class="nav-icon fas fa-calendar-minus"></i>
                            <p>
                                Tipo de Productos
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.unidadmedidas.index') }}"
                            class="nav-link 
            {!! active_class(route('admin.unidadmedidas.index')) !!}
            ">
                            <i class="nav-icon fas fa-calendar-minus"></i>
                            <p>
                                Unidad de Medidas
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('productos.index') }}"
                            class="nav-link 
            {!! active_class(route('productos.index')) !!}
            ">
                            <i class="nav-icon fas fa-parking"></i>
                            <p>
                                Producto
                            </p>
                        </a>
                    </li>


                    {{-- 
          <li class="nav-item">
            <a href="{{route('admin.tipoadquicsiciones.index')}}" class="nav-link 
            {!! active_class(route('admin.tipoadquicsiciones.index')) !!}
            ">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                OTROS
              </p>
            </a>
          </li> --}}

                    {{-- <li class="nav-item">
            <a href="{{route('admin.tipoadquicsiciones55.index')}}" class="nav-link 
            {!! active_class(route('admin.tipoadquicsiciones55.index')) !!}
            ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Tipo de Adquisiciones
              </p>
            </a>
          </li>  --}}



                    <li class="nav-item">
                        <a href="{{ route('importar_datos') }}"
                            class="nav-link 
            {!! active_class(route('importar_datos')) !!}
            ">
                            <i class="nav-icon far fa-calendar-check"></i>
                            <p>
                                Importar datos
                            </p>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('productos.index') }}"
                            class="nav-link 
            {!! active_class(route('productos.index')) !!}
            ">
                            <i class="nav-icon fas fa-parking"></i>
                            <p>
                                Producto
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
