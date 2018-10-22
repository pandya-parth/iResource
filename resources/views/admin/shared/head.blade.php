	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>{!! config()->get('settings.title') !!} | @yield('title')</title>

	<!-- Site favicon -->
	<link rel="shortcut icon" href="{!! asset('/images/favicon.ico') !!}">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" href="{!! asset('/css/jquery.dataTables.css') !!}">
	<link rel="stylesheet" href="{!! asset('/css/dataTables.bootstrap4.css') !!}">
	<link rel="stylesheet" href="{!! asset('/css/responsive.dataTables.css') !!}">
	<link rel="stylesheet" href="{!! asset('/css/admin.css') !!}">
	<link rel="stylesheet" href="{!! asset('/css/style.css') !!}">
	<link rel="stylesheet" href="{!! asset('/css/media.css') !!}">
	
	<style type="text/css">
		.help-block{
			color: #9e331e;
		}
	</style>