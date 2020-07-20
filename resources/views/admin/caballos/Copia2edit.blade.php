@extends('admin.layout')

@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{$caballo->name}}<span class="ml-5 badge badge-secondary">{{$caballo->estado == 'PUBLICO' ? 'Público' : 'Privado'
        }}</span></h1>
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


<form method="POST" action="{{route('admin.caballos.update',$caballo)}}" enctype="multipart/form-data">
   {{csrf_field()}} {{method_field('PUT')}}
   @include('admin.partials.error')
   <div class="card card-primary card-outline">
       <div class = "card-body"> 
            <div class="row border border-secondary">
               
                <!-- Foto portada-->
                <div class="col-md-2 mt-1 mb-1">
                    <div  class="img-thumbnail form-group " id="preview" >
                        <label>Foto de portada</label>
                        <a class="btn btn-default" href="#" id="file-select">Elegir foto</a>
                        <img src="http://miscaballos.test/storage/imagenes/portadas/{{$caballo->fotoPortada}}" class="rounded mx-auto d-block" id="avatarImage" width="100" height="100">
                        <input type='file' name='fotoPortada' id="file" value=  "{{old('fotoPortada', $caballo->fotoPortada)}}" accept="image/*">
                    </div>   
                </div>
               
                <div class="col-md-10 ">
                    <div class="row ">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <div class="form-group input-group-sm">
                                <label>Nombre del caballo</label>
                                <input name='name' class="form-control" value = "{{old('name', $caballo->name)}}" placeholder='Introduce el nombre del caballo'>
                            </div>
                        </div> 
                        <!-- Fecha de nacimiento -->
                        <div class="col-md-3">
                            <label>Fecha nacimiento</label>
                            <div class="input-group  input-group-sm mb-3">
                                <div class="input-group-prepend">
                            
                                  <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                
                                <input name = "fechaNacimiento" type="text" class="form-control" 
                                value = "{{old('fechaNacimiento', $caballo->fechaNacimiento ? $caballo->fechaNacimiento->format('m/dY') : null)}}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div> 
                        </div>
                        <div class="col-md-3">
                            <!-- Comunidad -->
                            <div class="form-group input-group-sm">
                                <label>Ubicación</label>
                                <select name = "comunidad" class="form-control">
                                    <option value="" style="display:none;"></option>
                                        @foreach($comunidades as $comunidad)
                                            <option value="{{$comunidad->id}}" 
                                                {{ old('comunidad', $caballo->comunidad_id) == $comunidad->id ? 'selected' : '' }}
                                                >{{$comunidad->name}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                   </div>
             
                   <div class="row">
                        <!-- Raza -->
                        <div class="col-md-2">
                            <div class=" form-group input-group-sm">
                                <label>Raza</label>
                                <select name = "raza"class="form-control">
                                    <option value="" style="display:none;"  ></option>
                                        @foreach($razas as $raza)
                                            <option value="{{$raza->id}}" 
                                                {{ old('raza', $caballo->raza_id) == $raza->id ? 'selected' : '' }}
                                                >{{$raza->name}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Sexo -->
                        <div class="col-md-2">
                            <div class="form-group input-group-sm ">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control">
                                        <option value="" style="display:none;" ></option>
                                        @foreach($sexos as $sexo)
                                        <option value="{{$sexo->id}}"
                                            {{ old('sexo',$caballo->sexo_id ) == $sexo->id ? 'selected' : '' }}
                                            >{{$sexo->name}}</option>
                                        @endforeach
                                </select>
                            </div> 
                        </div> 
                        <div class="col-md-3">
                            <!-- capa -->
                            <div class="form-group input-group-sm ">
                                <label>Capa</label>
                                <select name = "capa"class="form-control">
                                    <option value=""style="display:none;"></option>
                                        @foreach($capas as $capa)
                                            <option value="{{$capa->id}}" 
                                                {{ old('capa', $caballo->capa_id) == $capa->id ? 'selected' : '' }}
                                                >{{$capa->name}}
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>  
                        <!-- Alzada -->
                        <div class="col-md-2">
                            <div class="form-group input-group-sm">
                                <label>Alzada</label>
                                <input class="form-control" value = "{{old('alzada', $caballo->alzada)}}"  name='alzada' type="number"  placeholder='Alzada' min=100 max=250>
                            </div>
                        </div> 
                        <!-- Alzada Estimada -->
                        <div class="col-md-3">
                            <div class="form-group input-group-sm">
                                <label>Alzada estimada</label>
                                <input class="form-control"  value = "{{old('alzadaEstimada', $caballo->alzadaEstimada)}}"name='alzadaEstimada' type="number"  placeholder='Alzada estimada' min=100 max=250>
                            </div>
                        </div>  
                   </div>

                </div>
            </div>

            <div class="row mt-4 border border-secondary ">
                <!-- Disciplina -->
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Disciplina</label>
                        <select name="disciplinas[]" class="from-control select2" multiple="multiple" data-placeholder="Selecciona una o más" style="width: 100%;">
                            @foreach($disciplinas as $disciplina)
                                <option  
                                    {{ collect(old('disciplinas', $disciplinasActuales))->contains($disciplina->id) ? 'selected' : ''}}
                                    value="{{$disciplina->id}}">{{$disciplina->name}}
                                </option>
                           
                             @endforeach
                        </select>
                    </div>
                </div>
                 <!-- Caracter -->
                 <div class="col-md-5">
                    <div class="form-group">
                        <label>Carácter</label>
                        <select name="caracters[]" class="select2" multiple="multiple" data-placeholder="Selecciona uno o más" style="width: 100%;">
                            @foreach($caracters as $caracter)
                                <option  
                                    {{ collect(old('caracters', $carcatersActuales))->contains($caracter->id) ? 'selected' : ''}}
                                    value="{{$caracter->id}}">{{$caracter->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>  

                
                <!-- Concursos -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Concursos</label>
                        <select name = "concurso" class="form-control" >
                            <option value="" style="display:none;"></option>
                                @foreach($concursos as $concurso)
                                    <option value="{{$concurso->id}}" 
                                        {{ old('concurso', $caballo->concurso_id) == $concurso->id ? 'selected' : '' }}
                                        >{{$concurso->name}}
                                    </option>
                                @endforeach
                        </select>
                    </div>
                </div>
                
                
            </div>
            <div class="row mt-4 border border-secondary">
            <!-- <div class="row mt-3 border border-secondary"> -->
                <!-- Descripción del caballo-->
                <div class="col-md-12">      
                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea 
                            rows='10' 
                            name='body' 
                            class="form-control" 
                            placeholder='Introduce una descripción detallada del caballo'>
                            {!!old('body',$caballo->body)!!}</textarea>
                        </div>
                </div>
           <!--  </div> -->
           <!--  <div class="row"> -->
                <div class="col-md-12">
                    <label>Fotos</label>
                    <div class="file-loading">
                        <input id="gallery" name="photosUp[]" type="file" multiple>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4 border border-secondary">
                
                <div class="col-md-12">
                <label class="mt-2">Estado</label><br>
                </div>
                <div class="pl-4 mb-2">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline1" name="estado" class="custom-control-input" value="PRIVADO" {{$caballo->estado == 'PRIVADO' ? 'checked' : ''
                       }}>
                    <label class="custom-control-label" for="customRadioInline1">Privado</label>
                </div>

                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="customRadioInline2" name="estado" class="custom-control-input" value="PUBLICO" {{$caballo->estado == 'PUBLICO' ? 'checked' : ''
                }} >
                    <label class="custom-control-label" for="customRadioInline2">Público</label>
                </div>
                </div>

            </div>


            
            <div class="row mt-4 border border-secondary">
                <div class="col-md-2 pt-2 pb-3 pl-2 bg-secondary ">      
                       
                        <label>Anuncios</label><br>
                       <!--  <div class="col-md-6 mb-3"> -->
                           
                                <select name = "anuncios" id="anuncios">
                                    <option value="ninguno">No quiero anuncios</option>
                                    <option value="venta">Anuncio de venta</option>
                                    <option value="cesion">Anuncio de cesion</option>
                                </select>
                           
                        <!-- </div> -->
                </div> 

                <div class="col-md-10" id="padreAnuncios">  
                        
                        <div  id="venta" class="form-group">
                           
                                <label>Texto del anuncio</label>
                                <input name='textoAnuncio' class="form-control" value = "{{old('textoAnuncio', $caballo->name)}}" placeholder='Introduce el nombre del caballo'>
                            
                           
                           
                            
                            <label>Precio</label>
                            <select name = "precio" class="form-control w-25" >
                                <option value="" style="display:none;"></option>
                                    @foreach($precios as $precio)
                                        <option value="{{$precio->id}}" 
                                            {{ old('precio', $caballo->precio_id) == $precio->id ? 'selected' : '' }}
                                            >{{$precio->name}}
                                        </option>
                                    @endforeach
                                </select>    
                            
                        </div>
                        

                        <div  id="cesion">
                            <Label>CESION</Label>
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
                    
                   
    <input type="text" hidden id="fotosCaballo" name="fotosCaballo" value={{$fotosCaballo}}>
    
    
    
</form> 

@endsection



@push('styles')
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.css">
<link rel="stylesheet" href="/bootstrap-fileinput/css/fileinput.min.css">
<style>
    #preview {
        width: 100%;
        height: 100%;
        margin: 0 auto;
        margin-bottom: 0px;
        position: relative;
    }
    #preview a {
        position: absolute;
        bottom: 5px;
        left:5px;
        right: 5px;
        display: none;
    }
    #file {
        position: absolute;
        visibility: hidden;
        width: 0;
        z-index: -999;
    }
