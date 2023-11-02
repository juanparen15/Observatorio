@extends('layouts.admin')
@section('title', 'Editar Sectores')
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
                        <h1>Editar Sectores</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.sectores.index') }}">Sectores</a>
                            </li>
                            <li class="breadcrumb-item active">Editar Sector</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::model($sector, ['route' => ['admin.sectores.update', $sector], 'method' => 'PUT']) !!}
            <div class="card card-primary">
                {{--  <div class="card-header">
              <h3 class="card-title">General</h3>
            </div>  --}}
                <div class="card-body">

                    <div class="form-group">
                        <label for="fK_pDes">PLAN DE DESARROLLO</label>
                        <select class="select2 @error('fK_pDes') is-invalid @enderror" name="fK_pDes" id="fK_pDes"
                            style="width: 100%;">

                            <option disabled selected>Selecciona un Plan de Desarrollo</option>
                            @foreach ($planesdesarrollo as $plandesarrollo)
                                <option value="{{ $plandesarrollo->id }}"
                                    {{ old('fK_pDes', $sector->fK_pDes) == $plandesarrollo->id ? 'selected' : '' }}>
                                    {{ $plandesarrollo->nomPD }}</option>
                            @endforeach
                        </select>
                        @error('fK_pDes')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('codS', 'CODIGO SECTOR') !!}
                        {!! Form::text('codS', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Ingrese el Codigo del Sector',
                        ]) !!}
                        @error('codS')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {!! Form::label('nomS', 'NOMBRE SECTOR') !!}
                        {!! Form::text('nomS', null, [
                            'class' => 'form-control',
                            'placeholder' => 'Ingrese el Nombre del Sector',
                        ]) !!}
                        @error('nomS')
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
