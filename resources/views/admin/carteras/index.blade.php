@extends('layouts.admin')
@section('title','Lista Carteras')
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
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                        <li class="breadcrumb-item active">Lista Carteras</li>
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
                  <h3 class="card-title">Lista Carteras</h3>
                  <div class="card-tools">

                     <a href="{{route('admin.cartera.create')}}" class="btn btn-primary">
                        Agregar Carteras
                     </a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>CODIGO CARTERA</th>
                        <th>NOMBRE CARTERA</th>
                        <th>ACCIONES</th>
                      </tr>
                      {{--  <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                      </tr>  --}}
                    </thead>
                    <tbody>
                     @foreach ($carteras as $cartera)
                     <tr>
                       <td>{{$cartera->id}}</td>
                       <td>{{$cartera->codC}}</td>
                       <td>{{$cartera->nomCar}}</td>
                       
                       <td class="project-actions text-right">
                           <form action="{{route('admin.cartera.destroy',$cartera)}}" method="POST">
                              @csrf
                               @method('delete')

                               <a class="btn btn-primary btn-sm" href="{{route('admin.cartera.edit', $cartera)}}">Editar</a>

                               <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                           </form>
                       </td>
                     </tr>
                     @endforeach
                    </tbody>
                  </table>
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
            title: 'La Cartera se Actualizo con Exito.'
        })
      });
</script>
@endif
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
            title: 'La Cartera se Creo con Exito.'
        })
      });
</script>
@endif
@if (session('flash') == 'eliminado')
<script>
    Swal.fire(
        '¡Eliminado!',
        'La Cartera se Elimino con Exito.',
        'success'
      )
</script>
@endif
<script>
    function enviar_formulario(){
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
