@extends('layouts.admin')
@section('title', 'Producto')
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
                        <h1>Producto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Listado Producto
                                </a></li>
                            <li class="breadcrumb-item active">Producto</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            {!! Form::open(['route' => 'productos.store', 'method' => 'post']) !!}
            <div class="card">
                <div class="card-body">

                    <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fK_sProg">SUBPROGRAMA:</label>
                                <select class="select2 @error('fk_sProg') is-invalid @enderror" name="fK_sProg"
                                    id="fK_sProg" style="width: 100%;">
                                    <option value="" disabled selected>Seleccione un Subprograma:
                                    </option>
                                    @foreach ($subprogramas as $subprograma)
                                        <option value="{{ $subprograma->id }}"
                                            {{ old('fK_sProg') == $subprograma->id ? 'selected' : '' }}>
                                            {{ $subprograma->codSP }} - {{ $subprograma->nomSP }}</option>
                                    @endforeach
                                </select>
                                @error('fK_sProg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fK_tProd">TIPO PRODUCTO:</label>
                                <select class="select2 @error('fk_tProd') is-invalid @enderror" name="fK_tProd"
                                    id="fK_tProd" style="width: 100%;">
                                    <option value="" disabled selected>Seleccione un Tipo de Producto:
                                    </option>
                                    @foreach ($tipoproductos as $tipoproducto)
                                        <option value="{{ $tipoproducto->id }}"
                                            {{ old('fK_tProd') == $tipoproducto->id ? 'selected' : '' }}>
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
                                <label for="fK_uMed">UNIDAD DE MEDIDA:</label>
                                <select class="select2 @error('fk_uMed') is-invalid @enderror" name="fK_uMed" id="fK_uMed"
                                    style="width: 100%;">
                                    <option value="" disabled selected>Seleccione una Unidad de Medida:
                                    </option>
                                    @foreach ($unidadmedidas as $unidadmedida)
                                        <option value="{{ $unidadmedida->id }}"
                                            {{ old('fK_uMed') == $unidadmedida->id ? 'selected' : '' }}>
                                            {{ $unidadmedida->id }} - {{ $unidadmedida->nomUMed }}</option>
                                    @endforeach
                                </select>
                                @error('fK_uMed')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>CODIGO PRODUCTO</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba el codigo del producto" type="text" class="form-control"
                                    name="codProd" id="codProd" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>NOMBRE PRODUCTO</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba el nombre del producto" type="text" class="form-control"
                                    name="nomProd" id="nomProd" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>INDICADOR BASE</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba el Indicador Base del producto" type="text"
                                    class="form-control" name="iB" id="iB" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>META CUATRIENIA</label>
                            <div class="form-group mb-3">
                                <input placeholder="Escriba la Cuatrenia del producto" type="text" class="form-control"
                                    name="mCuatrienia" id="mCuatrienia" required>
                            </div>
                        </div>


                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="requipoais_id">OPCION OTRO:</label>
                                <select class="select2 @error('requipoais_id') is-invalid @enderror" name="requipoais_id"
                                    id="requipoais_id" style="width: 100%;">
                                    <option disabled selected>Seleccione si es otro</option>
                                    @foreach ($requipoais as $requipoai)
                                        <option value="{{ $requipoai->id }}"
                                            {{ old('requipoais_id') == $requipoai->id ? 'selected' : '' }}>
                                            {{ $requipoai->detpoai }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('requipoais_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label>UNIDAD DE CONSERVACIÓN | OTRO:</label>
                            <div class="input-group mb-3">
                                <input hidden placeholder="Escriba la unidad de otros" type="text"
                                    class="form-control" name="otro" id="otro">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>NUMERO DE FOLIOS:</label>
                            <div class="input-group mb-3">

                                <input placeholder="Escriba el numero de folios" type="text" class="form-control"
                                    name="folio" id="folio" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fuente_id">SOPORTE DOCUMENTAL:</label>
                                <select class="select2 @error('fuente_id') is-invalid @enderror" name="fuente_id"
                                    id="fuente_id" style="width: 100%;">
                                    <option disabled selected>Seleccione el soporte de los documentos</option>
                                    @foreach ($fuentes as $fuentes)
                                        <option value="{{ $fuentes->id }}"
                                            {{ old('fuente_id') == $fuentes->id ? 'selected' : '' }}>
                                            {{ $fuentes->detfuente }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('fuente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipoprioridade_id">FRECUENCIA DE CONSULTA:</label>
                                <select class="select2 @error('tipoprioridade_id') is-invalid @enderror"
                                    name="tipoprioridade_id" id="tipoprioridade_id" style="width: 100%;">
                                    <option disabled selected>Seleccione la Frecuencia de consulta</option>
                                    @foreach ($tipoprioridades as $tipoprioridad)
                                        <option value="{{ $tipoprioridad->id }}"
                                            {{ old('tipoprioridade_id') == $tipoprioridad->id ? 'selected' : '' }}>
                                            {{ $tipoprioridad->detprioridad }}</option>
                                    @endforeach
                                </select>
                                @error('tipoprioridade_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <label>NOTAS:</label>
                            <div class="input-group sm-3">
                                <input placeholder="Escriba una nota" type="text" class="form-control" name="nota"
                                    id="nota" required onkeypress="return validarCaracter(event)">

                            </div> --}}
                        {{-- </div> --}}
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
    {{-- <div class="modal fade" id="notaModal" tabindex="-1" role="dialog" aria-labelledby="notaModalLabel"
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
    </div> --}}




@endsection
@section('script')
    <!-- Select2 -->
    {!! Html::script('adminlte/plugins/select2/js/select2.full.min.js') !!}
    <!-- Tu otro script personalizado aquí -->

    <script>
        $(function() {

            //Initialize Select2 Elements
            $('.select2').select2()

        });

        // var fK_sProg = $('#fK_sProg');
        // var fK_tProd = $('#fK_tProd');
        // fK_sProg.change(function() {
        //     $.ajax({
        //         url: "{{ route('obtener_productos') }}",
        //         method: 'GET',
        //         data: {
        //             fK_sProg: fK_sProg.val(),
        //         },
        //         success: function(data) {
        //             fK_tProd.empty();
        //             fK_tProd.append(
        //                 '<option disabled selected>Seleccione un Tipo Producto:</option>'
        //             );
        //             $.each(data, function(index, element) {
        //                 fK_tProd.append('<option value="' + element.id + '">' + element
        //                     .nomProd + '</option>')
        //             });
        //         }
        //     });
        // });

        // var otro = $('#otro');
        // var requipoais_id = $('#requipoais_id');

        // $(function() {
        //     $("#requipoais_id").change(function() {
        //         if ($(this).val() == 2) {
        //             $("#otro").prop("hidden", true);
        //             document.getElementById("otro").value = " ";
        //         } else {
        //             $("#otro").prop("hidden", false);

        //         }
        //     });
        // });
    </script>

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
    </script>


    <!-- Agrega este script en la sección 'script' de tu vista -->

    <script>
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
