@push('scripts')
{{--<script src="//code.jquery.com/jquery-1.12.4.js"></script>--}}
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.1/js/buttons.colVis.min.js"></script>
<script>
$(document).ready(function(){
    $("a[data-toggle=\"tab\"]").on('click', function () {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
    });
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

$(function() {
    var url = "{!! route('notaries.data',['null','index']) !!}";
    var table_selector = '.tbl-notaries';
    var table =  $('.table');

    var oTable = $(table_selector).dataTable({

        "dom": '<"top"f>rt<"bottom"ilp><"clear">',
        processing: true,
        serverSide: true,
        "ajax": {
            "url": url,
            "data": function ( d ) {
                return $.extend( {}, d, {
                    "display": $('#display').val(),
                    "status": $('#status').val()
                } );
            }
        },
        columns: [
            { data: 'notary', name: 'notary' },
            { data: 'description', name: 'description' },
            { data: 'amount', name: 'amount' },
            { data: 'quantity', name: 'quantity' },
            { data: 'taxable', name: 'taxable' },
            { data: 'actions', name: 'Actions',searchable: "false", orderable: "false" }
        ],
        "aoColumnDefs" : [
            {
                "aTargets" : [0]
            }
        ],
        "oLanguage" : {
            //  sProcessing: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>',
        },
        "bStateSave": true,
        "aaSorting" : [[0, 'asc']],
        "bSortClasses": false,
        "aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
        ],
        // set the initial value

        "iDisplayLength" : 10
    });


    $('.dataTables_filter input[type="search"]').addClass('form-control'); // <-- add this line


    $('#display,#status').on('change',function (e) {
        e.preventDefault();
        oTable.fnDraw();
    });


});

$('.table').on('click', '.notary-delete', function(e){
    e.preventDefault();

    tr = $(this).closest('tr');
    var notaryId = $(this).attr('data-id');

    swal({
        showLoaderOnConfirm: true,
        title: "Are you sure?",
        text: "This notary will be deleted permanently from this system!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007AFF",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function() {
        $.ajax({
            url:  '{{ str_replace('-1','',route('notaries.destroy',-1))  }}'+notaryId,
            headers: { 'X-XSRF-TOKEN' : '{{\Illuminate\Support\Facades\Crypt::encrypt(csrf_token())}}' },
            error: function() {
                swal("Cancelled", "{{trans('notaries.index.delete_unable')}}", "error");
            },
            success: function(response) {
                if(response.success == 'true'){
                    tr.remove();
                    swal("{{trans('notaries.index.delete_validation')}}", "{{trans('notaries.index.delete_msg')}}", "success");
                }else{
                    swal("Cancelled", "{{trans('notaries.index.delete_unable')}}", "error");
                }
            },

            type: 'DELETE'
        });
    });

});
</script>
@endpush