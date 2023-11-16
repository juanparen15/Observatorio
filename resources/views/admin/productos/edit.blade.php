@extends('layouts.admin')
@section('title', 'Editar Observatorio')
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
                        <h1>Editar Observatorio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Observatorio</a></li>
                            <li class="breadcrumb-item active">Editar Observatorio</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::model($producto, ['route' => ['admin.productos.update', $producto], 'method' => 'PUT']) !!}
            <div class="card card-primary">
                {{-- <div class="card-header">
              <h3 class="card-title">General</h3>
            </div> --}}
                <div class="card-body">
                    <div class="form-row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fK_sProg">SUBPROGRAMA:</label>
                                <select class="select2 @error('fK_sProg') is-invalid @enderror" name="fK_sProg"
                                    id="fK_sProg" style="width: 100%;">
                                    <option value="" selected>Seleccione un Sub Programa</option>
                                    @foreach ($subprogramas as $subprograma)
                                        <option value="{{ $subprograma->id }}"
                                            {{ old('fK_sProg', $observatorio->fK_sProg) == $subprograma->id ? 'selected' : '' }}>
                                            {{ $subprograma->id }} - {{ $subprograma->nomSP }}</option>
                                    @endforeach
                                    @error('fK_sProg')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fK_tProd">TIPO DE PRODUCTO:</label>
                                <select class="select2 @error('fK_tProd') is-invalid @enderror" name="fK_tProd"
                                    id="fK_tProd" style="width: 100%;">
                                    <option value="" selected>Seleccione Tipo de Producto</option>
                                    @foreach ($tipoproductos as $tipoproducto)
                                        <option value="{{ $tipoproducto->id }}"
                                            {{ old('fK_tProd', $requiproyecto->fK_sProg) == $tipoproducto->id ? 'selected' : '' }}>
                                            {{ $tipoproducto->id }} - {{ $tipoproducto->nomProd }}</option>
                                    @endforeach
                                </select>
                                @error('fK_tProd')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fK_UMed">UNIDAD DE MEDIDA:</label>
                                <select class="select2 @error('fK_UMed') is-invalid @enderror" name="fK_UMed" id="fK_UMed"
                                    style="width: 100%;">
                                    <option value="" selected>Seleccione Unidad de Medida</option>
                                    @foreach ($unidadmedidas as $unidadmedida)
                                        <option value="{{ $unidadmedida->id }}"
                                            {{ old('fK_UMed', $unidadmedida->fK_UMed) == $unidadmedida->id ? 'selected' : '' }}>
                                            {{ $unidadmedida->id }} - {{ $unidadmedida->nomUMed }}</option>
                                    @endforeach
                                </select>
                                @error('fK_UMed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="familias_id">Tipo de Subserie Documental:</label>
                                <select class="select2 @error('familias_id') is-invalid @enderror" name="familias_id"
                                    id="familias_id" style="width: 100%;">
                                    @foreach ($familias as $familia)
                                        <option value="{{ $familia->id }}"
                                            {{ old('familias_id', $inventario->familias_id) == $familia->id ? 'selected' : '' }}>
                                            {{ $familia->detfamilia }}</option>
                                    @endforeach
                                </select>
                                @error('familias_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        <div class="col-md-4">
                            <label>CODIGO PRODUCTO</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba el codigo del producto" type="text" class="form-control"
                                    name="codProd" id="codProd" value="{{ old('codProd', $observatorio->codProd) }}"
                                    required>
                            </div>
                            {{-- <span id="fechaMostrada"></span> --}}
                        </div>

                        <div class="col-md-4">
                            <label>NOMBRE PRODUCTO</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba el nombre del producto" type="text" name="nomProd"
                                    id="nomProd" class="form-control"
                                    value="{{ old('nomProd', $observatorio->nomProd) }}" required>
                            </div>
                            {{-- <span id="fechaFinalMostrada"></span> --}}
                        </div>

                        <div class="col-md-4">
                            <label>IB</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba el Indicador Base del producto" type="text"
                                    class="form-control" name="iB" id="iB"
                                    value="{{ old('otro', $observatorio->iB) }}" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>META CUATRIENIA</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba la Cuatrenia del producto" type="text" class="form-control"
                                    name="mCuatrienia" id="mCuatrienia"
                                    value="{{ old('otro', $observatorio->mCuatrienia) }}" required>
                            </div>
                        </div>
                        {{-- <div class="col-lg-12">
                            <label>NOTAS:</label>
                            <div class="input-group sm-3">
                                <input placeholder="Escriba una nota" type="text" class="form-control" name="nota"
                                    id="nota" value="{{ old('nota', $inventario->nota) }}" required
                                    onkeypress="return validarCaracter(event)">
                            </div>
                        </div> --}}
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
    <div class="modal fade" id="notaModal" tabindex="-1" role="dialog" aria-labelledby="notaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="notaModalLabel">Mensaje de Validación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Por favor, ingrese solo letras, números o guión (-) en el campo de notas.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary float-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>





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
    <!-- <script>
        $(document).ready(function() {
            $('#valorestimadocont').mask("#.##0", {
                reverse: true
            });
            $('#valorestimadovig').mask("#.##0", {
                reverse: true
            });
        });
    </script> -->

    {{-- <script>
        var segmento_id = $('#segmento_id');
        var familia_id = $('#familias_id');
        segmento_id.change(function() {
            $.ajax({
                url: "{{ route('obtener_familias') }}",
                method: 'GET',
                data: {
                    segmento_id: segmento_id.val(),
                },
                success: function(data) {
                    familia_id.empty();
                    familia_id.append(
                        '<option disabled selected>Seleccione un Tipo de Subserie Documental:</option>'
                    );
                    $.each(data, function(index, element) {
                        familia_id.append('<option value="' + element.id + '">' + element
                            .detfamilia + '</option>')
                    });

                }
            });
        });
    </script> --}}
    {{-- <script>
        var otro = $('#otro');
        var requipoais_id = $('#requipoais_id');

        $(function() {
            $("#requipoais_id").change(function() {
                if ($(this).val() == 2) {
                    $("#otro").prop("hidden", true);
                    document.getElementById("otro").value = " ";
                } else {
                    $("#otro").prop("hidden", false);

                }
            });
        });
    </script> --}}


    {{-- <script>
        // Función para aplicar el formato condicional y validar una fecha
        function validarYFormatearFecha(inputElement, outputElement) {
            var inputValue = inputElement.value;
            inputValue = inputValue.replace(/\D/g, ""); // Eliminar caracteres no numéricos
            if (inputValue.length > 0) {
                // Formatear la fecha con "/"
                if (inputValue.length > 2) {
                    inputValue = inputValue.slice(0, 2) + "/" + inputValue.slice(2);
                }
                if (inputValue.length > 5) {
                    inputValue = inputValue.slice(0, 5) + "/" + inputValue.slice(5, 9);
                }
                // Validar la fecha
                var parts = inputValue.split("/");
                if (parts.length === 3) {
                    var day = parseInt(parts[0]);
                    var month = parseInt(parts[1]);
                    var year = parseInt(parts[2]);
                    var date = new Date(year, month - 1, day);
                    if (date.getDate() === day && date.getMonth() === month - 1 && date.getFullYear() === year) {
                        // La fecha es válida, actualizar el valor del campo de entrada
                        inputElement.value = inputValue;
                        // Mostrar la fecha en el elemento de visualización
                        var options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        outputElement.textContent = date.toLocaleDateString(undefined, options);
                        outputElement.style.color = "green";
                        return;
                    }
                }
            }
            // Si la fecha es inválida, mostrar un mensaje de error en rojo
            outputElement.textContent = "Fecha inválida";
            outputElement.style.color = "red";
        }

        // Obtener los elementos de entrada y salida para la fecha inicial y final
        var fechaInicialInput = document.getElementById("fechaInicialInput");
        var fechaFinalInput = document.getElementById("fechaFinalInput");
        var fechaMostrada = document.getElementById("fechaMostrada");
        var fechaFinalMostrada = document.getElementById("fechaFinalMostrada");

        // Escuchar eventos de entrada para la fecha inicial
        fechaInicialInput.addEventListener("input", function() {
            validarYFormatearFecha(this, fechaMostrada);
        });

        // Escuchar eventos de entrada para la fecha final
        fechaFinalInput.addEventListener("input", function() {
            validarYFormatearFecha(this, fechaFinalMostrada);
        });
        // Obtener el elemento de entrada de fecha
        var fechaInicialInput = document.getElementById("fechaInicialInput");
        var fechaFinalInput = document.getElementById("fechaFinalInput");

        // Escuchar eventos de entrada para formatear automáticamente la fecha
        fechaFinalInput.addEventListener("input", function() {
            var inputValue = this.value;
            inputValue = inputValue.replace(/\D/g, ""); // Eliminar caracteres no numéricos
            if (inputValue.length > 0) {
                // Formatear la fecha con "/"
                if (inputValue.length > 2) {
                    inputValue = inputValue.slice(0, 2) + "/" + inputValue.slice(2);
                }
                if (inputValue.length > 5) {
                    inputValue = inputValue.slice(0, 5) + "/" + inputValue.slice(5, 9);
                }
            }
            this.value = inputValue; // Actualizar el valor del campo de entrada
        });
        // Escuchar eventos de entrada para formatear automáticamente la fecha
        fechaInicialInput.addEventListener("input", function() {
            var inputValue = this.value;
            inputValue = inputValue.replace(/\D/g, ""); // Eliminar caracteres no numéricos
            if (inputValue.length > 0) {
                // Formatear la fecha con "/"
                if (inputValue.length > 2) {
                    inputValue = inputValue.slice(0, 2) + "/" + inputValue.slice(2);
                }
                if (inputValue.length > 5) {
                    inputValue = inputValue.slice(0, 5) + "/" + inputValue.slice(5, 9);
                }
            }
            this.value = inputValue; // Actualizar el valor del campo de entrada
        });
    </script> --}}


    <!-- Agrega este script en la sección 'script' de tu vista -->

    {{-- <script>
        function validarCaracter(event) {
            var input = event.key;
            // Usar una expresión regular para permitir letras, números y el guión (-)
            var regex = /^[a-zA-Z0-9\- ]$/;
            if (!regex.test(input)) {
                event.preventDefault(); // Prevenir la entrada del carácter no válido
                $('#notaModal').modal('show'); // Mostrar el modal de validación
            }
        }

        function validarNota() {
            var notaInput = document.getElementById("nota");
            var notaValue = notaInput.value;
            // Usar una expresión regular para permitir solo caracteres alfanuméricos y el guión (-)
            var regex = /^[a-zA-Z0-9\- ]+$/; // Permite letras, números, guiones y espacios

            if (!regex.test(notaValue)) {
                // alert("Por favor, la nota solo puede contener letras, números, guiones y espacios.");
                notaInput.value = ""; // Borrar el contenido no válido
                notaInput.focus(); // Colocar el foco en el campo de notas
                return false;
            }

            return true;
        }

        // Asigna la función de validación al evento submit del formulario
        var form = document.forms[0]; // Asegúrate de que este sea el índice correcto del formulario
        form.addEventListener("submit", function(event) {
            if (!validarNota()) {
                event.preventDefault(); // Evita que se envíe el formulario si la nota es inválida
            }
        });
    </script> --}}



@endsection
