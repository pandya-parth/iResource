@extends('admin.layouts.panel')
@section('title','Question Detail')
@section('content')
<div class="min-height-200px">
    <!-- Contextual classes Start -->
    <div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Question Detail</h4>
            </div>  
            <div class="pull-right">
                <a href="{!! route('questions.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr><th>Question</th><td>{!! $question->question !!}</td></tr>
                    <tr><th>Department</th><td>{!! title_case($question->department->name) !!}</td></tr>
                    <tr><th>Option A</th><td>{!! $question->a !!}</td></tr>                
                    <tr><th>Option B</th><td>{!! $question->b !!}</td></tr>
                    <tr><th>Option C</th><td>{!! $question->c !!}</td></tr>
                    <tr><th>Option D</th><td>{!! $question->d !!}</td></tr>
                    <tr><th>Answer</th><td>{!! $question->answer !!}</td></tr>  
                    <tr><th>More Info</th><td>{!! $question->more_info !!}</td></tr>                
                    <tr><th>Question Updated On</th><td>{!!$question->updated_at!!}</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contextual classes End -->
</div>
@endsection