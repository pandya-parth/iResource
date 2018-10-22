@extends('admin.layouts.panel')
@section('title','Questions')
@section('content')
<div class="min-height-200px">
	<!-- Contextual classes Start -->
	<div class="pd-20 bg-white border-radius-10 box-shadow mb-30">
		<div class="clearfix mb-20">
			<div class="pull-left">
				<h4 class="text-blue">Questions</h4>
			</div>
			<div class="pull-right">
				<a href="{!! route('questions.create') !!}" class="btn btn-sm btn-primary scroll-click" rel="content-y" role="button"><i class="fa fa-plus"></i> Add Question</a>
			</div>
		</div>
		<div class="table-responsive">
			@if(count($questions) > 0)
			<table class="table table-striped"  id="questions" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th scope="col">Department</th>
						<th scope="col">Question</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($questions as $question)
					<tr>
						<td>{!! $question->department ? $question->department->name : '' !!}</td>
						<td>{!! str_limit($question->question,50,'...') !!}</td>
						<td>
							<a href="{!!route('questions.show',['id'=>$question->id])!!}" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>
							<a href="{!!route('questions.edit',['id'=>$question->id])!!}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
							<a href="{!!route('questions.destroy',['id'=>$question->id])!!}" data-confirm="Are you sure want to delete?" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@else
			<p>No Questions Found.</p>
			@endif
		</div>
	</div>

</div>
@endsection
	@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('#questions').DataTable({
				iDisplayLength: 10,
				"columnDefs": [{
					targets: 2,
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
				"aoColumnDefs": [ { "bSortable": false,"aTargets": [ 2 ] },
				]
			});
			var table = $('#questions').DataTable();
			$('#questions').DataTable().search(this.value).draw();
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