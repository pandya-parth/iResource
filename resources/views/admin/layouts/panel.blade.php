<!DOCTYPE html>
<html>
<head>
	<meta name="_token" content="{{ csrf_token() }}">
	@include('admin.shared.head')
	@yield('styles')
</head>
<body>
		@include('admin.shared.header')
		@include('admin.shared.sidebar')
		<div class="main-container">
			<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
				@include('admin.shared.flash')
				@yield('content')
			</div>
		</div>
		<script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
	  	<script src="{!! asset('/js/script.js') !!}"></script>
	  	<script type="text/javascript" src="{!! asset('/js/plupload.full.min.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('/js/datatables.min.js') !!}"> </script>
		<script type="text/javascript" src="{!! asset('/js/delete.js') !!}"></script>	
		<script type="text/javascript" src="{!! asset('/js/highcharts.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('/js/exporting.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('/js/export-data.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('/js/dataTables.bootstrap4.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('/js/dataTables.responsive.js') !!}"></script>
		<script type="text/javascript" src="{!! asset('/js/responsive.bootstrap4.js') !!}"></script>
		@yield('scripts')
</body>
</html>