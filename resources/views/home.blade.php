@extends('admin.layouts.front')
@section('title','Home')
@section('content')
<!-- header wrap -->
	<div class="header-wrap">
		<header>
			<div class="container clearfix">
				<div class="logo">
					<a href="{!! route('home') !!}">
						<img src="{!! asset('images/logo.png') !!}" alt="">
					</a>
				</div>
				<div class="header-right clearfix">
					<div class="menu">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-menu">
							<i class="fa fa-bars"></i>
						</button>
						<div class="read-more-btn">
							<a data-fancybox data-src="#contact-form" href="javascript:;" class="fill">DEMO</a>

							@if(Auth::check())
								<a href="{!! route('logout') !!}" data-confirm="Are you sure want to logout?">LOGOUT</a>
								<a href="{!! route('admin-dashboard') !!}" >Portal</a>
							@else
								<a href="{!! route('login') !!}">LOGIN</a>
							@endif
						</div>
						<div id="contact-form" class="contact-form" style="display: none;">
							<img src="{!! asset('images/logo.png') !!}" alt="" style="text-align: center;">
							{!! Former::open()->route('contact')->method('POST')->id("contact_form") !!}
								<div class="alert-danger" style="background: transparent;"></div>
                    			<div class="alert-success" style="background: transparent;"></div>
								<div class="form-group">
									<label for="exampleInputEmail1">Name</label>
									<input type="text" class="form-control" name="name" required >
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Email address</label>
									<input type="email" class="form-control" name="email" required >
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Phone</label>
									<input type="text" class="form-control" name="phone" required >
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Message</label>
									<textarea class="form-control" name="message" required ></textarea>
								</div>
								<div class="form-group submit-btn">
									<input type="submit" name="" class="submit">
									<div class="subscribe-loader"></div>
								</div>
							{!! Former::close() !!}
						</div>
						<div  class="header-menu clearfix">
							<ul id="header-menu" class="nav collapse">
								<li><a href="#features"class="nav-link active">Feature </a></li>
								<li><a href="#plans" class="nav-link">Pricing</a></li>
								<li class="mobile-link"><a data-fancybox data-src="#contact-form" href="javascript:;" class="nav-link">Demo</a></li>
								<li class="mobile-link">
									@if(Auth::check())
										<a href="{!! route('logout') !!}" data-confirm="Are you sure want to logout?" class="nav-link">Logout</a>
									@else
										<a href="{!! route('login') !!}" class="nav-link">Login</a>
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
	</div>
	<!-- header wrap -->

	<!-- banner content start -->
	<div class="banner-content d-flex align-items-center">
		<img src="images/banner-bg-img.png" alt="" class="bg_img">
		<div class="container">
			<h1>Enjoy Fast and Easy Recruitment</h1>
			<div class="banner-text">
				<p>Automate your Campus Interview and make recruiting process <br>seamless with iResource Management. </p>
			</div>
			<div class="read-more-btn">
				<a data-fancybox="html5-video" href="#myVideo">Watch Now</a>
				<video controls width="640" height="320" controls="" id="myVideo" style="display: none;" class="fancybox-video">
            <source src="{!! asset( '/images/output_free.mp4' ) !!}" type="video/mp4">
        </video>
				<a data-fancybox data-src="#contact-form" href="javascript:;" class="fill">Free Trial</a>
			</div>
		</div>
	</div>
	<!-- banner content end -->

	<!-- interview report start -->
	<div class="content-box content-bg" id="features">
		<div class="container">
			<div class="title">
				<h2>Engaging and Effective Interview Reports - FAST</h2>
			</div>
			<div class="d-flex row flex-row-reverse">
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="screen-slider">
						<div class="screen-slide">
							<img src="images/slider-image1.png" alt="">
						</div>
						<div class="screen-slide">
							<img src="images/slider-image1.png" alt="">
						</div>
						<div class="screen-slide">
							<img src="images/slider-image1.png" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-12">
					<div class="screen-content">
						<h3>Automate Recruitment process</h3>
						<div class="screen-text">
							<p>With iResource, your placement process will be easy, efficient and fast and you can seam line your entire recruitment process. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="content-box">
		<div class="container">
			<div class="title">
				<h2>Admin/HR</h2>
			</div>
			<div class="d-flex row flex-row-reverse">
				<div class="col-lg-7 col-md-7 col-sm-12">
					<div class="screen-content">
						<h3>Create interview packets</h3>
						<div class="screen-text">
							<ul>
								<li>Admin can check status and details of Candidate.</li>
								<li>Admin can add or remove requirements for specific Technology.</li>
								<li>Filter details by technology, time, candidate and generate reports.</li>
								<li>Easily manage candidate’s scorecards. </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12">
					<img src="images/hr-screen-image.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="content-box content-bg">
		<div class="container">
			<div class="title">
				<h2>Employee/Team-Lead</h2>
			</div>
			<div class="d-flex row">
				<div class="col-lg-7 col-md-7 col-sm-12">
					<div class="screen-content">
						<h3>Easily manage scorecards</h3>
						<div class="screen-text">
							<ul>
								<li>Team lead can check the details of candidate applied for his/her specific technology. </li>
								<li>Admin can add or remove requirements for specific Technology.</li>
								<li>Filter details by technology, time, candidate and generate reports.</li>
								<li>Easily manage candidate’s scorecards. </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12">
					<img src="images/team-lead-screen-image.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<div class="content-box">
		<div class="container">
			<div class="title">
				<h2>Candidate/Interviewer</h2>
			</div>
			<div class="row">
				<div class="col-lg-7 col-md-7 col-sm-12">
					<div class="screen-content">
						<h3>Winning candidate experience</h3>
						<div class="screen-text">
							<ul>
								<li>Candidate can create his/her profile. </li>
								<li> Candidates can add their all details.</li>
								<li> Candidate can appear for Test.</li>
								<li>Candidate can see his/her results from here only. </li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-12">
					<img src="images/hr-screen-image.png" alt="">
				</div>
			</div>
		</div>
	</div>
	<!-- interview report end -->

	<!-- plan start -->
