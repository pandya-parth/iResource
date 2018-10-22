@extends('admin.layouts.panel')
@section('title','Candidates')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Candidates</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('users.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add User</a>
			</div>
		</div>
		<div class="table-responsive">
			@if($users->count() > 0)
			<table class="table table-striped" id="interviewer">
				<thead>
					<tr>
						<th scope="col">{!! Auth::user()->role == 'admin' ? 'Department' : '#' !!}</th>
						<th scope="col">Name</th>
						<th scope="col">Progress</th>
						<th scope="col">Status</th>
						<th scope="col">Test Given</th>
						<th scope="col">Updated At</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $key => $user)
					<tr>
						<td>{!! Auth::user()->role == 'admin' ? title_case($user->department->name) : $key + 1 !!}</td>
						<td>{!! $user->name !!}</td>
						<td>{!! App\User::progress($user).'%' !!}</td>
						<td>
							@if(Auth::user()->role == 'admin')
								<a href="{!!route('users.switch',['id'=>$user->id])!!}" title="Click here to switch account status">
									@if($user->active)
									<button class="btn btn-sm btn-success">Selected</button>
									@else
									<button class="btn btn-sm btn-danger">Not Selected</button>
									@endif
								</a> 
							@else
								@if($user->active)
									<button class="btn btn-sm btn-success">Selected</button>
								@else
									<button class="btn btn-sm btn-danger">Not Selected</button>
								@endif
							@endif  
						</td>
						<td>
							@if(App\Test::where('user_id','=',$user->id)->count() > 0)
								<button class="btn btn-sm btn-success">Yes</button>
							@else
								<button class="btn btn-sm btn-danger">No</button>
							@endif
						</td>
						<td>{!! $user->updated_at->diffForHumans() !!}</td>
						<td>
							<a href="{!!route('users.show',['id'=>$user->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							@if(Auth::user()->role == 'admin')
							<a href="{!!route('users.edit',['id'=>$user->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('users.destroy',['id'=>$user->id])!!}" class="btn btn-sm btn-danger" data-confirm="Are you sure want to delete?" ><i class="fa fa-trash"></i></a>
							@endif
							<a href="{!!route('users.profile',['id'=>$user->id])!!}" class="btn btn-sm btn-info"><i class="fa fa-file-pdf-o"></i></a>
						</td>
					</tr>
					@endforeach						 
				</tbody>
			</table>
			@else
			<P>No users found</P>
			@endif
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection
@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#interviewer').DataTable({
			iDisplayLength: 10,
			"columnDefs": [{
				targets: 5,
				render: function ( data, type, row ) {
					return data.substr( 0, 10 )+'...';
				}
			}
			],
			initComplete: function(){
				this.api().columns().every( function () {
					var column = this;
					if($(column.footer()).data("type") == "select")
					{
						var select = $('<select><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function(){
							var val = $.fn.dataTable.util.escapeRegex( $(this).val() );
							column.search( val ? '^'+val+'$' : '', true, false ).draw();
						});
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						});
					}
					else if($(column.footer()).data("type") == "text")
					{
						var select = $('<input type="text" placeholder="Search '+$(column.footer()).val()+'" />')
						.appendTo( $(column.footer()).empty() )
					}
				});
			},
			"aoColumnDefs": [ { "bSortable": false,"aTargets": [ 6 ] },
			]
		});
		var table = $('#interviewer').DataTable();
		$('#interviewer').DataTable().search(this.value).draw();
		table.columns().every(function(){
			var that = this;
			$('input', this.footer()).on( 'keyup change', function(){
				if ( that.search() !== this.value ) {
					that.search( this.value ).draw();
				}
			});
		});
	});
</script>
@endsection