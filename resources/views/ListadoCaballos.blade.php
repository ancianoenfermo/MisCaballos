@extends('layouts.app')

@section('content')


<div class="container border">
   
            <div class="page-header">
                <form method="GET" action="{{route('listadoCaballos')}}">
                   <div class="row">
                       <!--  Ubicación -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Ubicación</label><br>
                                <select name = "comunidad_s" class="custom-select custom-select-sm" data-width="auto">
                                    <option value="">Todas</option>
                                
                                        @foreach($comunidades as $comunidad) 
                                            <option value="{{ $comunidad->id }}"                          
                                            {{$comunidad_s == $comunidad->id ? 'selected' : ''}}
                                                >{{$comunidad->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>  
                        <!-- Sexo -->
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>Sexo</label><br>
                                <select name = "sexo_s" class="form-control-sm" style="width:auto;">
                                    <option value="">Todos</option>
                                
                                        @foreach($sexos as $sexo) 
                                            <option value="{{ $sexo->id }}"                          
                                            {{$sexo_s == $sexo->id ? 'selected' : ''}}
                                                >{{$sexo->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                       <!--  Raza -->
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>Raza</label><br>
                                <select name = "raza_s" class="form-control-sm">
                                    <option value="">Todas</option>
                                        @foreach($razas as $raza) 
                                            <option value="{{ $raza->id }}"                          
                                            {{$raza_s == $raza->id ? 'selected' : ''}}
                                                >{{$raza->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>

                        <!--  Capa -->
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>Capa</label><br>
                                <select name = "capa_s" class="form-control-sm">
                                    <option value="">Todas</option>
                                        @foreach($capas as $capa) 
                                            <option value="{{ $capa->id }}"                          
                                            {{$capa_s == $capa->id ? 'selected' : ''}}
                                                >{{$capa->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                   </div>
                   <div class="row">

                         <!--  Concurso -->
                         <div class="col-md-2"> 
                            <div class="form-group">
                                <label>Concurso</label><br>
                                <select name = "concurso_s" class="form-control-sm">
                                    <option value="">Todas</option>
                                        @foreach($concursos as $concurso) 
                                            <option value="{{ $concurso->id }}"                          
                                            {{$concurso_s == $concurso->id ? 'selected' : ''}}
                                                >{{$concurso->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <!--  Caracter -->
                        <div class="col-md-2"> 
                            <div class="form-group">
                                <label>Caracter</label><br>
                                <select name = "caracter_s" class="form-control-sm">
                                    <option value="">Todas</option>
                                        @foreach($caracters as $caracter) 
                                            <option value="{{ $caracter->id }}"                          
                                            {{$caracter_s == $caracter->id ? 'selected' : ''}}
                                                >{{$caracter->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                         <!--  Disciplina -->
                         <div class="col-md-2"> 
                            <div class="form-group">
                                <label>Disciplina</label><br>
                                <select name = "disciplina_s" class="form-control-sm">
                                    <option value="">Todas</option>
                                        @foreach($disciplinas as $disciplina) 
                                            <option value="{{ $disciplina->id }}"                          
                                            {{$disciplina_s == $disciplina->id ? 'selected' : ''}}
                                                >{{$disciplina->name}} 
                                            </option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                   
                   
                    </div>




                    <div class="form-group">
                        <button type="submit" class="btn">hola</button>
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </form>
            </div>
        
   
</div>




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
                        <span class="font-weight-bold {{ isset($raza_s) ? 'text-danger' : '' }}">{{$caballo->raza->name}}</span>
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
                <a href="{{route('caballoShow',$caballo)}}">
                    <button type="button"  class="btn btn-primary btn-lg float-right mr-3 mb-3">Ver</button>
                </a>
                
                
                
                
                
            </div>
        </div>
        <br>
        
    </div>
    @endForeach
        <br>
        <span class="pagination  justify-content-center">{{$caballos->links()}}</span>
</div>








@endsection

