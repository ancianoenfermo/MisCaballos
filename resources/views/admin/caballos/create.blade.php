@extends('admin.layout')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo caballo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <i class="right fas fa-home"> </i>    
                </a>
            </li>
            <li class="breadcrumb-item active">Nuevo caballo</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

@endsection
@section('content')
<form>
    <div class="row">
            <div class="col-md-8">
                
                <div class="card card-primary">
                    <div class = "card-body">
                        <!-- Nombre del caballo -->
                        <div class="form-group">
                            <label>Nombre del cabalo</label>
                            <input name='name' class="form-control" placeholder='Introduce el nombre del caballo'>

                        </div>
                        <!-- Texto destacado del caballo-->
                        <div class="form-group">
                            <label>Texto destacado</label>
                            <textarea name='textoDestacado' class="form-control" placeholder='Introduce un resumen de tu caballo'></textarea>
                        </div>
                        <!-- Descripción del caballo-->
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea rows='10' name='body' class="form-control" placeholder='Introduce una descripción detallada del caballo'></textarea>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class ="card card-primary">
                    <div class="card-body">
                        <!-- Date -->
                        <div class="form-group">
                            <label>Fecha de nacimiento:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input name="fechaNacimiento" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <!-- Texto destacado del caballo-->
                        <div class="form-group">
                            <label>Texto destacado</label>
                            <textarea name='textoDestacado' class="form-control" placeholder='Introduce un resumen de tu caballo'></textarea>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>
@endsection
<!-- daterange picker -->
<link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
<script>
$('#reservationdate').datetimepicker({
    format: 'L'
});
</script>