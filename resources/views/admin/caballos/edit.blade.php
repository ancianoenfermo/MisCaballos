@extends('admin.layout')


@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Nuevo caballotttt</h1>
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
                                    <input name='name' class="form-control" value = "{{old('name', $caballo->name)}}" placeholder='Introduce el nombre del caballo'>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Fecha de nacimiento -->
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                  
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                      </div>
                                      <input name = "fechaNacimiento" type="text" class="form-control" 
                                            value = "{{old('fechaNacimiento', $caballo->fechaNacimiento ? $caballo->fechaNacimiento->format('m/dY') : null)}}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
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
                                                    {{ old('comunidad', $caballo->comunidad_id) == $comunidad->id ? 'selected' : '' }}
                                                    >{{$comunidad->name}}
                                                </option>
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
                                    <select name = "raza"class="form-control">
                                        <option value="">Selecciona una raza</option>
                                            @foreach($razas as $raza)
                                                <option value="{{$raza->id}}" 
                                                    {{ old('raza', $caballo->raza_id) == $raza->id ? 'selected' : '' }}
                                                    >{{$raza->name}}
                                                </option>
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
                                                {{ old('sexo',$caballo->sexo_id ) == $sexo->id ? 'selected' : '' }}
                                                >{{$sexo->name}}</option>
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                 <!-- capa -->
                                <div class="form-group">
                                    <label>Capa</label>
                                    <select name = "capa"class="form-control">
                                        <option value="">Selecciona una capa</option>
                                            @foreach($capas as $capa)
                                                <option value="{{$capa->id}}" 
                                                    {{ old('capa', $caballo->capa_id) == $capa->id ? 'selected' : '' }}
                                                    >{{$capa->name}}
                                                </option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-2">
                                <!-- Alzada -->
                                <div class="form-group">
                                    <label>Alzada</label>
                                    <input class="form-control" value = "{{old('alzada', $caballo->alzada)}}"  name='alzada' type="number"  placeholder='Alzada' min=100 max=250>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <!-- Alzada Estimada -->
                                <div class="form-group">
                                    <label>Alzada estimada</label>
                                    <input class="form-control"  value = "{{old('alzadaEstimada', $caballo->alzadaEstimada)}}"name='alzadaEstimada' type="number"  placeholder='Alzada estimada' min=100 max=250>
                                </div>
                            </div>
                        </div>

                        <!-- FILA 3 -->
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Disciplina</label>
                                    <select name="disciplinas[]" class="from-control select2" multiple="multiple" data-placeholder="Selecciona una o más" style="width: 100%;">
                                        @foreach($disciplinas as $disciplina)
                                            <!-- <option {{ collect(old('disciplinas',$disciplinasActuales ))->contains($disciplina->id) ? 'selected' : ''}}
                                                value="{{$disciplina->id}}">{{$disciplina->name}}
                                            </option>    -->  
                                            <option  
                                                {{ collect(old('disciplinas', $disciplinasActuales))->contains($disciplina->id) ? 'selected' : ''}}
                                                value="{{$disciplina->id}}">{{$disciplina->name}}
                                            </option>
                                       
                                         @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
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

                        </div>
                    

                        <div class="row mt-3">
                                
                               <!-- Foto portada-->
                                <div class="form-group">
                                    <label for="foto" class="col-md-12 bg-primary control-label">Foto de portada</label>
                                    <div class="col-md-12">
                                        <input type="file" name="foto_up" id="fotoPortada" data-initial-preview="{{Storage::url('imagenes/portadas/'.old('fotoPortada',$caballo->fotoPortada))}}" accept="image/*">
                                    </div>
                                </div>
                                <!-- <input type="file" name="foto_up" id="fotoPortada" data-initial-preview="{{isset($caballo->fotoportada) ? Storage::url('imagenes/portadas/$caballo->fotoportada') : 'https://via.placeholder.com/150'}}" accept="image/*"> -->  
                                <!-- Texto destacado del caballo-->
                                <div class="form-group col-md-12">
                                    <label>Texto destacado</label>
                                    <textarea id="textodestacado" name = "textoDestacado" class="form-control"
                                    placeholder="Introduce un resumen de tu caballo">{{old('textoDestacado', $caballo->textoDestacado)}}</textarea>
                                </div>
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
                                
                                
                            </div>  

                            <!-- <div class="col-md-12">
                                <label for="foto" class="col-md-12 bg-primary control-label">Foto de portada</label>
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="from-group">
                                    <input type="file"class="file" multiple name="foto_up" id="galeria" accept="image/*"
                                    data-owerwrite-initial="false"
                                    initialPreviewAsData= true, 
                                    initialPreviewFileType= 'image',
                                    initialPreview= ['<img src='AAAAAstorage/imagenes/fotos/NwxzO2iy7w28kQPCYmqR.jpg>',
                                     '<img src='storage/imagenes/fotos/VA0q8QF5W9ixX2sIOVWg.jpg>'
                                     ],
                                    >
                                </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="file-loading">
                                    <input id="gallery" name="photosUp[]" type="file" multiple>
                                </div>
                            </div>
                       
                        </div>

                        
                        <div class="row">     
                           
                            @if ($caballo->fechaPublicacion)
                            <div class="col-md-12">
                                <!-- BOTÓN ACTUALIZAR -->
                                <div class="form-group ml-15">
                                    <button name="tipo" value= "borrador" class="btn btn-primary btn-block">Actualizar</button>
                                </div>
                            </div>
                            @else 
                            <div class="col-md-6">
                                <!-- BOTÓN GUARDAR COMO BORRADOR -->
                                <div class="form-group">
                                    <button name="tipo" value= "borrador" class="btn btn-primary btn-block">Guardar Borrador</button>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- BOTÓN GUARDAR COMO BORRADOR -->
                                <div class="form-group">
                                    <button name="tipo" value= "publicar" class="btn btn-primary btn-block">Publicar caballo</button>
                                </div>
                            </div>
                           
                            @endif
                        </div>
                    <!-- Fin card-body -->
                    </div>
                </div>
            </div>
            
            
                   
            <input type="text" hidden id="fotosCaballo" name="fotosCaballo" value={{$fotosCaballo}}>
    </div>
    
