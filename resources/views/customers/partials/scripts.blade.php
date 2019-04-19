<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
<script>
jQuery(document).ready(function($){

    $('.toggle-trigger').click(function(e){
        e.preventDefault();
        $('.toggle-body').toggle('slow');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});

jQuery(document).ready(function($){

    var rows_selected = [];
    var url = "{!! route('customers.data',['index']) !!}";
    var table_selector = '.tbl-customers';
    var table = $('.table');

    var oTable;
    oTable = $(table_selector).dataTable({

        "dom": '<"top"f>rt<"bottom"ilp><"clear">',
        processing: true,
        serverSide: true,
        "ajax": {
            "url":"{!! route('customers.data',['index']) !!}",
        },
        columns: [
            {
                data: '',
                defaultContent: '',
                orderable: false
            },
            {data: 'name', name: 'name'},
            {data: 'display_name', name: 'display_name'},
            {data: 'actions', name: 'actions', searchable: "false", orderable: "false"}
        ],
//        select: {
//            style:    'os',
//            selector: 'td:first-child'
//        },
        columnDefs: [
            {
                'targets': 0,
                'render': function (data, type, row, meta) {
                        data = '<div class="checkbox checkbox-info">' +
                            '<input class="dt-checkboxes" name="ids[]" type="checkbox" value="' + row.id + '" id="' + row.id + '">' +
                            '<label></label> </div>';

                    return data;
                },
                'checkboxes': {
                    'selectRow': true,
                    'selectAllRender': '<div class="checkbox checkbox-info"><input class="dt-checkboxes" type="checkbox" id="select-all"><label></label></div>'
                }
            }
        ],
        select: {
            style: 'multi',
            'selector': 'td:first-child'
        },
        "oLanguage": {
            //  sProcessing: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>',
        },
        "bStateSave": true,
        "aaSorting": [[0, 'asc']],
        "bSortClasses": false,
        "aLengthMenu": [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
        ],
        "iDisplayLength": 10,
        "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {

            var rowId = aData.id;
            // If row ID is in the list of selected row IDs
            if ($.inArray(rowId, rows_selected) !== -1) {
                console.log("calling 1st");
                $(nRow).find('input[type="checkbox"]').prop('checked', true);
                $(nRow).addClass('selected');
            } else {
                setTimeout(function () {
                    $(nRow).find('input[type="checkbox"]').prop('checked', false);
                    $('#select-all').prop('checked', false);
                    $(nRow).removeClass('selected');
                }, 0);

            }

            var href = $(nRow).find('td > .btn-group > .btn-view').attr('href');
            $(nRow).attr("data-href", href);
            return nRow;
        }
    });

    $('#select-all').on('click', function () {
        // Get all rows with search applied
        var rows = oTable.api().rows({'search': 'applied'}).data();
        rows_selected = [];

        if (this.checked)
            $.each(rows, function (index, row) {
                rows_selected.push(row.id);
            });

    });

    $(table_selector).on('click', 'tbody tr td:not(:first-child,:last-child)', function () {
        var path = $(this).parent('tr').data('href');
        window.location = path;
    });

    $('.dataTables_filter input[type="search"]').addClass('form-control'); // <-- add this line

    $('#btn-apply').on('click', function (e) {
        e.preventDefault();

        if (rows_selected.length == 0) {
            toastr["error"]('Oops! you did not select any record ');
            return false;
        } else if ($('#actions').val() == "edit") {
            $("#editModal").modal("show");
            $("#editModal").find("#client-count").text(rows_selected.length);

        } else if ($('#actions').val() == "delete") {

            swal({
                showLoaderOnConfirm: true,
                title: "Are you sure?",
                text: rows_selected.length + " customers will be deleted permanently from this system!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#007AFF",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function () {
                $.ajax({
                    url: "{{route('customers.destroy-all') }}",
                    data: {
                        customers: rows_selected // will be accessible in $_POST['data1']
                    },
                    headers: {'X-XSRF-TOKEN': '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}'},
                    error: function () {
                        swal("Cancelled", "{{trans('customers.index.delete_unable')}}", "error");
                    },
                    success: function (response) {
                        if (response.success == 'true') {
                            rows_selected = [];
                            oTable.fnDraw();
                            swal("{{trans('customers.index.delete_validation')}}", "{{trans('customers.index.delete_msg')}}", "success");
                        } else {
                            swal("Cancelled", "{{trans('customers.index.delete_unable')}}", "error");
                        }
                    },

                    type: 'POST'
                });
            });
        }


    });

    $(".tbl-customers tbody").on('click', 'input[type="checkbox"]', function (e) {
        var $row = $(this).closest('tr');

        // Get row data
        var data = oTable.api().row($row).data();
        // Get row ID
        var rowId = data.id;

        // Determine whether row ID is in the list of selected row IDs
        var index = $.inArray(rowId, rows_selected);

        // If checkbox is checked and row ID is not in list of selected row IDs
        if (this.checked && index === -1) {
            rows_selected.push(rowId);

            // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
        } else if (!this.checked && index !== -1) {
            rows_selected.splice(index, 1);
        }

        if (this.checked) {
            $row.addClass('selected');
        } else {
            $row.removeClass('selected');
        }

        e.stopPropagation();
    });
});
</script>
{{--@endpush--}}