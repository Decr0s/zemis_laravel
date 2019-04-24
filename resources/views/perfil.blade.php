@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><i class="fas fa-user-cog"></i> Perfil</div>

            <div class="card-body">
            @if (session('status'))
	                        <div class="alert alert-success" role="alert">
	                            {{ session('status') }}
	                        </div>
	                    @endif

	                    @if(count($errors) > 0)
	                        <div class="alert alert-danger">
	                            <ul>
	                                @foreach($errors->all() as $error)
	                                    <li>{{$error}}</li>
	                                @endforeach
	                            </ul>
	                        </div>
	                    @endif
	                    @if($message= Session::get('success'))
	                        <div class="alert alert-success">
	                           <p>{{$message}}</p>
	                        </div>
	                    @endif

                <div class="row justify-content-end" style="margin-bottom:15px;">
                            <div class="col-md-3">
                                <a class="btn btn-secondary" href="{{url('home')}}">Voltar</a>
                            </div>
                </div>
               
                <form method="post" action="{{action('PerfilController@update', $id)}}">
                    {{csrf_field()}}
                    
                        <input type="hidden" name="_method" value="PATCH">

                        <div class="row justify-content-center" style="margin-bottom:15px;">
                            <label class="col-md-2">Usuário: </label>
                            <input class="form-control col-md-5" type="text" name="name" value="{{$usuario->name}}"> 
                        </div>
                        <div class="row justify-content-center" style="margin-bottom:15px;">
                            <label class="col-md-2">E-mail: </label>
                            <input class="form-control col-md-5" type="text" name="email" value="{{$usuario->email}}" disabled> 
                        </div>
                        
                        <div class="row justify-content-center" style="margin-bottom:15px;">
                           
                            <button type="submit" class="btn btn-primary">Alterar Dados</button>
                            
                        </div>

                </form>
               

      

                </div>
            </div>
        </div>
    </div>
</div>
@endsection