@extends('master')

@section('header')
	@if(isset(@company))
		{{link_to('/', 'Back to the overview')}}
	@endif
	<h2>
		All @if(isset($company)) {{$company->name}} @endif Jobs
		<a href="{{url('jobs/create')}}" class="btn btn-primary pull-right">
			Add a new job
		</a>
	</h2>
@stop

@section('content')
	@foreach($jobs as $job)
		<div class="job">
			<a href="{{url('jobs/'.$job->id)}}">
				<strong> {{{$job->name}}} </strong> - {{{$job->company->name}}}
			</a>
		</div>
	@endforeach
@stop
