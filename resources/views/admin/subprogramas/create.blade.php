@extends('layouts.admin')
@section('title', 'Crear SubPrograma')
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
                        <h1>Crear SubPrograma</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.subprogramas.index') }}">Lista
                                    SubProgramas</a>
                            </li>
                            <li class="breadcrumb-item active">Crear SubPrograma</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::open(['route' => 'admin.subprogramas.store', 'method' => 'POST']) !!}
            <div class="card">
                {{--  <div class="card-header">
              <h3 class="card-title">General</h3>
            </div>  --}}
                <div class="card-body">

                    <div class="form-group">
                        <label for="fK_programa">PROGRAMA</label>
                        <select class="select2 @error('fK_programa') is-invalid @enderror" name="fK_programa"
                            id="fK_programa" style="width: 100%;">

                            <option disabled selected>Selecciona un Programa</option>
                            @foreach ($programas as $programa)
                                <option value="{{ $programa->id }}"
                                    {{ old('fK_programa') == $programa->id ? 'selected' : '' }}>
                                    {{ $programa->nomProg }}
                                </option>
                            @endforeach
                        </select>
                        @error('fK_programa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('codSP', 'CODIGO SUBPROGRAMA') !!}
                        {!! Form::text('codSP', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Codigo del SubPrograma']) !!}
                        @error('codSP')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label('nomSP', 'NOMBRE SUBPROGRAMA') !!}
                        {!! Form::text('nomSP', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Nombre del SubPrograma']) !!}
                        @error('nomSP')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="row">
                <div class="col-12 mb-2">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Registrar" class="btn btn-primary float-right">
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

        });

        var fK_programa = $('#fK_programa');
        var fK_sProg = $('#fK_sProg');
        fK_programa.change(function() {
            $.ajax({
                url: "{{ route('obtener_subprogramas') }}",
                method: 'GET',
                data: {
                    fK_programa: fK_programa.val(),
                },
                success: function(data) {
                    fK_sProg.empty();
                    fK_sProg.append(
                        '<option disabled selected>Seleccione un SubPrograma:</option>'
                    );
                    $.each(data, function(index, element) {
                        fK_sProg.append('<option value="' + element.id + '">' + element
                            .nomSP + '</option>')
                    });

                }
            });
        });
    </script>
@endsection
