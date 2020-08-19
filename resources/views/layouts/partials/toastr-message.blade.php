<script>
    @if(session('message'))
        @if (session('message')['alert'] == 'success')
            toastr.success("{{session('message')['text']}}");
        @elseif (session('message')['alert'] == 'error')
            toastr.error("{{session('message')['text']}}");
        @endif
        {{session()->forget('message')}}  
    @endif
</script>