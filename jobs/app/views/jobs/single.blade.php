@extends('master')

@section('header')
	<a href="{{url('/')}}"> Back to overview</a>
	<h2>
		{{{$job->title}}}
	</h2>
	<a href="{{url('jobs/'.$job->id.'/edit')}}">
		<span class="glyphicon glyphicon-edit"></span> Edit 
	</a>
	<a href="{{url('jobs/'.$job->id.'/delete')}}">
		<span class="glyphicon glyphicon-trash"></span> Delete 
	</a>
	Last edited: {{$job->updated_at}}
@stop

@section('content')
	<p>Date of Register: {{$job->date_of_register}}</p>
	<p>
		@if($job->company)
			Company:
			{{link_to('jobs/companys/' . $job->company->name, $job->company->name)}}
		@endif
	</p>
@stop

