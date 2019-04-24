@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header"><i class="fas fa-images"></i> Minhas fotos</div>
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


					<div class="row justify-content-end">
						<div class="col-md-3">
							<a class="btn btn-secondary" href="{{url('home')}}">Voltar</a>
						</div>
					</div>	


					<div class="row" style="margin-top:15px;">

					   @foreach($fotos as $foto)	
					   		<figure class="figure col-md-4">
					   			 <img src="{{ URL::to('/') }}/images/{{ $foto->foto }}" class="figure-img img-fluid rounded" alt="{{$foto->legenda}}">
					   			 <figcaption class="figure-caption">{{$foto->legenda}}</figcaption>

					   			 <div class="row">
					   			 	<div class="col-md-3"><a href="{{action('HomeController@edit', $foto['id'])}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></div>
					   			 	<div class="col-md-3">

					   			 		<form method="post" class="delete_form" action="{{action('HomeController@destroy', $foto['id'])}}">
					   			 			{{csrf_field()}}
					   			 			<input type="hidden" name="_method" value="DELETE">
					   			 			<button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
					   			 		</form>
					   			 		

					   			 	</div>
					   			 </div>
					   		</figure>	
                    	@endforeach

                    </div>
                  
                     {!! $fotos->links() !!}
                 
			</div>
		</div>
	</div>		
</div>		

<script type="text/javascript">
	$(document).ready(function(){
		$('.delete_form').on('submit', function(){
			if(confirm('Tem certeza que deseja deletar?')){
				return true;
			}else{
				return false;
			}
		});
	})


</script>
@endsection				