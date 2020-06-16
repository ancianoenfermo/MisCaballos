@extends('admin.layout')
@section('header')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Mis caballos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
                <a href="{{route('home')}}">
                    <i class="right fas fa-home"> </i>    
                </a>
            </li>
            <li class="breadcrumb-item active">Mis caballos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

@endsection
@section('content')
<div class="card-primary">
    <div class="card-header">
      <h3 class="card-title">Todos los caballos de {{auth()->user()->name}} </h3>
      <button class ="btn btn-primary float-right"  data-toggle="modal" data-target="#exampleModal"><i class ="fa fa-plus"></i> Nuevo caballo</button>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="caballos-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width:25%" >Nombre</th>
          <th style="width: 70%">Texto destacado</th>
          <th style="width: 5%">Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($caballos as $caballo)
                <tr>
                    <td> {{$caballo->name}}</td>
                    <td> {{$caballo->textoDestacado}}</td>
                    <td>
                        <a href="{{route('admin.caballos.update',$caballo)}}"class ="btn btn-xs btn-info">
                          <i class="fa fa-pencil-alt" ></i></a>
                          <form method="POST" action="{{route('admin.caballos.destroy',$caballo)}}" style="display: inline">
                            {{csrf_field()}} {{method_field('DELETE')}}
                            <button class ="btn btn-xs btn-danger "><i class="fa fa-times" ></i></button>
                          </form>
                    </td>
                </tr>  
            @endforeach

        </tbody>
        
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
          <input name='name' class="form-control" value = "{{old('name')}}" placeholder='Introduce el nombre del caballo'>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary" >Crear caballo</button>
      </div>
    </div>
  </div>
</form>
</div>
@endpush
