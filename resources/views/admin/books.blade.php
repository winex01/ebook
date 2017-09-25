@extends('layouts.admin.master')


@section('content')

  @include('layouts.version')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <a id="add-book" class="btn btn-default" data-toggle="modal" href='#modal-book'>
              <i class="fa fa-plus-circle"></i> New
            </a>


            <table id="book-table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Uploaded</th>
                  <th><center>Action</center></th>
                </tr>
                </thead>

                <tbody>
                </tbody>
            </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

    {{-- modal --}}
    <div class="modal fade" id="modal-book">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modal-btitle">Modal title</h4>
          </div>
          <div class="modal-body">
              {{-- form --}}
              <form class="form-horizontal">
                {{-- title --}}
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Title:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Book Title">
                  </div>
                </div>
                {{-- description --}}
                <div class="form-group">
                  <label class="control-label col-sm-2" for="description">Description:</label>
                  <div class="col-sm-10"> 
                      <textarea class="form-control" rows="10" id="description" placeholder="Enter Book Description."></textarea>
                  </div>
                </div>
                {{-- file --}}
                <div class="form-group">
                  <label class="control-label col-sm-2" for="file">File:</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" placeholder="File">
                  </div>
                </div>
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                  <i class="fa fa-close"></i>
                </button>
                <button id="save-book" type="button" class="btn btn-primary">Save changes
                  <i class="fa fa-check"></i>
                </button>
              </form>
              {{-- / form --}}
          </div>
        </div>
      </div>
    </div>

@endsection

{{-- script --}}
@section('script')
<script type="text/javascript">

  // tables
   $(function() {
        $('#book-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '/admin/getbooks',
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'created_at'},
                {data: 'action'},
            ]
        });
    });


  $('#add-book').click(function(event) {
    /* Act on the event */
      $('#modal-btitle').text('Add New Book');

  });


  $('#save-book').click(function(event) {
    /* Act on the event */
  
      var validate = '';
      var title = $('input[id=title]');
      var desc = $('textarea[id=description]');
      var file = $('input[id=file]');


      // validate title
      if (title.val() == '') {
          title.parent().parent().removeClass('has-success');
          title.parent().parent().addClass('has-error');
      }else {
          title.parent().parent().removeClass('has-error');
          title.parent().parent().addClass('has-success');
          validate += '1';
      }

      //validate desc
      if (desc.val() == '') {
          desc.parent().parent().removeClass('has-success');
          desc.parent().parent().addClass('has-error');
      }else {
          desc.parent().parent().removeClass('has-error');
          desc.parent().parent().addClass('has-success');
          validate += '2';
      }

      //validate if file is empty or not
      if (file.val() == '') {
          file.parent().parent().removeClass('has-success');
          file.parent().parent().addClass('has-error');
      }else {
          file.parent().parent().removeClass('has-error');
          file.parent().parent().addClass('has-success');
          validate += '3';
      }

      //validated
      if (validate == '123') {
        // $('#modal-book').modal('hide');//temp
          $.ajax({
            url: '/path/to/file',
            type: 'POST',
            dataType: 'xml/html/script/json/jsonp',
            data: {param1: 'value1'},
            complete: function(xhr, textStatus) {
              //called when complete
            },
            success: function(data, textStatus, xhr) {
              //called when successful
            },
            error: function(xhr, textStatus, errorThrown) {
              //called when there is an error
            }
          });
        
      }

  });




</script>
@endsection