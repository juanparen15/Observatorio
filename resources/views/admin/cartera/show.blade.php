@extends('adminlte::page')

@section('title', 'Carteras')



@section('content_header')
    <h1>Detalles Carteras</h1>
@stop

@section('content')
  <div class="card">
    <div class="card-header">
        <h1 class="card-title">hola a todos</h1>
    </div>
    <div class="card-header">
        <p>Bienvenido a este hermoso panel de administración.</p>
    </div>    
 </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
) </script>
@stop