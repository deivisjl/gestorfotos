@extends('app')

@section('content')
@if (Session::has('csrf'))
	<div class="alert alert-danger">
		<strong>Whoops!</strong> Al parecer algo esta mal.<br><br>
		{{Session::get('csrf')}}
	</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Inicio</div>

				<div class="panel-body">
					Por favor inicie sesión
				</div>
			</div>
		</div>
	</div>
</div>
@endsection