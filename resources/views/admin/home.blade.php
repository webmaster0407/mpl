{{-- Extends layout --}}
@extends('layout.admin')

{{-- Content --}}
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h2>Total {{ $total_users }} Users </h2>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-6 col-md-6" >
						<h2>Clients </h2>
						<h3><span>Allowed :  </span>{{ $total_clients_allowed }}</h3>
						<h3><span>Not Allowed : </span>{{ $total_talents - $total_clients_allowed }}</h3>
					</div>
					<div class="col-lg-6 col-md-6" >
						<h2>Talents </h2>
						<h3><span>Allowed :  </span>{{ $total_talents_allowed }}</h3>
						<h3><span>Not Allowed : </span>{{ $total_talents - $total_talents_allowed }}</h3>
					</div>
					<hr />
					@if(isset($category_avg) && (count($category_avg) > 0) )
						<div class="col-lg-6 col-md-6">
						@foreach($category_avg as $category)
							<h3><span>{{ $category->category }} </span> {{ $category->cnt }}</h3>
						@endforeach 
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection