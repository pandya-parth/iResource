@extends('admin.layouts.auth')
@section('title','Login')
@section('content')

<form class="form-horizontal" method="POST" action="{{ route('login') }}">
  {{ csrf_field() }}
  
  <div class="row clearfix">
    <div class="col-lg-6 col-md-12 col-sm-12">
      <!-- About iResource Management System Start -->
      <div class="about-iresource-wrap">
        <h1>iResource Management</h1>
        <p>Recruitment made easy with iResource</p>
        <div class="login-options padding-top-10">
          <h3>Select Your Role</h3>
          <div class="row">
            <div class="login-options-box">
              <!-- Candidate Btn Start -->
              <div class="custom-control custom-radio mb-5 candidate-btn active">
                <input type="radio" id="customRadio1" class="custom-control-input" value="interviewer" name="role" {!! old('role') == "interviewer" ? 'checked' : '' !!} {!! !old('role') ? 'checked' : '' !!}>
                <label class="custom-control-label" for="customRadio1"></label>
                <h3>Candidate</h3>
              </div>
              <!-- Candidate Btn End -->
            </div>
            <div class="login-options-box">
              <!-- Team Lead Btn Start -->
              <div class="custom-control custom-radio mb-5 team-lead-btn">
                <input type="radio" id="customRadio2" name="role" class="custom-control-input" value="employee" {!! old('role') == "employee" ? 'checked' : '' !!}>
                <label class="custom-control-label" for="customRadio2"></label>
                <h3>Team Lead</h3>
              </div>
              <!-- Team Lead Btn End -->
            </div>
            <div class="login-options-box">
              <!-- Admin Btn Start -->
              <div class="custom-control custom-radio mb-5 admin-btn">
                <input type="radio" id="customRadio3" class="custom-control-input" value="admin" name="role" {!! old('role') == "admin" ? 'checked' : '' !!}>
                <label class="custom-control-label" for="customRadio3"></label>
                <h3>Admin / Hr</h3>
              </div>
              <!-- Admin Btn End -->
            </div>
          </div>
        </div>
      </div>
      <!-- About iResource Management System End -->
    </div>
    <div class="col-lg-6 col-md-12 col-sm-12">
      <!--- Login Form Start -->
      <div class="login-form-wrap">
        <div class="login-form-logo">
          <img src="{!! asset('/images/iresource-form-logo.png') !!}" alt="">
        </div>
        <h3>Login</h3>
        @if(Session::has('errors'))
          <p style="color: red">These credentials do not match our records.</p>        
        @endif
        <p>iResource is a modern approach to Interview process and recruitment management</p>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Enter Email"" name="email" value="{{ old('email') }}" required autofocus>
        </div>
        <div class="form-group forgot-password">
          <input type="password" class="form-control" placeholder="**********" name="password" required>
          <a href="{!! route('password.request') !!}" class="forgot-password-link">Forgot?</a>
        </div>
        <div class="form-group submit-btn">
          <input type="submit" name="" class="submit" value="login">
        </div>
      </div>
      <!--- Login Form End -->
    </div>
  </div>
</form>

@endsection
@section('scripts')
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('input[type="radio"]').on('change',function(){
      jQuery(".custom-radio").removeClass('active');
      jQuery(this).parents('.custom-radio').addClass('active');
    })
  });
</script>
@endsection