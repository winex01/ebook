@extends('layouts.admin.master')


@section('content')

  @include('layouts.version')

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
          
          {{-- breadcramps --}}
          <ol class="breadcrumb">
            <li><a href="{{ route('admin.books') }}">Manage Books</a></li>
            <li class="@active('admin/books', 'active')">Book Lists</li>
          </ol>
          {{-- / brandcramps --}}

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

          {{-- flash message here --}}
          @include('partials.flash-success')

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
              {{-- flash message --}}
              @include('partials.flash-error')

              {{-- form --}}
              <form class="form-horizontal" id="book-form">
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


    @include('partials.confirm-delete')

@endsection

{{-- script --}}
@section('script')
<script type="text/javascript">

  var url = '/admin/book/';
  var id;

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

  // delete book
  function deleteBook(book_id, book_title) {
      $('#modal-confirm-delete .modal-title').html('System Message');
      $('#modal-confirm-delete .modal-body p').html('Are you sure you want to delete <strong>' + book_title + '</strong>?');
      $('#modal-confirm-delete').modal();

      id = book_id;
  }

  $('#btn-confirm-delete').click(function(event) {
        /* Act on the event */
        $.ajax({

            type: "DELETE",
            url: url + 'delete/' + id,
            success: function (data) {
                
                console.log(data);

                $('#modal-confirm-delete').modal('hide');
                dataTableRefresh('#table-book');
                printSuccessMsg(data.title, 'Deleted');

            },
            error: function (data) {
                console.log('Error:', data);
            }

        });

  });
  // end delete book

  //save
  $('#book-form').submit(function(e) {
    /* Act on the event */
      e.preventDefault();
      
      $.ajax({
        url: url + 'store',
        type: 'POST',
        dataType: 'json',
        data: {
          title: $('#title').val(),
          description: $('#description').val()
        },
        success: function (data) {
            console.log(data);

            if (data.title) {
              dataTableRefresh('#table-book');
              printSuccessMsg(data.title, 'Added');
              $('#modal-book').modal('hide');
            }else{
              if (data.error) {
                printErrorMsg(data.error);
              }
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }

      });
      

  });


  // example for uploading files 
  // $('#book-form').submit(function(e) {
  //   /* Act on the event */
  //     e.preventDefault();

  //     var form = new FormData();

  //     form.append('title', $('#title').val());
  //     form.append('description', $('#description').val());
  //     form.append('file', $('#file')[0].files[0]);
      
  //     $.ajax({
  //         url: url + 'store',
  //         data: form,
  //         cache: false,
  //         contentType: false,
  //         processData: false,
  //         type: 'POST',
  //         success:function(response) {
  //             console.log(response);

  //               if (response.error) {
  //                 printErrorMsg(response.error);
  //               }else {
  //                 $('.print-error-msg').hide();
  //                 $('#modal-book').modal('hide');
  //                 dataTableRefresh('#table-book');
  //                 alert('Added Successfully!');
  //               }

  //         },
  //         error: function(response) {
  //           console.log('Error: ' + response)
  //         }
  //     });

  // });

  


</script>
@endsection

