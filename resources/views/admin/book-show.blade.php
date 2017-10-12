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
            <li><a href="{{ route('admin.books') }}">Book List</a></li>
            <li class="@active('admin/book/show/*', 'active')">{{ $book['title'] }}</li>
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

            {{-- button page --}}
            <a class="btn btn-default" data-toggle="modal" href='#modal-page'>
              <i class="fa fa-plus-circle"></i> Add Page
            </a>


          <table id="table-page" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID #</th>
                  <th>Page</th>
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


    {{-- modal page --}}
    <div class="modal fade" id="modal-page">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Add New Page</h4>
          </div>
          <div class="modal-body">
              {{-- form --}}
              <form class="form-horizontal" id="page-form" enctype="multipart/form-data">
                {{-- file --}}
                <div class="form-group">
                  <label class="control-label col-sm-2" for="file">File:</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="file" id="file">
                  </div>
                </div>
              {{-- / file --}}

              <input type="hidden" id="slug" name="slug" value="{{ $book['slug'] }}">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fa fa-close"></i></button>
            <button type="submit" class="btn btn-primary">Save changes <i class="fa fa-check"></i></button>
              </form>
              {{-- / form --}}
          </div>
        </div>
      </div>
    </div>
    {{-- / modal page --}}


    @include('partials.confirm-delete')

@endsection



@section('script')

<script type="text/javascript">
    
  var url = '/admin/page/';

  // display book tables
   $(function() {
       $('#table-page').DataTable({
            processing: true,
            serverSide: true,
            ajax: url + 'all/' + {{ $book['id'] }},
            columns: [
                {data: 'id', searchable: true},
                {data: 'page', searchable: false},
                {data: 'created_at', searchable: false},
                {data: 'action', searchable: false},
            ],
            // "fnCreatedRow": function (row, data, index) {
            //     $('td', row).eq(0).html(index + 1);
            // }
        });



    });


    // new page
    $('#page-form').submit(function(e) {
    /* Act on the event */
      e.preventDefault();

      var form = new FormData();
      form.append('file', $('#file')[0].files[0]);
      form.append('slug', $('#slug').val());
      
      $.ajax({
          url: url + 'store',
          data: form,
          cache: false,
          contentType: false,
          processData: false,
          type: 'POST',
          success:function(response) {
              console.log(response);

                // if (response.error) {
                //   printErrorMsg(response.error);
                // }else {
                //   $('.print-error-msg').hide();
                //   $('#modal-book').modal('hide');
                //   dataTableRefresh('#table-book');
                //   alert('Added Successfully!');
                // }

          },
          error: function(response) {
            console.log('Error: ' + response)
          }
      });
  });
  // end new page
</script>

@endsection

