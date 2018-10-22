@extends('admin.layouts.panel')
@section('title','Site Settings')
@section('content')
<div class="min-height-200px">
    <!-- Default Basic Forms Start -->
    <div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
        <div class="clearfix">
            <div class="pull-left">
                <h4 class="text-blue">Site Settings</h4>
                <p class="mb-30 font-14"></p>
            </div>
            <div class="pull-right">
                <a href="{!! route('admin-dashboard') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
            {!!Former::framework('Nude') !!}
            {!!Former::open()->method('post')->action( route('site-settings'))->class('form-horizontal')->role('form')->files('true')->token() !!}
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Home Title</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('title')->placeholder('Home Title')->id(false)->label(false)->class('form-control required')->value($site_setting->title) !!}
                  <span class="help-block">{!! $errors->first('title') !!}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Email</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('email')->placeholder('Email')->id(false)->label(false)->class('form-control required')->value($site_setting->email) !!}
                  <span class="help-block">{!! $errors->first('email') !!}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">First Phone Number</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('phone_1')->placeholder('First Phone Number')->id(false)->label(false)->class('form-control required')->value($site_setting->phone_1) !!}
                  <span class="help-block">{!! $errors->first('phone_1') !!}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Second Phone Number</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('phone_2')->placeholder('Second Phone Number')->id(false)->label(false)->class('form-control required')->value($site_setting->phone_2) !!}
                  <span class="help-block">{!! $errors->first('phone_2') !!}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Copy Right Text</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('copy_right')->placeholder('Copy Right Text')->id(false)->label(false)->class('form-control required')->value($site_setting->copy_right) !!}
                  <span class="help-block">{!! $errors->first('copy_right') !!}</span>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Question Limit</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('question_limit')->placeholder('Question Limit')->id(false)->label(false)->class('form-control required')->value($site_setting->question_limit) !!}
                  <span class="help-block">{!! $errors->first('question_limit') !!}</span>
                </div>
              </div>   
              <div class="form-group row">
                <label class="col-sm-12 col-md-2 col-form-label">Timer Limit(sec)</label>
                <div class="col-sm-12 col-md-10">
                  {!!  Former::text('time_limit')->placeholder('Timer Limit')->id(false)->label(false)->class('form-control required')->value($site_setting->time_limit) !!}
                  <span class="help-block">{!! $errors->first('time_limit') !!}</span>
                </div>
              </div>        
              <div class="form-group row">
                <div class="col-sm-12 col-md-10">
                    <button type="submit" class="btn btn-outline-primary">Save!</button>
                </div>
            </div>  
            {!!Former::close()!!}
          </div>
        </div>
@endsection
