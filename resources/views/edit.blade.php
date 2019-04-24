@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header"><i class="fas fa-edit"></i></i> Edit</div>
				<div class="card-body">
				<div class="row justify-content-end">
						<div class="col-md-3">
							<a class="btn btn-secondary" href="{{url('itens')}}">Voltar</a>
						</div>
					</div>	

					<form method="post" action="{{action('HomeController@update', $id)}}">
						{{csrf_field()}}
						<input type="hidden" name="_method" value="PATCH">

						<div class="row form-group justify-content-center">
							<figure class="figure col-md-4">
								 <img src="{{ URL::to('/') }}/images/{{ $foto->foto }}" class="figure-img img-fluid rounded" alt="{{$foto->legenda}}">
							</figure>
						</div>	
						<div class="row form-group justify-content-center">
							<input class="form-control col-md-5" type="text" name="legend" value="{{$foto->legenda}}">
						</div>
						<div class="row form-group justify-content-center">
							<button class="btn btn-primary" type="submit">Update</button>
						</div>
			
					</form>
				</div>
			</div>
		</div>

			


	</div>
</div>

@endsection