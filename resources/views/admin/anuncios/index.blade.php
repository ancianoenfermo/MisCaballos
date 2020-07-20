@extends('admin.layout')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Mis anuncios</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <i class="right fas fa-home"> </i>    
                </a>
            </li>
            <li class="breadcrumb-item active">Mis anuncios</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

@endsection
@section('content')
<div class="card-primary">
    <div class="card-header">
      <h3 class="card-title">Todos los anuncios de {{auth()->user()->name}} </h3>
      <button class ="btn btn-primary float-right"  data-toggle="modal" data-target="#exampleModal"><i class ="fa fa-plus"></i> Nuevo anuncio</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="caballos-table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="width:5%">Tipo</th>
            <th style="width:10%"></th>
            <th style="width:25%" >Nombre del Caballo</th>
            <th style="width:50%" >Texto del anuncio</th>
            <th style="width: 5%">Estado</th>
            <th style="width: 5%">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($anuncios as $anuncio)
              <tr>
                <td><span class="badge badge-pill badge-info">VENTA</span></td>
                  <td><img src="http://miscaballos.test/storage/imagenes/portadas/{{$anuncio->caballo->fotoPortada}}" class="rounded mx-auto d-block" id="avatarImage" width="50" height="50">   </td>
                  <td>{{$anuncio->caballo->name}}</td>
                  <td>
                    {{$anuncio->textoDestacado}}</td>
                  <td><span class="badge badge-pill badge-info">{{$anuncio->estado}}</span></td>
                 
                  <td>
                      <a href="{{route('admin.anuncios.edit',$anuncio)}}"class ="btn btn-xs btn-info">
                        <i class="fa fa-pencil-alt" ></i></a>
                        <form method="POST" action="{{route('admin.anuncios.destroy',$anuncio)}}" style="display: inline">
                          {{csrf_field()}} {{method_field('DELETE')}}
                          <button class ="btn btn-xs btn-danger "><i class="fa fa-times" ></i></button>
                        </form>
                  </td>
                  
              </tr>  
          @endforeach


        
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
@endsection

@push('styles')
 <!-- DataTables -->
 <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

 @endpush

 @push('scripts')
<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- DataTable script -->
<script>
  $(function () {
    $('#caballos-table').DataTable({
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
</script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form method="POST" action="{{route('admin.anuncios.store')}}">
    {{csrf_field()}}
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nuevo anuncio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body mb-2">
          <div class="pl-4 mb-2">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="tipo" value="Venta" class="custom-control-input" checked>
                <label class="custom-control-label" for="customRadioInline1">Venta</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="tipo" value="Cesion" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Cesion</label>
            </div>
            </div>
          
          
          <div class="form-group input-group-sm">
                <label>Caballo</label>
                <select name = "caballo_id" class="form-control">
                    <!-- <option value="" style="display:none;"></option> -->
                        @foreach($caballos as $caballo)
                            <option value="{{$caballo->id}}" 
                                >{{$caballo->name}}
                            </option>
                        @endforeach
                </select>
            </div> 
        </div>
        
     

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
        <button class="btn btn-primary" >Crear anuncio</button>
      </div>
    </div>
    <input type="text", name="estado" value="PRIVADO" hidden>
  </div>
</form>
</div>
@endpush
