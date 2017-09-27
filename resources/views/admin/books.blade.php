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

          {{-- flash message here and error --}}
          {{-- <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              Added New Book Successfully.
          </div> --}}

            <a id="add-book" class="btn btn-default" data-toggle="modal" href='#modal-book'>
              <i class="fa fa-plus-circle"></i> New
            </a>


            <table id="table-book" class="table table-bordered table-hover">
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
              <form  id="form-book" class="form-horizontal">
                {{-- title --}}
                <div class="form-group">
                  <label class="control-label col-sm-2" for="title">Title:</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" placeholder="Book Title" autofocus>
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
                {{-- <div class="form-group">
                  <label class="control-label col-sm-2" for="file">File:</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" placeholder="File">
                  </div>
                </div> --}}
          </div>
          <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                  <i class="fa fa-close"></i>
                </button>
                <button type="submit" id="save-book" value="add" type="button" class="btn btn-primary">Save changes
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

  var url = '/admin/book/';

  // csrf
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
  })

  function dataTableRefresh(tble){
    // add new row dummy data just to complete the number of colum
    // just to refresh the table
    var newRow = '<tr><td>Winnie & Reyvelyn</td><td>Winnie & Reyvelyn</td><td>Winnie & Reyvelyn</td><td>Winnie & Reyvelyn</td></tr>';
    $(tble).DataTable().row.add($(newRow)).draw();
  }


  // display book tables
   $(function() {
        $('#table-book').DataTable({
            processing: true,
            serverSide: true,
            ajax: url + 'all',
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'created_at'},
                {data: 'action'},
            ]
        });
    });


   //open new/add book modal
  $('#add-book').click(function(event) {
    /* Act on the event */
      $('#title').focus();
      $('#modal-btitle').text('Add New Book');
  });
  // erase book modal inputs 
  $('#modal-book').on('hidden.bs.modal', function () {
      $(this).find('form').trigger('reset');
  })

  // form book
  $('#form-book').submit(function(event) {
    /* Act on the event */
    event.preventDefault(); 

      var title = $('input[id=title]');
      var desc = $('textarea[id=description]');
      var file = $('input[id=file]');
      
      var type = 'POST';
      var toUrl = url;
      var state = $('#save-book').val();


      var formData = {
          title : title.val(),
          description : desc.val(),
      }


      if (state == 'add') {
        toUrl += 'store'; 
      }

      // new
      //TODO append new inserted or last inserted to row
       $.ajax({
            type: type,
            url: toUrl,
            data: formData,
            dataType: 'json',
            success: function (data) {

                console.log(data);

                dataTableRefresh('#table-book');

                $('#modal-book').modal('hide');

            },
            error: function (data) {
                console.log('Error: ' + data);
            }
        });
      

  });


  // delete book
  function deleteBook(id) {

      $.ajax({

          type: "DELETE",
          url: url + 'delete/' + id,
          success: function (data) {
              console.log(data);

              dataTableRefresh('#table-book');
          },
          error: function (data) {
              console.log('Error:', data);
          }

      });
  }


</script>
@endsection

