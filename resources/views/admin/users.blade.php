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
            <li class="@active('admin/users', 'active')">Users</li>
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

            <a class="btn btn-default" data-toggle="modal" href='#modal-user'>
              <i class="fa fa-plus-circle"></i> User
            </a>

            {{  Session::get('insert_user') }}

            <table id="table-users" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Created</th>
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
    <!-- /.content -->

<div class="modal fade" id="modal-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">New User</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                <label for="username" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

                    @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>




{{-- update --}}
<div class="modal fade" id="modal-update-user">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Edit User</h4>
      </div>
      <div class="modal-body">
          @include('partials.flash-error')

          <form class="form-horizontal">

            <div class="form-group{{ $errors->has('editName') ? ' has-error' : '' }}">
                <label for="editName" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="editName" type="text" class="form-control" name="editName" value="{{ old('editName') }}" required autofocus>

                    @if ($errors->has('editName'))
                        <span class="help-block">
                            <strong>{{ $errors->first('editName') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('editUsername') ? ' has-error' : '' }}">
                <label for="editUsername" class="col-md-4 control-label">Username</label>

                <div class="col-md-6">
                    <input id="editUsername" type="text" class="form-control" name="editUsername" value="{{ old('editUsername') }}" required>

                    @if ($errors->has('editUsername'))
                        <span class="help-block">
                            <strong>{{ $errors->first('editUsername') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button id="updateUser" type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>




    @include('partials.confirm-delete')

@endsection

{{-- script --}}
@section('script')
<script type="text/javascript">

  @if ($errors->has('password') || $errors->has('username') || $errors->has('name'))
    $('#modal-user').modal();
  @endif
   

   $(function() {
        var table = $('#table-users').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('users.all') }}',
            // columnDefs: [
            //   { "width": "50%", "targets": 2 }
            // ],
            columns: [
                {data: 'name'},
                {data: 'username'},
                {data: 'created_at'},
                {data: 'action'},
            ]
        });
    });

   var id;
   function deleteUser(row) {
      $('#modal-confirm-delete .modal-title').html('System Message');
      $('#modal-confirm-delete .modal-body p').html('Are you sure you want to delete <strong>' + row.name + '</strong>?');
      $('#modal-confirm-delete').modal();
      // console.log(row);
      id = row.id;
  }
  $('#btn-confirm-delete').click(function(event) {
        /* Act on the event */
        $.ajax({
            type: "DELETE",
            url: '/admin/users/' + id,
            // data: {
            //   id : id
            // },
            success: function (data) {
                
                console.log(data);

                $('#modal-confirm-delete').modal('hide');
                dataTableRefresh('#table-users');
                printSuccessMsg(data.title, 'Deleted');

            },
            error: function (data) {
                console.log('Error:', data);
            }

        });

  });

  function editUser(row){
    $('#updateUser').val(row.id);
    $('#editName').val(row.name);
    $('#editUsername').val(row.username);
     $('#modal-update-user').modal();
  }

  $('#updateUser').on('click', function(event) {
    event.preventDefault();
    /* Act on the event */
      $.ajax({
            type: "PATCH",
            url: '/admin/users/' + $('#updateUser').val(),
            data: {
              name : $('#editName').val(),
              username: $('#editUsername').val()
            },
            success: function (data) {
                
                console.log(data);

                if(data.status == 'duplicate') {
                  var arr = [data.status + ' username.'];
                  printErrorMsg(arr);
                }else{
                  dataTableRefresh('#table-users');
                  printSuccessMsg(data.title, 'Updated');
                  $('#modal-update-user').modal('hide');  
                }
                

            },
            error: function (data) {
                console.log('Error:', data);
            }

        });
  });



</script>
@endsection

