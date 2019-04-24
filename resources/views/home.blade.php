@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
    


                <div class="row justify-content-center">

                    <div class="col-md-3">
                        <a href="{{url('itens')}}">
                            <i class="fas fa-images"></i>
                            <span>Fotos Armazenadas</span>
                        </a>
                        
                       
                     
                    </div>

                    <div class="col-md-2">

                       <a href="{{url('add')}}">
                            <i class="fas fa-plus"></i></i>
                            <span>Adicionar</span>
                       </a>
                        
                    </div>
                </div>    
            


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
