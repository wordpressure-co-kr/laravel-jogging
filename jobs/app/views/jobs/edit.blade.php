@extends('master')

@section('header')
<a href="{{('jobs/'.$job->id.'')}}">&larr; Cancel </a>
<h2>
	@if($method == 'post')
		Add a new job
	@elseif($method == 'delete')
		Delete {{$job->name}}?
	@else
		Edit {{$job->name}}
	@endif
</h2>
@stop

@section('content')
	{{Form::model($job, array('method' => $method, 'url' => 'jobs/'.$job->id))}}

@unless($method == 'delete')
	<div class="form-group">
		{{Form::label('Name')}}
		{{Form::text('name')}}
	</div>
	<div class="form-group">
		{{Form::label('Date of Register')}}
		{{Form::text('date_of_register')}}
	</div>
	<div class="form-group">
		{{Form::label('Company')}}
		{{Form::select('company_id', $company_options)}}
	</div>

	{{Form::submit("Save", array("class" => "btn btn-default"))}}
@else
	{{Form::submit("Delete", array("class"=> "btn btn-default"))}}
@endif
{{Form::close()}}
@stop
