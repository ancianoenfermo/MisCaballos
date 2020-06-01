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
                <div class="card card-primary card-outline">
                    <div class = "card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <!-- Nombre del caballo -->
                                <div class="form-group">
                                    <label>Nombre del cabalo</label>
                                    <input name='name' class="form-control" placeholder='Introduce el nombre del caballo'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                 <!-- Fecha de nacimiento -->
                                 <div class="form-group">
                                    <label>Fecha de nacimiento:</label>
                                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                 <!-- Comunidad -->
                                <div class="form-goup">
                                    <label>Ubicación</label>
                                    <select class="form-control">
                                        <option value="">Selecciona una comunidad</option>
                                        @foreach($comunidades as $comunidad)
                                        <option value="{{$comunidad->id}}">{{$comunidad->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                    
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
                <div class ="card card-primary card-outline ">
                    <div class="card-body">
                        <!-- Sexo -->
                        <div class="form-goup">
                            <label>Sexo</label>
                            <select class="form-control">
                                <option value="">Selecciona un sexo</option>
                                @foreach($sexos as $sexo)
                                <option value="{{$sexo->id}}">{{$sexo->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- capa -->
                        <div class="form-goup mt-2">
                            <label>Capa</label>
                            <select class="form-control">
                                <option value="">Selecciona una capa</option>
                                @foreach($capas as $capa)
                                <option value="{{$capa->id}}">{{$capa->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- caracter -->
                        <div class="form-goup mt-2">
                            <label>Carácter</label>
                            <select class="form-control">
                                <option value="">Selecciona carácter</option>
                                @foreach($caracters as $caracter)
                                <option value="{{$caracter->id}}">{{$caracter->name}}</option>
                                @endforeach
                            </select>
                        </div>
                         <!-- Disciplina -->
                        <div class="form-group mt-2">
                            <label>Disciplina</label>
                            <select class="select2" multiple="multiple" data-placeholder="Selecciona una o más disciplinas" style="width: 100%;">
                                @foreach($disciplinas as $disciplina)
                                <option  value="{{$disciplina->id}}">{{$disciplina->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    
                    
                    </div>
                </div>
            </div>
    </div>
</form>
@endsection

@push('styles')
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

<!-- Theme style -->
<!-- <link rel="stylesheet" href="/dist/css/adminlte.min.css"> -->
@endpush


@push('scripts')
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
 <!-- CKeditor -->
 <script src="/cKeditor/cKeditor.js"></script>
<script>
   CKEDITOR.replace('body');
</script>
<script>
    $('.select2').select2()
 //Initialize Select2 Elements
 $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>

 @endpush
