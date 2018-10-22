<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="UTF-8">
	<meta name="_token" content="{{ csrf_token() }}">

	<!-- Theme Color -->
	<meta name="theme-color" content="#FFF">

	<!-- Title -->
	<title>iResource Management</title>

	<!-- Site favicon -->
	<link rel="shortcut icon" href="images/favicon.ico">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

	<!-- Icon Font -->
	<link rel="stylesheet" type="text/css" href="fonts/awesome/css/font-awesome.css">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/front/bootstrap.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/front/slick.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/front/fancybox.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/front/style.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/front/media.css') !!}">
</head>
<body>
  @yield('content')
  	<!-- JS File -->
	<script src="{!! asset('js/front/jquery-3.3.1.min.js') !!}"></script>
	<script src="{!! asset('js/front/popper.min.js') !!}"></script>
	<script src="{!! asset('js/front/bootstrap.js') !!}"></script>
	<script src="{!! asset('js/front/slick.js') !!}"></script>
	<script src="{!! asset('js/front/fancybox.js') !!}"></script>
	<!-- Custom JS File -->
	<script src="{!! asset('js/front/setting.js') !!}"></script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#subscription_form").on('submit',function(e){
		var _this = this;
		jQuery('.subscribe-loader').show();
		    e.preventDefault(); 
		$.post(jQuery(this).attr('action'),jQuery(this).serialize(),function(response){   
		})
		 .done(function(response) {
		 	console.log(response);
		    jQuery('.alert-success').html(response).show();
		    $("#subscription_form")[0].reset();
		    jQuery('.subscribe-loader').hide();
		  })
		  .fail(function(response) {
		   	jQuery('.alert-danger').html(response.responseJSON).show();
		   	jQuery('.subscribe-loader').hide();
		  });      
				setTimeout(function(){ jQuery(".alert-danger").fadeOut() }, 10000);
				setTimeout(function(){ jQuery(".alert-success").fadeOut() }, 10000);
			          
		
		return false;
		});

		$( "#header-menu a[href^='#']").on( 'click', function ( e ) {
			var headerheight1 = $(".header-wrap").outerHeight();
			$('body').attr('data-offset', headerheight1);
			// prevent default anchor click behavior
			e.preventDefault();
			// store hash
			var hash = this.hash;

			// animate
			$( 'html, body' ).animate( {
				scrollTop: $( hash ).offset().top - (headerheight1 / 2)
			}, 1000, function () {
			});
		});
		jQuery("[data-confirm]").bind("click",function(e){        
			e.preventDefault();    
			var message = jQuery(this).data('confirm')? jQuery(this).data('confirm') : 'Are you 	sure?';    
			if(confirm(message))    
			{        
				var form = jQuery('<form />').attr('method','post').attr('action',jQuery(this).attr('href'));      
				message != "Are you sure want to logout?" ? jQuery('<input />').attr('type','hidden').attr('name','_method').attr('value','delete').appendTo(form) : "";      
				jQuery('<input />').attr('type','hidden').attr('name','_token').attr('value',jQuery('meta[name="_token"]').attr('content')).appendTo(form);      
				jQuery('body').append(form);      
				form.submit();    
			}  
		});

		jQuery("#contact_form").on('submit',function(e){
		var _this = this;
		jQuery('.subscribe-loader').show();
		    e.preventDefault(); 
		$.post(jQuery(this).attr('action'),jQuery(this).serialize(),function(response){   
		})
		 .done(function(response) {
		 	console.log(response);
		    jQuery('.alert-success').html(response).show();
		    $("#contact_form")[0].reset();
		    jQuery('.subscribe-loader').hide();
		  })
		  .fail(function(response) {
		   	jQuery('.alert-danger').html(response.responseJSON).show();
		   	jQuery('.subscribe-loader').hide();
		  });      
				setTimeout(function(){ jQuery(".alert-danger").fadeOut() }, 10000);
				setTimeout(function(){ jQuery(".alert-success").fadeOut() }, 10000);
			          
		
		return false;
		});

	});
	</script>
</body>
</html>