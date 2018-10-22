@extends('admin.layouts.panel')
@section('title','Add Question')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Add Question</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('questions.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        {!! Former::horizontal_open()->action( URL::route("questions.store") )->method('post')->class('p-t-15  ')->role('form')->id('form') !!}
        <div class="form-group">
            <label>Select Department</label>
            <select class="form-control selectpicker" name="department_id">
                @foreach(App\Department::all() as $department)
                <option value="{!! $department->id !!}">{!! $department->name !!}</option>
                @endforeach
            </select>
            <br><br>
            <a class="btn btn-info btn-sm" href="{!! route('departments.create') !!}">Add New Department</a>
            @if($errors->has('department_id'))<p class="help-block">{!! $errors->first('department_id') !!}</p>@endif
        </div>
        <div class="form-group">
            <label>Question</label>
            <textarea name="question" placeholder="Question" id="question" class="form-control"></textarea>
            @if($errors->has('question'))<p class="help-block">{!! $errors->first('question') !!}</p>@endif
        </div>  
        <div class="form-group">
            <label>Option A</label>
            <textarea name="a" placeholder="Option A" class="form-control"></textarea>
            @if($errors->has('a'))<p class="help-block">{!! $errors->first('a') !!}</p>@endif
        </div>
        <div class="form-group">
            <label>Option B</label>
            <textarea name="b" placeholder="Option B" class="form-control"></textarea>
            @if($errors->has('b'))<p class="help-block">{!! $errors->first('b') !!}</p>@endif
        </div>
        <div class="form-group">
            <label>Option C</label>
            <textarea name="c" placeholder="Option C" class="form-control"></textarea>
            @if($errors->has('c'))<p class="help-block">{!! $errors->first('c') !!}</p>@endif
        </div>
        <div class="form-group">
            <label>Option D</label>
            <textarea name="d" placeholder="Option D" class="form-control"></textarea>
            @if($errors->has('d'))<p class="help-block">{!! $errors->first('d') !!}</p>@endif
        </div>
        <div class="form-group">
            <label>Answer</label>
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="option_a" name="answer" value="a" class="custom-control-input" checked="">
                <label class="custom-control-label" for="option_a">Option A</label>
            </div>
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="option_b" name="answer" value="b" class="custom-control-input">
                <label class="custom-control-label" for="option_b">Option B</label>
            </div>
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="option_c" name="answer" value="c" class="custom-control-input">
                <label class="custom-control-label" for="option_c">Option C</label>
            </div>
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="option_d" name="answer" value="d" class="custom-control-input">
                <label class="custom-control-label" for="option_d">Option D</label>
            </div>
        </div>
        <div class="form-group">
            <label>More Info</label>
            <textarea name="more_info" placeholder="Info" class="form-control"></textarea>
            @if($errors->has('more_info'))<p class="help-block">{!! $errors->first('more_info') !!}</p>@endif
        </div>
        {!!Former::submit('Save')->class('btn btn-sm btn-primary btn-cons m-t-10')!!}
        {!! Former::close() !!}
    </div>
</div>
@endsection
