@extends('layouts.guest.master')

@section('content')
	<h4><strong>{{ $book->title }}</strong> <sub class="text-success">{{ $book->created_at->diffForHumans() }}</sub></h4>

	<p style="text-indent: 20px">{{ $book->description }}</p>
	
<br />

<center>
	<a class="btn btn-primary" data-toggle="modal" href='#modal-indices'>Browse Indices
		<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
	</a>
</center>

<center>


	{{ $pages->links() }}

	<div class="container-fluid">
	    @foreach($pages as $page)
	        <img src="{{ url($page->page) }}" class="img-responsive img-thumbnail" alt="Image">
	    @endforeach
	</div>

	{{ $pages->links() }}

</center>



<div class="modal fade" id="modal-indices">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Indices</h4>
			</div>
			<div class="modal-body">
				
				<table id="table-indices" class="table table-bordered table-hover">
		            <thead>
		              <tr>
		                <th>ID</th>
		                <th>Description</th>
		                <th>Page</th>
		                <th><center>Action</center></th>
		              </tr>
		              </thead>
		              <tbody>
		              </tbody>
		        </table>

			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>


@endsection


@section('script')
<script type="text/javascript">

	$(function() {
        var table = $('#table-indices').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('index.show', ['id' => $book->id]) }}',
            columnDefs: [
              { "width": "50%", "targets": 2 }
            ],
            columns: [
                {data: 'id'},
                {data: 'description'},
                {data: 'page'},
                {data: 'action'},
            ]
        });
    });

	
	function jumpTo(row){
		$.ajax({
				url: '{{ route('index.jump') }}',
				type: 'get',
				data: {
					url: "{{ $pages->url(69) }}",
					page: row.page
				},
				success: function (data) {
					console.log(data);
					window.location = data.link;
				}
			});
		
	}

		
</script>
@endsection