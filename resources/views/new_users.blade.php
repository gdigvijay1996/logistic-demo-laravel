@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h3>New Users List</h1>
                        <a href="{{ url()->previous() }}" class="m-2 btn btn-outline-info btn-sm">Back</a>
                        <a href="{!! url('/home/new-users/add') !!}" class="m-2 btn btn-outline-info btn-sm">Add New User</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered data-table" id="users_datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile number</th>
                                <th>Referance code</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile number</th>
                                <th>Referance code</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    var SITEURL = "{{URL::to('')}}";
    // var SITEURL = {{ url('/') }};
    var dataTable;
    var selected_id;

    $(document).ready(function() {

        // for add/ edit data using AJAX call
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Create DataTable
        dataTable = $('#users_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: SITEURL + "/home/new-users/get",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    // data: 'full_name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email',
                    autoWidth: true
                },
                {
                    data: 'mobile_number',
                    name: 'mobile_number',
                    autoWidth: true
                },
                {
                    data: 'referance_code',
                    name: 'referance_code',
                    autoWidth: true,
                    searchable: false,
                    orderable: false
                },
                {
                    data: null,
                    name: "#",
                    searchable: false,
                    autoWidth: true,
                    orderable: false,
                    render: function(o) {
                        return "<a href='{!!url('/home/new-users')!!}/" + o['id'] + "' class='editTS'><i class='fa fa-edit'></i></a>"
                    },
                },
                {
                    data: null,
                    name: "#",
                    autoWidth: true,
                    orderable: false,
                    searchable: false,
                    render: function(o) {
                        return '<a class="deleteTS" href="javascript:void(0);" ts_Id="' + o['id'] + '"> <i class="fa fa-trash"></i> </a>'
                    },
                }
            ]
        });

        // On click delete button
        $('#users_datatable').on('click', '.deleteTS', function() {
            selected_id = $(this).attr('ts_Id');
            $.ajax({
                url: SITEURL + '/home/new-users/' + selected_id,
                type: "DELETE",
                success: function(result) {
                    dataTable.draw(false);
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    });
</script>
@endpush

@push('style')
<style>
    thead,
    th,
    tr,
    tfoot {
        text-align: center;
    }

    a {
        color: grey !important;
    }
</style>
@endpush