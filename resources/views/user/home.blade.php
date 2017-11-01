@extends('layouts.user.master')


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
            <li><a href="{{ route('home') }}">Home</a></li>
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

          @include('flash::message')
          @include('partials.flash-success')

          <table id="table-book" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th><center>Action</center></th>
              </tr>
              </thead>

              <tbody>
              </tbody>
          </table>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          {{-- Footer --}}
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>



{{-- modal description --}}
<div class="modal fade" id="modal-description">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title"><strong id="desc-title"></strong></h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
{{-- / modal description --}}


@include('partials.confirm-delete')
    <!-- /.content -->
@endsection

@section('script')
<script type="text/javascript">

  // display user bookmarks tables
   $(function() {
        var table = $('#table-book').DataTable({
            processing: true,
            serverSide: true,
            ajax: 'user/book',
            columnDefs: [
              { "width": "50%", "targets": 2 }
            ],
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'description'},
                {data: 'action'},
            ]
        });
    }); //end dready

   function readDescription(book){

      // console.log(book);
      $('#modal-description .modal-title #desc-title').text(book.title);
      $('#modal-description .modal-body').text(book.description);

      $('#modal-description').modal();
   }

   // remove bookmarked confirmation
   function confirmRemoveBookmark(book){
      $('#btn-confirm-delete').val('delete-bookmark');
      $('#hidden-field').val(book.id);
      $html = 'Are you sure you want to remove <strong>'+book.title+'</strong> in your bookmarked?';

      $('#modal-confirm-delete .modal-body p').html($html);
      $('#modal-confirm-delete').modal();
   }
   // remove bookmarked
   $('#btn-confirm-delete').click(function(event) {
     /* Act on the event */
     if ($(this).val() == 'delete-bookmark'){
        $.ajax({
          url: 'user/removeBookmark/'+ $('#hidden-field').val(),
          type: 'GET',
          success: function(data){

              if (data.title) {

                $('#modal-confirm-delete').modal('hide');
                dataTableRefresh('#table-book');
                printSuccessMsg(data.title, data.msg);

              }

          },
          error: function(){
            alert('whoops, something went wrong...');
          }
        });
        
     }
   });

</script>
@endsection