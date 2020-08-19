@extends('layouts.admin')
@section('header')
<div class="content-header">
  PPPPPP  
</div>
@endsection
@section('content')
   
    <div class="row mt-4">
        <div class="col-md-12">      
            {{-- <div class="form-group"> --}}
                <textarea id="editor" name="content" class="form-control"></textarea>
            {{-- </div> --}}
        </div>
    </div>

{{-- @push('styles')
<script src="{{ asset('vendor/ckeditor5/sample/styles.css') }}"></script>
    
@endpush  --}}   
@push('scripts')
<script src="{{ asset('vendor/ckeditor5/build/ckeditor.js') }}"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: {
					items: [
                        'undo',
                        'redo',
                        '|',
                        'heading',
                        'fontColor',
                        'fontSize',
                        'fontFamily',
						'|',
						'bulletedList',
						'numberedList',
						'|',
						'indent',
						'outdent',
						'|',
                        'ckfinder',
						'insertTable',
						'mediaEmbed',
						'exportPdf'
					]
				},  
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
@include('ckfinder::setup')
{{-- <script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script> --}}
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
@endpush
@endsection