</style>
<style>
    #padreAnuncios div {
        display: none;
    }
</style>
@endpush


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.js"></script>
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- FileInput -->
<script src="/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="/bootstrap-fileinput/js/locales/es.js"></script>
<script src="/bootstrap-fileinput/themes/fas/theme.min.js"></script>






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
<script>
    $(document).ready(function(){
        $('#anuncios').on('change',function(){
            var selectValor = '#'+$(this).val();
            
            $('#padreAnuncios').children('div').hide();
            $('#padreAnuncios').children(selectValor).show();

        });

    });
</script>  
<script>
   
    $('#preview').hover(
        function() {
            $(this).find('a').fadeIn();
        }, function() {
            $(this).find('a').fadeOut();
        }
    );
    
    $('#file-select').on('click',function(e) {
        e.preventDefault();
        $('#file').click();
    });
    
    $('input[type=file]').change(function() {
        var reader = new FileReader();
        var file = (this.files[0].name).toString();
       
       
        reader.onload = function(e) {
            $('#preview img').attr('src',e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
       /*  alert(this.files[0].name) */
        
    });
</script>

<script>
    
    function _(x) {
        return document.getElementById(x);
    } 


    $(document).ready(function() {
        
        var $el1 = $("#gallery");
        var fotos = _('fotosCaballo').value;
       
        var aa = JSON.parse(fotos);
                
        $el1.fileinput({ 
            language: 'es',
            theme: 'fas',
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            uploadUrl: "{{route('admin.caballos.photos.store',$caballo)}}",
            append: true, 
            uploadExtraData: function() {
                return {
                    _token: $("input[name='_token']").val(),
                }
            },
            uploadAsync: true,
            initialPreview: aa,
            showUpload: false, // hide upload button
            overwriteInitial: false, // append files to initial preview
            minFileCount: 1,
            maxFileCount: 5,
            dropZoneEnabled:true,
            browseOnZoneClick: true,
            initialPreviewAsData: true,
            showCancel:false,
            showCaption: false,
            showRemove: false,
            showUpload: false,
            browseClass: "btn btn-primary btn-block",
            browseLabel: "Elige fotos de tu caballo",
            layoutTemplates: {main2: '{preview}'},
           
    
            
        }).on("filebatchselected", function(event, files) {
            $el1.fileinput("upload");
        });
    });
   
</script>  

 @endpush
