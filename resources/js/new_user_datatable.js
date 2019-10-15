var dataTable;
var selected_id;

$(document).ready(function () {

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
                render: function (o) {
                    return "<a href='{!!url('/home/new-users')!!}/" + o['id'] + "' class='editTS'><i class='fa fa-edit'></i></a>"
                },
            },
            {
                data: null,
                name: "#",
                autoWidth: true,
                orderable: false,
                searchable: false,
                render: function (o) {
                    return '<a class="deleteTS" href="javascript:void(0);" ts_Id="' + o['id'] + '"> <i class="fa fa-trash"></i> </a>'
                },
            }
        ]
    });

    // On click delete button
    $('#users_datatable').on('click', '.deleteTS', function () {
        selected_id = $(this).attr('ts_Id');
        $.ajax({
            url: SITEURL + '/home/new-users/' + selected_id,
            type: "DELETE",
            success: function (result) {
                dataTable.draw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
});