</form> 

<!-- @if($caballo->photos->count())
<div class="row">
<div class="col-md-12">
    <div class="card card-primary card-outline">
        <div class = "card-body">
                          
                @foreach($caballo->photos as $photo)
                <form method ="POST" action="{{route('admin.photos.destroy', $photo)}}">
                    {{method_field('DELETE')}} {{csrf_field()}}
                    <div class="col-md-2 display: flex float-left">
                        <button class="btn btn-danger btn-xs" style="position:absolute">
                            <i class="fas fa-trash"></i>
                        </button>
                        <img class="img-fluid" src="{{ url('storage/'.$photo->url)}}">                      
                    </div>
                </form>
                @endforeach 
                    
            
        </div>
    </div>
</div>
</div>

@endif -->


@endsection



@push('styles')
<link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.css">
<link rel="stylesheet" href="/bootstrap-fileinput/css/fileinput.min.css">

@endpush


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.js"></script>
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- InputMask -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

<!-- FileInput -->
<script src="/dropzone/dist/dropzone.js"></script>
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
    
    
    $('#fotoPortada').fileinput({
        language: 'es',
        allowedFileExtensions: ['jpg','jpeg','png'],
        maxFileSize: 1000,
        showUpload: false,
        showRemove: false,
        showClose: false,
        showCancel: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme: 'fas'

    });

    function _(x) {
        return document.getElementById(x);
    } 


    $(document).ready(function() {
        
        var $el1 = $("#gallery");
        var fotos = _('fotosCaballo').value;
        var aa = JSON.parse(fotos);
        console.log(aa);
        
        
        var url1 = "http://miscaballos.test/storage/imagenes/fotos/XFkapiOA2wKqiOcPJzkJ.jpg";
        var url2 =  "http://miscaballos.test/storage/imagenes/fotos/zb1jVeswOLivtFiW65Fo.jpg";
        
        var pp = [url1,url2];
        console.log(Array.isArray(pp));
      
        
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
            deleteUrl: "/site/file-delete",
            showUpload: false, // hide upload button
            overwriteInitial: false, // append files to initial preview
            minFileCount: 1,
            maxFileCount: 5,
            browseOnZoneClick: true,
            initialPreviewAsData: true,
        }).on("filebatchselected", function(event, files) {
            $el1.fileinput("upload");
        });
    });
   
</script>  

 @endpush


 <!-- $("#gallery9").fileinput({
    language:'es',
    theme: "fas",
    uploadAsync: true,
    allowedFileExtensions: ['jpg','jpeg','png'],
    uploadUrl: "{{route('admin.caballos.photos.store',$caballo)}}",
    uploadExtraData: function() {
        return {
            _token: $("input[name='_token']").val(),
        }
    },
    browseOnZoneClick: true,
    resizeImageQuality: 0.75
}); -->