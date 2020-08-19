@extends('layouts.admin')
@section('content')
    
    <div class="row">
        <div class="col-md-12">
            <label>Fotos</label>
            <div class="file-loading">
                <input id="gallery" name="photosUp[]" type="file" multiple>
            </div>
        </div>
        <input type="hidden" id="token" value="{{csrf_token()}}">
        <input type="hidden"  id="fotosCaballo" name="fotosCaballo" value={{$fotosCaballo}}> 
        <input type="hidden" hidden id="previewConfig" name="previewConfig" value={{$previewConfig}}>    
    </div>
    



    
@push('styles')
<link rel="stylesheet" href="/bootstrap-fileinput/css/fileinput.min.css">
<link rel="stylesheet" href="/bootstrap-fileinput/scss/fileinput.scss">
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
    .file-drag-handle {
        visibility: hidden;
    } 
</style>
    
@endpush

@push('scripts')
<!-- FileInput -->
<script src="/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="/bootstrap-fileinput/js/locales/es.js"></script>
<script src="/bootstrap-fileinput/themes/fas/theme.min.js"></script>
<script src="/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
<script src="/bootstrap-fileinput/js/plugins/purify.min.js"></script>
<script src="/bootstrap-fileinput/themes/fas/theme.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>


<script>
    
    function _(x) {
        return document.getElementById(x);
    } 
    function lista(item,index) {
        console.log(item);
    }
    

    

    $(document).ready(function() {
        
        var $el1 = $("#gallery");
        var fotos = _('fotosCaballo').value;
        var previewConfig = _('previewConfig').value
        var previewConfig = JSON.parse(previewConfig);
        console.log(previewConfig);
       
         /* var fotos = [
            "http://miscaballos.test/storage/imagenes/fotos/57p25mFabDXrETifnkqs.jpg", 
            "http://miscaballos.test/storage/imagenes/fotos/ZFRvaYm5T0TlTO58mezD.jpg", 
            "http://miscaballos.test/storage/imagenes/fotos/OVkCZ0knC6BzjG7iYMQm.jpg"
        ];  */
         
        var fotos = JSON.parse(fotos);
        /* fotos.forEach(lista);   */
        
        var _token = $("input[name='_token']").val()
         
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
            deleteExtraData : function() {
                return {
                    _token: $("input[name='_token']").val(),
                }
            },
            uploadAsync: true,
            initialPreviewAsData: true,
            initialPreview: fotos,
            initialPreviewConfig: previewConfig,
            
            
            showUpload: false, // hide upload button
            overwriteInitial: false, // append files to initial preview
            minFileCount: 1,
            maxFileCount: 15,
            dropZoneEnabled:true,
            browseOnZoneClick: true,
            
            showPreview: true,
            showCancel:false,
            showCaption: false,
            showRemove: true,
            showUpload: false,
            browseClass: "btn btn-primary btn-block",
            browseLabel: "Elige fotos de tu caballo",
            layoutTemplates: {main2: '{preview}'},
           /*  deleteUrl: "{{route('admin.photos.destroy')}}" */ 
            
        }).on("filebatchselected", function(event, files) {
            $el1.fileinput("upload");  
        });
    });
    
   
</script>  
    
@endpush    
@endsection
{{-- initialPreviewConfig: [
                {type:'image', url: "http://miscaballos.test/admin/photos",key:'papa', 
                _token :function() {
                return {
                    _token: $("input[name='_token']").val(),
                }
                },
                
                },
            ], --}}