@extends('layouts.admin')
@section('title', 'Listado Observatorio')
@section('style')
    <!-- SweetAlert2 -->
    {!! Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') !!}
    <!-- DataTables -->
    {!! Html::style('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}
    {!! Html::style('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{--  <h1 class="m-0">Usuarios del sistema</h1>  --}}
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Listado Observatorio</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listado Observatorio</h3>

                        <div class="card-tools">

                            {{-- @if (auth()->user()->hasRole('Admin'))
                                @if (session('showOnlyAdmin'))
                                    <a href="{{ route('planadquisiciones.index') }}" class="btn btn-primary">Ver todos los
                                        registros</a>
                                @else
                                    <a href="{{ route('planadquisiciones.showOnlyAdmin') }}" class="btn btn-primary">Ver mis
                                        registros</a>
                                @endif --}}
                            {{-- @else
                                <a href="{{ route('planadquisiciones.indexByArea', auth()->user()->area->id) }}"
                                    class="btn btn-primary">Ver registros de mi área</a> --}}
                            {{-- @endif --}}



                            {{-- @if (auth()->user()->hasRole('Admin'))
                                @if (session('showOnlyAdmin'))
                                    <a href="{{ route('planadquisiciones.index') }}" class="btn btn-primary"><i
                                            class="fas fa-ghost">
                                        </i> Ver todos los registros</a>
                                @else
                                    <a href="{{ route('planadquisiciones.showOnlyAdmin') }}" class="btn btn-primary"><i
                                            class="fas fa-parking"></i> Ver mis registros</a>
                                @endif
                            @endif --}}

                            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary">
                                <i class="fas fa-parking"></i> Agregar Nuevo Observatorio
                            </a>
                            @can('productos.export')
                                <a href="{{ route('productos.export') }}" class="btn btn-success">
                                    <i class="far fa-file-excel"></i> <i class="fas fa-file-export"></i> Exportar Todo
                                </a>
                            @endcan
                        </div>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                        <table id="example2" class="table table-hover text-nowrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>NÚMERO DE CONSECUTIVO</th>
                                    <th>PLAN DE DESARROLLO</th>
                                    <th>SECTOR</th>
                                    <th>PROGRAMA</th>
                                    <th>SUB PROGRAMA</th>
                                    <th>TIPO DE PRODUCTO</th>
                                    <th>UNIDAD DE MEDIDA</th>
                                    <th>UNIDAD DE MEDIDA</th>
                                    <th>TIPO DE PRODUCTO</th>
                                    <th>USUARIO</th>
                                    <th>CODIGO DEL PRODUCTO</th>
                                    <th>NOMBRE DEL PRODUCTO</th>
                                    <th>INDICADOR BASE</th>
                                    <th>META CUATRIENIA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($productos as $producto)
                                    <tr>
                                        <td>{{ $producto->id }}</td>
                                        <td>{{ $producto->plandesarrollo->nomPD }}</td>
                                        <td>{{ $producto->sector->nomS }}</td>
                                        <td>{{ $producto->programa->nomProg }}</td>
                                        <td>{{ $producto->subprograma->nomSP }}</td>
                                        <td>{{ $producto->tipoproducto->nomProd }}</td>
                                        <td>{{ $producto->unidadmedida->nomUMed }}</td>
                                        <td>{{ $producto->user->area->nomA }}</td>
                                        <td>{{ $producto->codProd }}</td>
                                        <td>{{ $producto->nomProd }}</td>
                                        <td>{{ $producto->iB }}</td>
                                        <td>{{ $producto->mCuatrienia }}</td>
                                        <td>
                                            <form action="{{ route('productos.destroy', $producto) }}" method="POST">
                                                @csrf
                                                @method('delete')

                                                @can('exportar_productos_excel')
                                                    <a class="btn btn-success btn-sm"
                                                        href="{{ route('exportar_productos_excel', $producto) }}">
                                                        <i class="far fa-file-excel"></i> Exportar
                                                    </a>
                                                @endcan

                                                @can('productos.show')
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('productos.show', $producto) }}">Detalles</a>
                                                @endcan


                                                @can('productos.edit')
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ route('productos.edit', $producto) }}">Editar</a>
                                                @endcan

                                                @can('productos.destroy')
                                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                                @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $productos->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <!-- SweetAlert2 -->
    {!! Html::script('adminlte/plugins/sweetalert2/sweetalert2.min.js') !!}

    @if (session('flash') == 'registrado')
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'El Producto se creó con exito.'
                })
            });
        </script>
    @endif
    @if (session('flash') == 'actualizado')
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: 'success',
                    title: 'El Producto se actualizó con exito.'
                })
            });
        </script>
    @endif
    @if (session('flash') == 'eliminado')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'El Producto se eliminó con exito.',
                'success'
            )
        </script>
    @endif
    <script>
        function enviar_formulario() {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.delete_form.submit();
                }
            })
        }
    </script>
    <!-- DataTables  & Plugins -->
    {!! Html::script('adminlte/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}
    {!! Html::script('adminlte/plugins/jszip/jszip.min.js') !!}
    {!! Html::script('adminlte/plugins/pdfmake/pdfmake.min.js') !!}
    {!! Html::script('adminlte/plugins/pdfmake/vfs_fonts.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') !!}
    {!! Html::script('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}
    @include('includes._datatable_language')
@endsection
