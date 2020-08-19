@extends('layouts.admin')
@section('content')

  <button class ="btn btn-success mt-3 mb-3"  data-toggle="modal" data-target="#exampleModal"><i class ="fa fa-plus"></i> Nuevo caballo</button>
  
  
      <table class="table border">
        <thead>
        <tr>
          <th style="width:10%"></th>
          <th style="width:70%" >Nombre</th>
          
          <th class="text-center" style="width: 20%">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($caballos as $caballo)
                <tr>
                    <td><img src="http://miscaballos.test/storage/imagenes/portadas/{{$caballo->fotoPortada}}" class="rounded mx-auto d-block" id="avatarImage" width="50" height="50"></td>
                    <td>{{$caballo->name}}</td>
                    <td>
                      <a href="{{route('admin.caballos.edit',$caballo->urlClean)}}" class ="btn btn-xs btn-primary">Editar</a>
                        <a href="{{route('admin.caballos.edit',$caballo)}}" class ="btn btn-xs btn-primary">Ver</a> 
                        
                        <button data-toggle="modal" data-target="#deleteModal" data-id="{{$caballo->id}}" class ="btn btn-xs btn-danger ">Borrar</button>
                            
                          
                    </td>
                </tr>  
            @endforeach

        </tbody>
        
      </table>
      {{$caballos->links()}}
      

@endsection

@push('scripts')
  



  <script>
    window.onload = function() {
      $('#deleteModal').on('show.bs.modal', function (event) {
        console.log("modal abierto")
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        action = $('#formDelete').attr('data-action').slice(0,-1)
        console.log(action)
        $('#formDelete').attr('action',action + id)
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Vas a borrar el caballo ' + id)
        
      });
    };
  </script>
@endpush

<!-- Modal  borrar caballo-->


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Seguro que desea borrar el caballo seleccionado?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <form id="formDelete" method="POST" action="{{ route('admin.caballos.destroy', 0)}}" data-action="{{ route('admin.caballos.destroy', 0)}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-primary btn-danger">Borrar</button>
          </form>

        
      </div>
    </div>
  </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('admin.caballos.store')}}">
    {{csrf_field()}}
    @include('admin.partials.error')
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo caballo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Nombre del caballo</label>
          <input name='name' class="form-control" value = "{{old('name')}}" placeholder='Introduce el nombre del caballo'>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button class="btn btn-primary" >Crear caballo</button>
      </div>
    </div>
    <input type="text", name="estado" value="PRIVADO" hidden>
  </div>
</form>


</div>  
