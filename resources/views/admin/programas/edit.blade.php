@extends('layouts.admin')
@section('title', 'Editar Programa')
@section('style')
    <!-- Select2 -->
    {!! Html::style('adminlte/plugins/select2/css/select2.min.css') !!}
    {!! Html::style('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') !!}
@endsection
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Programa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.programas.index') }}">Lista Programas</a>
                            </li>
                            <li class="breadcrumb-item active">Editar Programa</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::model($programa, ['route' => ['admin.programas.update', $programa], 'method' => 'PUT']) !!}
            <div class="card card-primary">
                {{--  <div class="card-header">
              <h3 class="card-title">General</h3>
            </div>  --}}
                <div class="card-body">

                    <div class="form-group">
                        <label for="fK_sector">SECTOR</label>
                        <select class="select2 @error('fK_sector') is-invalid @enderror" name="fK_sector" id="fK_sector"
                            style="width: 100%;">

                            <option disabled selected>Selecciona un Sector</option>
                            @foreach ($sectores as $sector)
                                <option value="{{ $sector->id }}"
                                    {{ old('fK_sector', $programa->fK_sector) == $sector->id ? 'selected' : '' }}>
                                    {{ $sector->nomS }}</option>
                            @endforeach
                        </select>
                        @error('fK_sector')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('codProg', 'CODIGO PROGRAMA') !!}
                        {!! Form::text('codProg', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Codigo del Programa']) !!}
                        @error('codProg')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('nomProg', 'NOMBRE PROGRAMA') !!}
                        {!! Form::text('nomProg', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del Programa']) !!}
                        @error('nomProg')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-12 mb-2">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Actualizar" class="btn btn-primary float-right">
                </div>
            </div>
            {!! Form::close() !!}
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('script')

    <!-- Select2 -->
    {!! Html::script('adminlte/plugins/select2/js/select2.full.min.js') !!}
    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2()

        })
    </script>

@endsection
