<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="POST" action="{{route('admin.caballos.store')}}">
      {{csrf_field()}}
    
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
            <input name='name'  class="form-control" value = "{{old('name')}}" placeholder='Introduce el nombre del caballo'>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Crear caballo</button>
        </div>
      </div>
    </div>
  </form>
  </div>