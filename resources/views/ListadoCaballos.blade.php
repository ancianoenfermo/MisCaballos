@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($caballos as $caballo)
    
    <div class="card mt-3">
        <div class="row  mt-3 ml-1">
           <div class="col-md-12">
            <span class="font-weight-light">Publicado hace {{$caballo->fechaPublicacion->diffForHumans()}}</span> 
           </div>
        </div>
        <div class="row mt-3 ml-1">
            <div class="col-md-2 align-self-center">
                <img src="http://miscaballos.test/storage/imagenes/portadas/{{$caballo->fotoPortada}}"  class="img-thumbnail w-100"> 
            </div>
            <div class="col-md-9">
               <div class="row">
                   <div class="col-md-12">
                        <h3>{{$caballo->sexo->name}} de {{$caballo->fechaNacimiento->diffInYears($now)+1}} año en {{$caballo->comunidad->name}}</h3>
                   </div>
               </div>
              
               <div class="row">
                    <div class="col-md-2 bg-light text-right" >
                        <span class="text-muted" >NOMBRE:</span>
                    </div>
                    <div class="col-md-10">
                        <span class="font-weight-bold">{{$caballo->name}}</span>
                    </div>
                
                    <div class="col-md-2 bg-light text-right" >
                        <span class="text-muted" >RAZA:</span>
                    </div>
                    <div class="col-md-10">
                        <span class="font-weight-bold">{{$caballo->raza->name}}</span>
                    </div>

                    <div class="col-md-2 bg-light text-right" >
                        <span class="text-muted" >CAPA:</span>
                    </div>
                    <div class="col-md-10">
                        <span class="font-weight-bold">{{$caballo->capa->name}}</span>
                    </div>
                    
                    <div class="col-md-2 bg-light text-right">
                        <span class="text-muted text-right" >ALZADA:</span>
                    </div>
                    <div class="col-md-10">
                        <span  class="font-weight-bold">{{$caballo->alzada}} cm.</span>
                        <span> (Estimada {{$caballo->alzadaEstimada}} cm.)</span>
                    </div>
                    
                    <div class="col-md-2 bg-light text-right">
                        <span class="text-muted text-right" >DISCIPLINA:</span>
                    </div>
                    <div class="col-md-10">
                        @foreach ($caballo->disciplinas as $disciplina)
                            <span class="font-weight-bold" >{{$disciplina->name}},</span>
                        @endForeach
                    </div>

                    <div class="col-md-2 bg-light text-right">
                        <span class="text-muted text-right" >CONCURSOS:</span>
                    </div>
                    <div class="col-md-10">
                        <span  class="font-weight-bold">{{$caballo->concurso->name}}</span>
                    </div>
                    

                    <div class="col-md-2 bg-light text-right">
                        <span class="text-muted text-right" >CARÁCTER:</span>
                    </div>
                    <div class="col-md-10">
                        @foreach ($caballo->caracters as $caracter)
                            <span class="font-weight-bold" >{{$caracter->name}},</span>
                        @endForeach
                    </div>
                    


                </div>
               
            </div>
            <div class="col-md-1 align-self-center">
                <button type="button" class="btn btn-primary btn-lg float-right mr-3 mb-3">Ver</button>
            </div>
        </div>
        <br>
        
    </div>
    @endForeach
        <br>
<span class="pagination  justify-content-center">{{$caballos->links()}}</span>
</div>


<!-- <img src="http://miscaballos.test/storage/imagenes/portadas/{{$caballos[1]->fotoPortada}}"  class="img-thumbnail"> -->





@endsection

