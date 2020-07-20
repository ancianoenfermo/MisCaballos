@extends('admin.layout')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span class="h1">Anuncio<span class="ml-5 badge badge-secondary">{{$anuncio->estado == 'PUBLICO' ? 'Público' : 'Privado'
        }}</span></span>
        </div><!-- /.col -->
        
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <i class="right fas fa-home"> </i>    
                </a>
            </li>
            <li class="breadcrumb-item active">Nuevo anuncio</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
@endsection

@section('content')


<form method="POST" action="{{route('admin.anuncios.update',$anuncio)}}" enctype="multipart/form-data">
   {{csrf_field()}} {{method_field('PUT')}}
   @include('admin.partials.error')
   <div class="card card-primary card-outline">
       <div class = "card-body"> 
            <div class="row border border-secondary bg-secondary">
               
                <!-- Foto portada-->
                <div class="col-md-2 mt-1 mb-1 d-flex align-items-center justify-content-center ">
                    <div  class="img-thumbnail bg-secondary " id="preview" >
                        <img src="http://miscaballos.test/storage/imagenes/portadas/{{$anuncio->caballo->fotoPortada}}" class="rounded mx-auto d-block" id="avatarImage" width="100" height="100">                   
                    </div>    
                </div>
               
                <div class="col-md-10 ">
                    <div class="row mt-4 ">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre del caballo</label>
                                <span>{{$anuncio->caballo->name}}</span>
                            </div>
                        </div> 
                        <!-- Fecha de nacimiento -->
                        <div class="col-md-3">
                            <label>Años</label>
                            <span>{{$anuncio->caballo->fechaNacimiento->diffInYears($fechaActual)+1}}</span>
                                
                        </div>
                        <div class="col-md-3">
                            <!-- Comunidad -->
                            <div class="form-group input-group-sm">
                                <label>Ubicación</label>
                                <span>{{$anuncio->caballo->comunidad->name}}</span>
                            </div>
                        </div>
                   </div>
             
                   <div class="row">
                        <!-- Raza -->
                        <div class="col-md-4">
                            <div class=" form-group input-group-sm">
                                <label>Raza</label>
                                <span>{{$anuncio->caballo->raza->name}}</span>
                            </div>
                        </div>
                        <!-- Sexo -->
                        <div class="col-md-3">
                            <div class="form-group input-group-sm ">
                                <label>Sexo</label>
                                <span>{{$anuncio->caballo->sexo->name}}</span>
                            </div> 
                        </div> 
                        <div class="col-md-3">
                            <!-- capa -->
                            <div class="form-group input-group-sm ">
                                <label>Capa</label>
                                <span>{{$anuncio->caballo->capa->name}}</span>
                            </div>
                        </div>  
                        <!-- Alzada -->
                        <div class="col-md-2">
                            <div class="form-group input-group-sm">
                                <label>Alzada</label>
                                <span>{{$anuncio->caballo->alzada}}</span>
                            </div>
                        </div>  
                   </div>

                </div>
            </div>

            <div class="row mt-4 border border-secondary ">
                <div class="col-md-12 form-group mt-2">
                    <label for="exampleFormControlTextarea1">Texto del anuncio</label>
                    <textarea name="textoDestacado" class="form-control" rows="2" placeholder="máximo 350 cacateres" rows="3"
                     style=" resize: none;" maxlength="350">{{old('textoDestacado', $anuncio->textoDestacado)}}</textarea>
                </div>            
            </div>







            <div class="row mt-4 border border-secondary ">
                <!-- Disciplina -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Precio</label>
                        <select name = "precio" class="form-control" >
                            <option value="" style="display:none;"></option>
                                @foreach($precios as $precio)
                                    <option value="{{$precio->id}}" 
                                        {{ old('precio', $anuncio->precio_id) == $precio->id ? 'selected' : '' }}
                                        >{{$precio->name}}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="transporte" id="defaultCheck1" {{(old('transporte',$anuncio->transporte) == 'on') ? 'checked' : ''}}   >
                        <label class="form-check-label" for="defaultCheck1"></label>
                          Transporte incluidos {{old('transporte')}}
                        </label>
                    </div>
                    
                   
                </div>
                              
                
            </div>
            
            
            <div class="row mt-4 border border-secondary">
                
                <div class="col-md-12">
                <label class="mt-2">Estado</label><br>
                </div>
                <div class="pl-4 mb-2">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="PRIVADO" {{(old('estado',$anuncio->estado) == 'PRIVADO') ? 'checked' : ''}}>
                    <label class="custom-control-label" for="customRadioInline1">Privado</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="PUBLICO" {{(old('estado',$anuncio->estado) == 'PUBLICO') ? 'checked' : ''}} >
                    <label class="custom-control-label" for="customRadioInline2">Público</label>
                </div>
                </div>

            </div>


        
            <div class="row mt-4">     
                <div class="col-md-12">
                    <!-- BOTÓN GUARDAR COMO PUBLICO -->
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Guardar</button>
                    </div>
                </div>
               
            </div>  
        </div> <!-- fin CARD-BODY -->
   </div>   <!-- fin CARD -->
                    
                   
   
    
    
    
</form> 

@endsection



@push('styles')
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endpush


@push('scripts')
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

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
