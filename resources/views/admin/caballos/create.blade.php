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
                @include('admin.partials.error')
                <div class="card card-primary card-outline">
                    <div class = "card-body">
                        <!-- FILA 1 -->
                        <div class="row">
                            
                            <div class="col-md-6">
                                <!-- Nombre del caballo -->
                                <div class="form-group">
                                    <label>Nombre del cabalo</label>
                                    <input name='name' class="form-control" value = "{{old('name')}}" placeholder='Introduce el nombre del caballo'>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Fecha de nacimiento -->
                                <div class="form-group">
                                    <label>Date masks:</label>
                  
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                      </div>
                                      <input name = "fechaNacimiento" type="text" class="form-control" value = "{{old('fechaNacimiento')}}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    </div>
                                    <!-- /.input group -->
                                  </div>
                                
                            </div>


                            
                            <div class="col-md-4">
                                <!-- Comunidad -->
                                <div class="form-group">
                                    <label>Ubicación</label>
                                    <select name = "comunidad"class="form-control">
                                        <option value="">Selecciona una comunidad</option>
                                        @foreach($comunidades as $comunidad)
                                        <option value="{{$comunidad->id}}"
                                            {{ old('comunidad') == $comunidad->id ? 'selected' : '' }}
                                            >{{$comunidad->name}}</option>
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
                                            <option value="{{$raza->id}}"
                                            {{ old('raza') == $raza->id ? 'selected' : '' }}
                                            >{{$raza->name}}</option>
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
                                            <option value="{{$sexo->id}}"
                                                {{ old('sexo') == $sexo->id ? 'selected' : '' }}
                                                >{{$sexo->name}}</option>
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
                                            <option value="{{$capa->id}}"
                                            {{ old('capa') == $capa->id ? 'selected' : '' }}  
                                            >{{$capa->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <!-- Alzada -->
                                <div class="form-group">
                                    <label>Alzada</label>
                                    <input class="form-control" value = "{{old('alzada')}}"  name='alzada' type="number"  placeholder='Alzada' min=100 max=250>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Alzada Estimada -->
                                <div class="form-group">
                                    <label>Alzada estimada</label>
                                    <input class="form-control"  value = "{{old('alzadaEstimada')}}"name='alzadaEstimada' type="number"  placeholder='Alzada estimada' min=100 max=250>
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
                                            <option  
                                                {{ collect(old('disciplinas'))->contains($disciplina->id) ? 'selected' : ''}}
                                                value="{{$disciplina->id}}">{{$disciplina->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Carácter</label>
                                    <select name="carcters[]" class="select2" multiple="multiple" data-placeholder="Selecciona uno o más" style="width: 100%;">
                                        @foreach($caracters as $caracter)
                                            <option  
                                                {{ collect(old('carcters'))->contains($caracter->id) ? 'selected' : ''}}
                                                value="{{$caracter->id}}">{{$caracter->name}}
                                            </option>
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
                                    <textarea 
                                        style="resize: none" 
                                        maxlength="250" 
                                        rows="3"
                                        name='textoDestacado' 
                                        class="form-control"
                                        placeholder='Introduce un resumen de tu caballo'>
                                        {{old('textoDestacado')}}
                                    </textarea>
                                </div>
                            </div>    
                             
                            <div class="col-md-12">
                                <!-- Descripción del caballo-->
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea 
                                            rows='10' 
                                            name='body' 
                                            class="form-control" 
                                            placeholder='Introduce una descripción detallada del caballo'>
                                            {{old('body')}} 
                                        </textarea>
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


<!-- InputMask -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>


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
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/aaaa' })
      //Money Euro
      $('[data-mask]').inputmask()
    })
  </script>
 @endpush
