<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Users List</title>

    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap JS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">
        <h1>Users List</h1>
        <table class="table table-bordered data-table" id="laravel_datatable">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>#</th>
                    <th>#</th>
                    <!-- <th width="100px">Action</th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>#</th>
                    <th>#</th>
                    <!-- <th width="100px">Action</th> -->
                </tr>
            </tfoot>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">User Name</span>
                            </div>
                            <input type="text" id="uName" name="username" class="form-control" required placeholder="enter username" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="saveButton">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
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
            dataTable = $('#laravel_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: SITEURL + "/home/users-list",
                columns: [{
                        data: 'id',
                        name: 'Id'
                    },
                    {
                        data: 'name',
                        name: 'Name'
                    },
                    {
                        data: 'email',
                        name: 'Email',
                        autoWidth: true
                    },
                    {
                        data: null,
                        name: "#",
                        searchable: false,
                        autoWidth: true,
                        orderable: false,
                        render: function(o) {
                            return '<a class="editTS" href="javascript:void(0);" ts_Id="' + o['id'] + '"> <i class="fa fa-edit"></i> </a>'
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

            // On click edit button
            $('#laravel_datatable').on('click', '.editTS', function() {
                selected_id = $(this).attr('ts_Id');

                $.ajax({
                    url: SITEURL + '/home/users-list/' + selected_id,
                    type: "GET",
                    success: function(result) {
                        $('#uName').val(result.name);
                        $('#editModal').modal('show');
                    }
                });
            });

            // On click delete button
            $('#laravel_datatable').on('click', '.deleteTS', function() {
                selected_id = $(this).attr('ts_Id');
                $.ajax({
                    url: SITEURL + '/home/users-list/delete/' + selected_id,
                    type: "GET",
                    success: function(result) {
                        dataTable.draw(false);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });

            $('#saveButton').click(function(e) {
                e.preventDefault();
                $(this).html('waiting..');
                $.ajax({
                    data: $('#editForm').serialize(),
                    url: SITEURL + '/home/users-list/edit/' + selected_id,
                    type: "POST",
                    dataType: 'json',
                    success: function(result) {
                        $('#editForm').trigger("reset");
                        $('#editModal').modal('hide');
                        dataTable.draw(false);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                        $('#saveButton').html('Save Changes');
                    }
                });
            });
        });
    </script>

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
</body>

</html>