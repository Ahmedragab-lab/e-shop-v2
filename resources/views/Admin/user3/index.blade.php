@extends('Admin.dashlayout.master')
@section('title') user table @endsection
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> --}}
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ __('user table') }}</h4>

                <div class="col-md-6 mb-3">
                    <a href="{{ route('user3.create') }}"  class="btn btn-primary "><i class="fa fa-user-circle"></i> {{ __('Add User') }}</a>
                </div>
                <div class="table-responsive">
                    <table id="users-table" class="table table-bordered dt-responsive nowrap datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('name') }}</th>
                                <th>{{ __('email') }}</th>
                                <th>{{ __('action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/alerts.js') }}"></script>

<script>

    let usersTable = $('#users-table').DataTable({
        dom: "tiplr",
        serverSide: true,
        processing: true,
        // "language": {
        //     "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
        // },
        ajax: {
            url: '{{ route('data') }}',
        },
        columns: [
            // {data: 'record_select', name: 'record_select', searchable: false, sortable: false, width: '1%'},
            // {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'created_at', name: 'created_at', searchable: false},
            {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
        ],
        order: [[2, 'desc']],
        // drawCallback: function (settings) {
        //     $('.record__select').prop('checked', false);
        //     $('#record__select-all').prop('checked', false);
        //     $('#record-ids').val();
        //     $('#bulk-delete').attr('disabled', true);
        // }
    });

    // $('#data-table-search').keyup(function () {
    //     usersTable.search(this.value).draw();
    // })
</script>
@endsection