<!-- 	<div class="content-box content-bg" id="plans">
		<div class="container">
			<div class="title">
				<h2>Plans</h2>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-12">
					<div class="plan-box">
						<div class="test-title">
							<h5>Free</h5>
						</div>
						<div class="test-number">
							<h4>10 Test</h4>
						</div>
						<div class="test-text">
							Free version till 10 candidates <br>
							for Interview.
						</div>
						<div class="price">
							<span>Free</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<div class="plan-box">
						<div class="test-title">
							<h5>Basic</h5>
						</div>
						<div class="test-number">
							<h4>0-100 Test</h4>
						</div>
						<div class="test-text">
							Free version till 10 candidates <br>
							for Interview.
						</div>
						<div class="price">
							<span>$19</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<div class="plan-box">
						<div class="test-title">
							<h5>Premium</h5>
						</div>
						<div class="test-number">
							<h4>100 – 250 Test</h4>
						</div>
						<div class="test-text">
							Free version till 10 candidates <br>
							for Interview.
						</div>
						<div class="price">
							<span>$29</span>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-12">
					<div class="plan-box">
						<div class="test-title">
							<h5>Advance </h5>
						</div>
						<div class="test-number">
							<h4>Unlimited </h4>
						</div>
						<div class="test-text">
							Free version till 10 candidates <br>
							for Interview.
						</div>
						<div class="price">
							<span>$119</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	<!-- plan end -->
	<!-- testimonial slider start -->
<!-- 	<div class="content-box">
		<div class="container">
			<div class="title">
				<h2>What our client say’s</h2>
			</div>
			<div class="testimonial-slider">
				<div class="testimonial-slide">
					<div class="testimonial-slide-text">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
					</div>
					<div class="testimonial-detail clearfix">
						<div class="testimonial-image">
							<img src="images/testimonial-image.png" alt="">
						</div>
						<div class="testimonial-name">
							<h4>Enrique M. Hurley</h4>
							<span>Co- founder</span>
						</div>
					</div>
				</div>

				<div class="testimonial-slide">
					<div class="testimonial-slide-text">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
					</div>
					<div class="testimonial-detail clearfix">
						<div class="testimonial-image">
							<img src="images/testimonial-image.png" alt="">
						</div>
						<div class="testimonial-name">
							<h4>Enrique M. Hurley</h4>
							<span>Co- founder</span>
						</div>
					</div>
				</div>

				<div class="testimonial-slide">
					<div class="testimonial-slide-text">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
					</div>
					<div class="testimonial-detail clearfix">
						<div class="testimonial-image">
							<img src="images/testimonial-image.png" alt="">
						</div>
						<div class="testimonial-name">
							<h4>Enrique M. Hurley</h4>
							<span>Co- founder</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
 -->	<!-- testimonial slider end -->

	<!-- newsletter start -->
	<div class="newsletter-section">
		<div class="container">
			<div class="newsletter-iamge">
				<img src="images/newsletter-icon.png" alt="">
			</div>
			<div class="newsletter-content">
				<h3>Sign Up for a free trial today!</h3>
				<span>and get the latest Updates</span>
			</div>
			<div class="subscribe-form clearfix">
				{!! Former::open()->route('subscribe')->method('POST')->id("subscription_form") !!}
					<div class="newsletter-field newsletter-field-email">
						<label><i class="fa fa-envelope-o"></i></label>
						<input class="newsletter-email" name="email" placeholder="Enter your email address" required email type="email">
					</div>
					<div class="newsletter-field newsletter-field-button">
						<input class="newsletter-submit" value="" type="submit">
						<div class="subscribe-loader"></div>
					</div>
					<div class="alert-danger" style="background: transparent;"></div>
                    <div class="alert-success" style="background: transparent;"></div>
				{!! Former::close() !!}
			</div>
		</div>
	</div>
	<!-- newsletter end -->
	<!-- footer start -->
	<div class="footer">
		<div class="container clearfix">
			<div class="copyright">
				© <?= date('Y'); ?> <a href="https://www.krishaweb.com/" target="_blank">KrishaWeb Technologies</a>. All Rights Reserved.
			</div>
			<div class="social-link">
				<ul class="clearfix">
					<li>
						<a href="https://www.facebook.com/IResource-management-192342238228108" target="_blank">
							<i class="fa fa-facebook"></i>
						</a>
					</li>
					<li>
						<a  href="https://twitter.com/iRrsource" target="_blank">
							<i class="fa fa-twitter"></i>
						</a>
					</li>
					<li>
						<a  href="https://www.instagram.com/iresource_/" target="_blank">
							<i class="fa fa-instagram"></i>
						</a>
					</li>
					<li>
						<a  href="https://in.pinterest.com/iresourcemanagement/" target="_blank">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<!-- footer end -->
@endsection
