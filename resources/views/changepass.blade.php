@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><i class="fas fa-user-cog"></i> Nova Senha</div>

            <div class="card-body">
                     

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
                @if($message= Session::get('error'))
                    <div class="alert alert-danger">
                    <p>{{$message}}</p>
                    </div>
                @endif
                <div class="row justify-content-end" style="margin-bottom:15px;">
						<div class="col-md-3">
							<a class="btn btn-secondary" href="{{url('home')}}">Voltar</a>
						</div>
					</div>	
                        
                        
                <form method="post" action="{{url('changepassword')}}">
                                    {{csrf_field()}}
                                    
                                  
                                        <div class="row justify-content-center" style="margin-bottom:15px;">
                                            <label class="col-md-2">Senha atual: </label>
                                            <input class="form-control col-md-5" type="password" name="current-password"> 
                                        </div> 
                                        <div class="row justify-content-center" style="margin-bottom:15px;">
                                            <label class="col-md-2">Nova senha: </label>
                                            <input class="form-control col-md-5" type="password" name="new-password"> 
                                        </div> 

                                        <div class="row justify-content-center" style="margin-bottom:15px;">
                                            <label class="col-md-2">Confirmar Senha: </label>
                                            <input class="form-control col-md-5" type="password" name="new-password_confirmation"> 
                                        </div> 
                                        
                                        <div class="row justify-content-center" style="margin-bottom:15px;">
                                        
                                            <button type="submit" class="btn btn-primary">Alterar senha</button>
                                            
                                        </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection