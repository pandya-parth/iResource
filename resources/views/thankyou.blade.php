@extends('admin.layouts.panel')
@section('title','Thank you')
@section('content')
<div class="customscroll customscroll-10-p border-radius-10">
	<div class="error-page login-wrap bg-white  customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
		<div>
			<div class="error-page-wrap text-center">
				<div class="thankyou-img">
					<img src="{!! asset('/images/thank-you-image.png') !!}" alt="">
				</div>
				<a href="{!! route('admin-dashboard') !!}" class="btn btn-primary">BACK TO DASHBOARD</a>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
        window.history.pushState(null, "", window.location.href);        
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        };
    });
</script>
@endsection