@extends('admin.layouts.panel')
@section('title','Employees')
@section('content')
<div class="min-height-200px">

	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Employees</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('employees.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Employee</a>
			</div>
		</div>
		<div class="table-responsive">
			@if($employees->count() > 0)
			<table class="table table-striped" id="employee">
				<thead>
					<tr>
						<th scope="col">Department</th>
						<th scope="col">Name</th>
						<th scope="col">Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($employees as $employee)
						<tr>
							<td>{!! $employee->department ? $employee->department->name : '' !!}</td>
							<td>{!! $employee->name !!}</td>
							<td>{!! $employee->email !!}</td>
							<td>
								<a href="{!!route('employees.show',['id'=>$employee->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
								<a href="{!!route('employees.edit',['id'=>$employee->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
								<a href="{!!route('employees.destroy',['id'=>$employee->id])!!}" class="btn btn-sm btn-danger" data-confirm="Are you sure want to delete?" ><i class="fa fa-trash"></i></a></td>
						</tr>
					@endforeach						 
				</tbody>
			</table>
			@else
				<P>No employees found</P>
			@endif
		</div>
	</div>
	<!-- Contextual classes End -->
</div>
@endsection
	@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#employee').DataTable({
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
				"aoColumnDefs": [ { "bSortable": false,"aTargets": [ 3 ] },
				]
			});
			var table = $('#employee').DataTable();
			$('#employee').DataTable().search(this.value).draw();
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