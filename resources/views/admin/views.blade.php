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
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.books') }}">Manage Books</a></li>
            <li class="@active('admin/views', 'active')">Views</li>
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


            <table id="table-views" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User</th>
                  <th>Book Viewed</th>
                  <th>Date & Time</th>
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
    <!-- /.content -->


    @include('partials.confirm-delete')


@endsection

{{-- script --}}
@section('script')
<script type="text/javascript">


// // display book tables
//  $(function() {
//       var table = $('#table-views').DataTable({
//           processing: true,
//           serverSide: true,
//           ajax: url + 'all',
//           columnDefs: [
//             { "width": "50%", "targets": 2 }
//           ],
//           columns: [
//               {data: 'id'},
//               {data: 'title'},
//               {data: 'description'},
//               {data: 'action'},
//           ]
//       });
//   }); //end dready


</script>
@endsection

