@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
         
            <div class="card">
            
                <div class="card-header">{{ __('Edit novelty') }}
                
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('novelty.update',$datos->id)}}">
                        @method('PUT')
                        @csrf
                        @if(session('mensaje'))

                          <div class="alert alert-success" role="alert">{{ session('mensaje') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <form action="" class="text-right" class="d-inline">
                          <a href="{{ url('index/modify') }}">Atrás</a>
                          
                          </form>
                          </div>
                        @endif

                        @if(session()->has('mensaje1'))
                          <div class="alert alert-danger" role="alert">{{ session('mensaje1') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <form action="" class="text-right" class="d-inline">
                          <a href="{{ url('index/modify') }}">Atrás</a>
                          
                          </form>
                          </div>
                        @endif
                        
                        <div class="form-group">
                        <label for="formGroupExampleInput">Novelty name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{($datos->name)}}">
                      </div>

                      <div class="form-group">

                        <label for="exampleFormControlTextarea1">Image information</label>
                         <!-- <textarea class="form-control" id="InformationImage" name="InformationImage" rows="3" value="{{($datos->InformationImage)}}"></textarea>-->
                          <input type="text" class="form-control" id="InformationImage" name="InformationImage" value="{{($datos->InformationImage)}}">
                      </div>
                      
                      <div class="form-row">
                      
                        <div class="col">
                        <label for="formGroupExampleInput">Image URL</label> 
                          <input type="file" class="form-control-file" id="URLimagen" name="URLimagen" value="{{$datos->URLimagen}}">
                        </div>
                        
                          
                      
                        
                        
                      </div>
                      <br>

                      <button class="btn btn-warning" type="submit">Edit</button>
                     
                    </form>

                    
                      
                       

                    
                
                

                 
                <div class="title m-b-md">
                    
                </div>

                <div class="links">
                    
                    
                </div>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection