@extends('layouts.app')


@section('content')
<div class="row justify-content-center">
		<div class="col-md-8">
	<div class="card">
		<div class="card-header"><i class="fas fa-plus"></i> Add</div>
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
				<a class="btn btn-secondary" href="{{url('itens')}}">Voltar</a>
			</div>
		</div>	                    
	   <form method="post" action="{{url('create')}}" enctype="multipart/form-data">
	                        {{csrf_field()}}

	                           <div class="row form-group justify-content-center">
	                            <input class="form-control col-md-5" type="text" name="legend" placeholder="Digite uma legenda">
	                           </div>

	                           <div class="row form-group justify-content-center">
	                             <input class="form-control col-md-5" type="file" name="foto">
	                           </div>
	                            
	                           <div class="row form-group justify-content-center">
	                            <button class="btn btn-primary" type="submit">Adicionar</button>
	                           </div>
	                          


	   </form>
			</div>
		</div>
	</div>
</div>

@endsection