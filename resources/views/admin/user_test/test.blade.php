@extends('admin.layouts.panel')
@section('title','Take Test')
@section('styles')
<link rel="stylesheet" type="text/css" href="{!! asset('/css/flipclock.min.css') !!}">
@endsection
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 test-wrap bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Questions For {!! Auth::user()->department->name !!}</h4>
			</div>
			<div class="pull-right">
				<div class="clock"></div>
			</div>
		</div>
		<div class="table-responsive test-wrap">
			@if(count($questions) > 0)
			<form id="interviewer-exam" action="{!! route( 'submit-test' ) !!}" role="form" method="post">
			{{ csrf_field() }}
				@foreach($questions as $key => $question)
				<h3 class="quesion-title">{!! $key + 1 !!} : {!! $question->question !!}</h3>
				<fieldset>
					<input type="hidden" name="questions[{!! $key !!}]" value="{!! $question->id !!}">
					<legend>{!! $key + 1 !!} . {!! $question->question !!}</legend>
					<div class="custom-control custom-radio custom-radio-a mb-5">
						<input type="radio" name="answer[{!! $key !!}]" class="required custom-control-input" value="a" id="answer-a-{!! $key !!}">
						<label class="custom-control-label" for="answer-a-{!! $key !!}">{{{ $question->a }}}</label>
					</div>
					<div class="custom-control custom-radio custom-radio-b mb-5">
						<input type="radio" name="answer[{!! $key !!}]" class="required custom-control-input" value="b" id="answer-b-{!! $key !!}">
						<label class="custom-control-label" for="answer-b-{!! $key !!}">{{{ $question->b }}}</label>
					</div>
					<div class="custom-control custom-radio custom-radio-c mb-5">
						<input type="radio" name="answer[{!! $key !!}]" class="required custom-control-input" value="c" id="answer-c-{!! $key !!}">
						<label class="custom-control-label" for="answer-c-{!! $key !!}">{{{ $question->c }}}</label>
					</div>
					<div class="custom-control custom-radio custom-radio-d mb-5">
						<input type="radio" name="answer[{!! $key !!}]" class="required custom-control-input" value="d" id="answer-d-{!! $key !!}">
						<label class="custom-control-label" for="answer-d-{!! $key !!}">{{{ $question->d }}}</label>
					</div>
				</fieldset>
				@endforeach
			</form>
			@else
			<p>No Questions Found.</p>
			@endif
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{!! asset('/js/js.cookie.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/jquery.validate.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/flipclock.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/jquery.steps.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('/js/quesions-custom.js') !!}"></script>
<script type="text/javascript">
		var time = "{!! config()->get('settings.time_limit') !!}";
</script>
@endsection