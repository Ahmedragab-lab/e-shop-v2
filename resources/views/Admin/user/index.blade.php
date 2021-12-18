@extends('Admin.dashlayout.master')
@section('title') user table @endsection
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('user table') }}</h4>
                {{-- <div class="col-md-6 mb-3">
                    <a href="#"  class="btn btn-primary "><i class="fa fa-user-circle"></i> {{ __('Add User') }}</a>
                </div> --}}
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#adduser">
                    <i class="fa fa-user-circle"></i> {{ __('Add User') }}
                </button>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap data-table" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('name') }}</th>
                                <th>{{ __('email') }}</th>
                                {{-- <th>{{ __('password') }}</th> --}}
                                <th>{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                                    <div class="modal fade " id="adduser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="modalHeading">Create User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>

                                            @include('alerts.create-modal')
                                            <div class="modal-body">
                                                <div class="alert-danger"></div>
                                                    <form id="userForm" name="userForm" class="form-horizontal ">
                                                    <input type="hidden" name="user_id" id="user_id">
                                                        <div class="form-group">
                                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                                            <div class="col-sm-12">
                                                                <input type="text" id="name" name="name" class="form-control"  placeholder="Enter name" maxlength="50" required="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-12">
                                                                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">Password</label>
                                                            <div class="col-sm-12">
                                                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" id="saveBtn" name="saveBtn" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                            </div>
                                    </div>
            </div>
        </div>
    </div>
</div> <!-- end col -->
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/alerts.js') }}"></script>
<script>
$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('user.index') }}",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'name', name: 'name'},
        {data: 'email', name: 'email'},
        // {data: 'name', name: 'password'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
       ]
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Saving...');
        $.ajax({
          data: $('#userForm').serialize(),
          url: "{{ route('user.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
            var show = $('.modal').hasClass('show');
            if(show)
            {
              $(this).on("click", function () {
                // alertSuccess("user added successfully.");
                console.log("clicked on modal");
              });
            }
            else
            {
                console.log("modal is closed");
            }

            // alertSuccess("user added successfully.");

              $('#bookForm').trigger("reset");
            //   $('#exampleModal').modal('hide');
            //   $(".modal-backdrop").remove();
              table.draw();

          },
          error: function (data) {

            // var errors = data.responseText;
            // console.log( errors );
        }

            //   $('#saveBtn').html('Save Changes');
    });
});
// Edit call
$('body').on('click', '.editUser', function () {
      var user_id = $(this).data('id');
      $.get("{{ url('user/') }}" +'/' + user_id +'/edit', function (data) {
          $('#modelHeading').html("Edit User");
          $('#saveBtn').val("edit-user");
          $('#adduser').modal('show');
          $('#user_id').val(data.id);
          $('#name').val(data.name);
          $('#email').val(data.email);
      })
   });
    ///Delete Call
    $('body').on('click', '.deleteUser', function () {
        var user_id = $(this).data("id");
        if(confirm("Are You sure want to delete !"))
        {
            $.ajax({
                type: "DELETE",
                url: "{{ url('user/') }}"+'/'+user_id,
                success: function (data) {
                alertDanger("User is deleted");
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });
});
</script>
@endsection
