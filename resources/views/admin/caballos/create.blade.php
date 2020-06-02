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
<form method="POST" action="{{route('admin.caballos.store')}}">
   {{csrf_field()}}
    <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class = "card-body">
                        <!-- FILA 1 -->
                        <div class="row">
                            
                            <div class="col-md-6">
                                <!-- Nombre del caballo -->
                                <div class="form-group">
                                    <label>Nombre del cabalo</label>
                                    <input name='name' class="form-control" placeholder='Introduce el nombre del caballo'>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Fecha de nacimiento -->
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                          <input name= "fechaNacimiento" type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                    </div>
                                </div>
                                
                            </div>


                            
                            <div class="col-md-4">
                                <!-- Comunidad -->
                                <div class="form-group">
                                    <label>Ubicación</label>
                                    <select name = "comunidad"class="form-control">
                                        <option value="">Selecciona una comunidad</option>
                                        @foreach($comunidades as $comunidad)
                                        <option value="{{$comunidad->id}}">{{$comunidad->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            
                        </div>
                        <!-- FILA 2 -->
                        <div class="row mt-3">
                            
                            <div class="col-md-3">
                                <!-- Raza -->
                               <div class="form-group">
                                   <label>Raza</label>
                                   <select name="raza" class="form-control">
                                        <option value="">Selecciona una raza</option>
                                        @foreach($razas as $raza)
                               <           <option value="{{$raza->id}}">{{$raza->name}}</option>
                                        @endforeach
                                   </select>
                               </div>
                           </div>
                           
                           
                            <div class="col-md-2">
                                 <!-- Sexo -->
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control">
                                         <option value="">Selecciona un sexo</option>
                                         @foreach($sexos as $sexo)
                                <           <option value="{{$sexo->id}}">{{$sexo->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                 <!-- capa -->
                                <div class="form-group">
                                    <label>Capa</label>
                                    <select name="capa" class="form-control">
                                        <option value="">Selecciona una capa</option>
                                        @foreach($capas as $capa)
                                        <option value="{{$capa->id}}">{{$capa->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <!-- Alzada -->
                                <div class="form-group">
                                    <label>Alzada</label>
                                    <input class="form-control"  name='alzada' type="number"  placeholder='Alzada' min=100 max=250>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Alzada Estimada -->
                                <div class="form-group">
                                    <label>Alzada estimada</label>
                                    <input class="form-control"  name='alzadaEstimada' type="number"  placeholder='Alzada estimada' min=100 max=250>
                                </div>
                            </div>
                        </div>

                        <!-- FILA 3 -->
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Disciplina</label>
                                    <select name="disciplinas[]" class="select2" multiple="multiple" data-placeholder="Selecciona una o más" style="width: 100%;">
                                        @foreach($disciplinas as $disciplina)
                                        <option  value="{{$disciplina->id}}">{{$disciplina->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Carácter</label>
                                    <select name="carcters[]" class="select2" multiple="multiple" data-placeholder="Selecciona uno o más" style="width: 100%;">
                                        @foreach($caracters as $caracter)
                                        <option  value="{{$caracter->id}}">{{$caracter->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <div class="row mt-3">
                            <div class="col-md-12">

                                <!-- Texto destacado del caballo-->
                                <div class="form-group" resize = "none">
                                    <label>Texto destacado</label>
                                    <textarea style="resize: none" maxlength="250" rows="3" name='textoDestacado' class="form-control" placeholder='Introduce un resumen de tu caballo'></textarea>
                                </div>
                            </div>    
                             
                            <div class="col-md-12">
                                <!-- Descripción del caballo-->
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea rows='10' name='body' class="form-control" placeholder='Introduce una descripción detallada del caballo'></textarea>
                                    </div>
                            </div>
                           
                            <div class="col-md-12">
                             <!-- BOTÓN GUARDAR -->
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Guardar caballo</button>

                                </div>
                            </div>

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
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
    })
  </script>

 @endpush
