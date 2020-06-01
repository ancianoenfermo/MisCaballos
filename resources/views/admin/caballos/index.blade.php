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
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Todos los caballos de {{auth()->user()->name}} </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="caballos-table" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nombre</th>
          <th>Texto destacado</th>
          <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($caballos as $caballo)
                <tr>
                    <td class="w-25"> {{$caballo->name}}</td>
                    <td class="w-50"> {{$caballo->textoDestacado}}</td>
                    <td>
                        <a href="#"class ="btn btn-xs btn-info"><i class="fa fa-pencil-alt" ></i></a>
                        <a href="#"class ="btn btn-xs btn-danger"><i class="fa fa-times" ></i></a>
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
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

@endpush
