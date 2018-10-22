@extends('admin.layouts.panel')
@section('title','Dashboard')
@section('content')
<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
				<h4>Dashboard</h4>
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
				</ol>
			</nav>
		</div>
	</div>
</div>
@if(Auth::user()->role == "admin")
<div class="row clearfix progress-box">
	<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			<div class="progress-box text-center">
			<a href="{!! route('users.index') !!}">
				<input type="text" class="knob dial1" value="{!! $users->count() !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#0099ff" readonly>
				<h5 class="text-blue padding-top-10 weight-500">Candidates</h5>
			</a>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			<div class="progress-box text-center">
			<a href="{!! route('departments.index') !!}">
				<input type="text" class="knob dial2" value="{!! $departments->count() !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>
				<h5 class="text-light-green padding-top-10 weight-500">Departments</h5>
			</a>
			</div>
		</div>
	</div>
</div>
<div id="department_month" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
@elseif(Auth::user()->role == "employee")
<div class="row clearfix progress-box">
	<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			<div class="progress-box text-center">
			<a href="{!! route('users.index') !!}">
				<input type="text" class="knob dial1" value="{!! $users->count() !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#0099ff" readonly>
				<h5 class="text-blue padding-top-10 weight-500">Candidates</h5>
			</a>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			<div class="progress-box text-center">
			<a href="{!! route('questions.index') !!}">
				<input type="text" class="knob dial2" value="{!! $questions->count() !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>
				<h5 class="text-light-green padding-top-10 weight-500">Questions</h5>
			</a>
			</div>
		</div>
	</div>
</div>
<!-- <div id="department_chart" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div> -->
<div id="department_month" style="min-width: 310px; height: 400px; margin: 0 auto"></div>	
</div>
@else
<div class="row clearfix progress-box">
	<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			<div class="progress-box text-center">
			<a href="{!! route('users.edit', Auth::user()->id) !!}">
				 <input type="text" class="knob dial1" value="{!! $profile !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#0099ff" readonly>
				<h5 class="text-blue padding-top-10 weight-500">Profile(%)</h5>
			</a>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
		@if(Auth::user()->last_name != null && App\Test::where('user_id', Auth::user()->id)->count() < 1)
		<a href="{!! route('start-test') !!}">
			<div class="progress-box text-center">
				 <input type="text" class="knob dial2" value="{!! config()->get('settings.question_limit') !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>
				<h5 class="text-light-green padding-top-10 weight-500">Start Test</h5>
			</div>
			</a>
			@else
			<div class="progress-box text-center">
				 <input type="text" class="knob dial2" value="{!! config()->get('settings.question_limit') !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#41ccba" readonly>
				<h5 class="text-light-green padding-top-10 weight-500">Start Test</h5>
			</div>
			@endif
		</div>
	</div>
	<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			@if(App\Test::where('user_id', Auth::user()->id)->count() > 0)
				<div class="progress-box text-center">
					 <input type="text" class="knob dial3" value="{!! $result !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>
					<h5 class="text-light-orange padding-top-10 weight-500">Result(%)</h5>
				</div>
			@else
			<div class="progress-box text-center">
				 <input type="text" class="knob dial3" value="{!! $result !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#f56767" readonly>
				<h5 class="text-light-orange padding-top-10 weight-500">Result(%)</h5>
			</div>
			@endif
		</div>
	</div>
<!-- 	<div class="col-lg-3 col-md-6 col-sm-12 mb-30">
		<div class="bg-white pd-30 box-shadow border-radius-5 height-100-p">
			<div class="progress-box text-center">
				 <input type="text" class="knob dial4" value="{!! $progress !!}" data-width="120" data-height="120" data-thickness="0.05" data-fgColor="#a683eb" readonly>
				<h5 class="text-light-purple padding-top-10 weight-500">Progress(%)</h5>
			</div>
		</div>
	</div> -->
</div>
</div>
</div>
</div>
@endif		
@endsection
@section('scripts')
<script src="{!! asset('/js/jquery.knob.js') !!}"></script>
@if(Auth::user()->role == "interviewer")
<script>
	$(".dial1").knob();
	$({animatedVal: 0}).animate({animatedVal: {!! $profile !!}}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
	$(".dial2").knob();
	$({animatedVal: 0}).animate({animatedVal: {!! config()->get('settings.question_limit') !!}}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
	$(".dial3").knob();
	$({animatedVal: 0}).animate({animatedVal: {!! $result !!}}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
	$(".dial4").knob();
	$({animatedVal: 0}).animate({animatedVal: {!! $progress !!}}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
// map
jQuery('#browservisit').vectorMap({
	map: 'world_mill_en',
	backgroundColor: '#fff',
	borderWidth: 1,
	zoomOnScroll : false,
	color: '#ddd',
	regionStyle: {
		initial: {
			fill: '#fff'
		}
	},
	enableZoom: true,
	normalizeFunction: 'linear',
	showTooltip: true
});
</script>
@else
<script>
	$(".dial1").knob();
	$({animatedVal: 0}).animate({animatedVal: 11}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial1").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
	$(".dial2").knob();
	$({animatedVal: 0}).animate({animatedVal: 12}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial2").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
	$(".dial3").knob();
	$({animatedVal: 0}).animate({animatedVal: 11}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial3").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
	$(".dial4").knob();
	$({animatedVal: 0}).animate({animatedVal: 12}, {
		duration: 3000,
		easing: "swing",
		step: function() {
			$(".dial4").val(Math.ceil(this.animatedVal)).trigger("change");
		}
	});
// map
jQuery('#browservisit').vectorMap({
	map: 'world_mill_en',
	backgroundColor: '#fff',
	borderWidth: 1,
	zoomOnScroll : false,
	color: '#ddd',
	regionStyle: {
		initial: {
			fill: '#fff'
		}
	},
	enableZoom: true,
	normalizeFunction: 'linear',
	showTooltip: true
});

</script>
<script type="text/javascript">
	Highcharts.chart('department_month', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Monthly Average Candidates'
		},
		subtitle: {
			text: ''
		},
		xAxis: {
			categories: [
			'Jan',
			'Feb',
			'Mar',
			'Apr',
			'May',
			'Jun',
			'Jul',
			'Aug',
			'Sep',
			'Oct',
			'Nov',
			'Dec'
			],
			crosshair: true
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Candidates'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			'<td style="padding:0"><b>{point.y:1f} </b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		series: {!! $data !!}
	});
Highcharts.chart('department_chart', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in January, 2018'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 61.41,
            sliced: true,
            selected: true
        }, {
            name: 'Internet Explorer',
            y: 11.84
        }, {
            name: 'Firefox',
            y: 10.85
        }, {
            name: 'Edge',
            y: 4.67
        }, {
            name: 'Safari',
            y: 4.18
        }, {
            name: 'Sogou Explorer',
            y: 1.64
        }, {
            name: 'Opera',
            y: 1.6
        }, {
            name: 'QQ',
            y: 1.2
        }, {
            name: 'Other',
            y: 2.61
        }]
    }]
});
</script>
@endif
@endsection