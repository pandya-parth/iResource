@extends('admin.layouts.panel')
@section('title','Edit User')
@section('content')
<div class="min-height-200px">
	<!-- Default Basic Forms Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix">
			<div class="pull-left">
				<h4 class="text-blue">Personal Detail</h4>
				<p class="mb-30 font-14"></p>
			</div>
			<div class="pull-right">
				<a href="{!! route('users.index') !!}" class="btn btn-sm btn-primary btn-sm" rel="content-y"  role="button"><i class="fa fa-arrow-left"></i> Back</a>
			</div>
		</div>
		{!! Former::horizontal_open()->action( URL::route("users.update",$user->id) )->method('PATCH')->class('p-t-15  ')->role('form')->id('form')->files('true') !!}
		{{ csrf_field() }}
		<div class="form-group">
			<label>Name<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->name !!}" name="name" placeholder="John Doe">
			@if($errors->has('name'))<p class="help-block">{!! $errors->first('name') !!}</p>@endif
		</div>
		@if(Auth::user()->role == 'admin' || Auth::user()->role == 'hr')
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" value="{!! $user->email !!}" name="email" placeholder="abc@gmail.com">
			@if($errors->has('email'))<p class="help-block">{!! $errors->first('email') !!}</p>@endif
		</div>            
		<div class="form-group">
			<label>Admin Review</label>
			<textarea name="admin_review" placeholder="Admin Review" id="admin_review" >{!! $user->admin_review !!}</textarea>
			@if($errors->has('admin_review'))<p class="help-block">{!! $errors->first('admin_review') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Admin Percentage</label>
			<input class="form-control" type="number" value="{!! $user->admin_per !!}" name="admin_per" placeholder="Admin Percentage">
			@if($errors->has('admin_per'))<p class="help-block">{!! $errors->first('admin_per') !!}</p>@endif
		</div>  
		<div class="form-group">
			<label>Team Lead Review</label>
			<textarea name="team_lead_review" placeholder="Residential Address" id="team_lead_review">{!! $user->team_lead_review !!}</textarea>
			@if($errors->has('team_lead_review'))<p class="help-block">{!! $errors->first('team_lead_review') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Team Lead Percentage</label>
			<input class="form-control" type="number" value="{!! $user->team_lead_per !!}" name="team_lead_per" placeholder="Admin Percentage">
			@if($errors->has('team_lead_per'))<p class="help-block">{!! $errors->first('team_lead_per') !!}</p>@endif
		</div>  
		<div class="form-group">
			<div class="col-md-6 col-sm-12">
				<div class="custom-control custom-checkbox mb-5">
					<input class="form-control" type="hidden" name="active" value="0">
					<input type="checkbox" class="custom-control-input" id="active" name="active" value="1" {!! $user->active == true ? "checked" : "" !!}>
					<label class="custom-control-label" for="active">Click here to select this interviewer</label>
				</div>
			</div>
		</div>
		@else
		<div class="form-group">
			<label>Lastname<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->last_name !!}" name="last_name" placeholder="Last Name">
			@if($errors->has('last_name'))<p class="help-block">{!! $errors->first('last_name') !!}</p>@endif
		</div>
		<!-- <div class="form-group">
			<label>Phone</label>
			<input class="form-control" type="text" value="{!! $user->phone !!}" name="phone" placeholder="Phone">
			@if($errors->has('phone'))<p class="help-block">{!! $errors->first('phone') !!}</p>@endif
		</div> -->
		<div class="form-group">
			<label>Mobile<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->mobile !!}" name="mobile" placeholder=" Mobile">
			@if($errors->has('mobile'))<p class="help-block">{!! $errors->first('mobile') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Gender<span style="color: red;">*</span></label>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="male" name="gender" value="male" class="custom-control-input" {!! $user->gender == 'male' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="male">Male</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="female" name="gender" value="female" class="custom-control-input" {!! $user->gender == 'female' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="female">Female</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="other" name="gender" value="other" class="custom-control-input" {!! $user->gender == 'other' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="other">Other</label>
			</div>
		</div>          
		<div class="form-group">
			<label>Date of Birth<span style="color: red;">*</span></label>
			<input class="form-control dob" type="text" value="{!! $user->dob ? $user->dob : date('Y/m/d') !!}" name="dob" placeholder="Date of Birth">
			@if($errors->has('dob'))<p class="help-block">{!! $errors->first('dob') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Marital Status<span style="color: red;">*</span></label>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="married" name="marital_status" value="married" class="custom-control-input" {!! $user->marital_status == 'married' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="married">Married</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="unmarried" name="marital_status" value="unmarried" class="custom-control-input" {!! $user->marital_status == 'unmarried' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="unmarried">Unmarried</label>
			</div>
			<div class="custom-control custom-radio mb-5">
				<input type="radio" id="widow" name="marital_status" value="widow" class="custom-control-input" {!! $user->marital_status == 'widow' ? 'checked' : '' !!}>
				<label class="custom-control-label" for="widow">Widow / Widower</label>
			</div>
		</div>
		<div class="form-group">
			<label>Post Applied For<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->post_applied !!}" name="post_applied" placeholder="Post Applied For">
			@if($errors->has('post_applied'))<p class="help-block">{!! $errors->first('post_applied') !!}</p>@endif
		</div>
		<!-- <div class="form-group">
			<label>Reference</label>
			<input class="form-control" type="text" value="{!! $user->reference !!}" name="reference" placeholder="Reference">
			@if($errors->has('reference'))<p class="help-block">{!! $errors->first('reference') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Notice period</label>
			<input class="form-control" type="text" value="{!! $user->notice_period !!}" name="notice_period" placeholder="Notice period">
			@if($errors->has('notice_period'))<p class="help-block">{!! $errors->first('notice_period') !!}</p>@endif
		</div> -->
		<div class="form-group">
			<label>Nationality<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->nationality !!}" name="nationality" placeholder="Nationality">
			@if($errors->has('nationality'))<p class="help-block">{!! $errors->first('nationality') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Blood Group<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->blood_group !!}" name="blood_group" placeholder="Blood Group">
			@if($errors->has('blood_group'))<p class="help-block">{!! $errors->first('blood_group') !!}</p>@endif
		</div>
		<!-- <div class="form-group">
			<label>Expected CTC</label>
			<input class="form-control" type="number" value="{!! $user->expected_ctc !!}" name="expected_ctc" placeholder="Expected CTC">
			@if($errors->has('expected_ctc'))<p class="help-block">{!! $errors->first('expected_ctc') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Current CTC</label>
			<input class="form-control" type="number" value="{!! $user->current_ctc !!}" name="current_ctc" placeholder="Current CTC">
			@if($errors->has('current_ctc'))<p class="help-block">{!! $errors->first('current_ctc') !!}</p>@endif
		</div> -->
		<div class="form-group">
			<label>Residential Address<span style="color: red;">*</span></label>
			<textarea name="res_address" placeholder="Residential Address" id="res_address" class="form-control">{!! $user->res_address !!}</textarea>
			@if($errors->has('res_address'))<p class="help-block">{!! $errors->first('res_address') !!}</p>@endif
		</div>  
		<div class="form-group">
			<label>Permenant Address<span style="color: red;">*</span></label>
			<textarea name="per_address" placeholder="Permenant Address" id="per_address"class="form-control">{!! $user->per_address !!}</textarea>
			@if($errors->has('per_address'))<p class="help-block">{!! $errors->first('per_address') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>City<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->city !!}" name="city" placeholder="Surat">
			@if($errors->has('city'))<p class="help-block">{!! $errors->first('city') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>State<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->state !!}" name="state" placeholder="Gujarat">
			@if($errors->has('state'))<p class="help-block">{!! $errors->first('state') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Country<span style="color: red;">*</span></label>
			<input class="form-control" type="text" value="{!! $user->country !!}" name="country" placeholder="India">
			@if($errors->has('country'))<p class="help-block">{!! $errors->first('country') !!}</p>@endif
		</div>
		<div class="form-group">
			<label>Pincode<span style="color: red;">*</span></label>
			<input class="form-control" type="number" value="{!! $user->pincode !!}" name="pincode" placeholder="Pincode">
			@if($errors->has('pincode'))<p class="help-block">{!! $errors->first('pincode') !!}</p>@endif
		</div>
		<div class="row" style="margin-left: -27px;">
			<div class="col-lg-6 col-md-6 col-sm-6">
				<div class="clearfix" id="previewDiv" style="margin-left: 14px; margin-bottom: -29px; color: red;">

				</div>
				<div id="filelist"></div>
				<div id="progressbar"></div>
				<br />
				<div class="form-group">
					<div class="col-lg-6 clearfix">
					@if($user->file)
						<a href="{!! $user->file_url() !!}">View Your Resume</a>
					@endif
						<div id="container">
							<a id="pickfiles" href="javascript:;">Upload your resume</a>
						</div>  
					</div>  
				</div>
				{!! Former::hidden('file')->id('photo') !!} 
			</div>
		</div>
		@endif
		<div class="form-group">
			<button type="submit" class="btn btn-outline-primary">Save!</button>
		</div>
		{!! Former::close() !!}
	</div>
	<!-- Default Basic Forms End -->
</div>
@endsection

@section('scripts')
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="{!! asset('js/ckfinder.js') !!}"></script>
<script>
	$(document).ready(function() {

		var uploader = new plupload.Uploader({
			runtimes : 'html5,flash,silverlight,html4',

			browse_button : 'pickfiles',
			container: document.getElementById('container'),

			url : "{{ asset('plupload/upload.php') }}",

			multi_selection : false,

			    filters : {
				        max_file_size : '10mb'
			    },


			flash_swf_url : "{{ asset('plupload/Moxie.swf') }}",


			silverlight_xap_url : "{{asset('plupload/Moxie.xap')}}",

			init: {
				PostInit: function() {
					document.getElementById('filelist').innerHTML = '';
				},

				FilesAdded: function(up, files) {
					uploader.start();
					jQuery('.loader').fadeToggle('medium');
				},

				UploadComplete: function(up, files){
					var tmp_url = '{!! asset('/tmp/') !!}';
					plupload.each(files, function(file) {
						$('#photo').val(file.name);
						$('#preview').val(file.name);
						$('#previewDiv >img').remove();
						$('#previewDiv').append("<p>"+file.name+"</p>");
					});
					jQuery('.loader').fadeToggle('medium');
				},

				Error: function(up, err) {
					alert(err.message);
				}
			}
		});

		uploader.init();
	});
</script>
@if(Auth::user()->role == 'interviewer')
<script type="text/javascript">
	var todayDate = new Date().getDate();
    $('.dob').datepicker({
        language: 'en',
        autoClose: true,
        dateFormat: 'dd/mm/yyyy',
        maxDate: new Date(new Date().setDate(todayDate))
    });
   	$('.dob').data('datepicker').selectDate(new Date(jQuery(".dob").val()));
</script>
@else
<script type="text/javascript">
		
		var editor3 = CKEDITOR.replace( 'admin_review',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor3 );

        var editor4 = CKEDITOR.replace( 'team_lead_review',{
            allowedContent:true,
        });
        CKFinder.setupCKEditor( editor4 );

</script>
@endif
@endsection