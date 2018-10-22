@extends('admin.layouts.panel')
@section('title','Extra Page Detail')
@section('content')
<div class="min-height-200px">
    <!-- Contextual classes Start -->
    <div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
        <div class="clearfix mb-20">
            <div class="pull-left">
                <h4 class="text-blue">Reference</h4>
            </div>  
            <div class="pull-right">
                <a href="{!! route('user.references.index', Auth::user()->id) !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                        <tr>
                            <th scope="col">Organisation Name</th><td>{!! $experience->organisation_name !!}</td></tr>
                            <tr><th scope="col">Designation</th><td>{!! $experience->designation !!}</td></tr>
                            <tr><th scope="col">Duration in years</th><td>{!! $experience->duration_in_years !!}</td></tr>
                            <tr><th scope="col">CTC</th><td>{!! $experience->ctc !!}</td>
                            <tr><th scope="col">Reason for leaving</th><td>{!! $experience->reason_for_leaving !!}</td></tr>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Contextual classes End -->
</div>
@endsection