@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-12">
        <label>Descripción</label>
        <div>
            <textarea id="tinymce">Hello, World!</textarea>
        </div>
        <input type="hidden" id="token" value="{{csrf_token()}}">
    </div>
</div>
@push('scripts')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('js/tinymce_image_upload.js') }}"></script>

    
@endpush
@endsection