(function ($) {
    "use strict";

    $(document).ready(function (){
        var ticketsAllAgentDataTableSearch
        $(document).on('input', '#ticketsAgentDataTableSearch', function () {
            ticketsAllAgentDataTableSearch.search($(this).val()).draw();
        });
        ticketsAllAgentDataTableSearch = $('#ticketsDataTable').DataTable({
            // let filterTicketDatatable = $('#ticketsDataTable').DataTable({
            pageLength: 25,
            ordering: false,
            serverSide: true,
            processing: true,
            responsive:true,
            searching: true,
            ajax: {
                url: $('#ticket-url').val(),
                data: function (data) {
                    data.ticket_category_id = $('.ticketCategoryId.active').val();
                }
            },
            language: {
                paginate: {
                    previous: "<span class='iconify' data-icon='material-symbols:chevron-left-rounded'></span>",
                    next: "<span class='iconify' data-icon='material-symbols:chevron-right-rounded'></span>",
                },
                searchPlaceholder: "Search",
                search: ""
            },
            dom: '<>tr<"bottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
            columns: [
                // {"data": "checkbox", "name": "checkbox", searchable: false, orderable: false},
                {"data": 'ticket_id', "name": 'tracking_no'},
                {"data": "ticket_title", "name": "ticket_title"},
                {"data": "created_by", "name": "users.name"},
                {"data": "created_by", "name": "users.email"},
                {"data": "category_id", "name": "category.name"},
                {"data": "updated", "name": "created_at", searchable: false, orderable: false},
                {"data": "assigned_to", searchable: false, orderable: false},
                {"data": "action", searchable: false, orderable: false, responsivePriority: 3},
            ],
            columnDefs: [
                {
                    targets: [4, 5],
                    visible: false,
                },
            ],
        });

        $('.ticketCategoryId').on('click', function() {
            $('.ticketCategoryId').removeClass('active');
            $(this).addClass('active');
            filterTicketDatatable.ajax.reload();
        });
    });

    var ticketsDeletedAgentDataTableSearch
    $(document).on('input', '#ticketsDeletedDataTableSearch', function () {
        ticketsDeletedAgentDataTableSearch.search($(this).val()).draw();
    });
    ticketsDeletedAgentDataTableSearch =  $('#ticketsDeletedDataTable').DataTable({
        pageLength: 25,
        ordering: false,
        responsive:true,
        serverSide: true,
        processing: true,
        searching: true,
        ajax: $('#ticket-url').val(),
        language: {
            paginate: {
                previous: "<span class='iconify' data-icon='material-symbols:chevron-left-rounded'></span>",
                next: "<span class='iconify' data-icon='material-symbols:chevron-right-rounded'></span>",
            },
            searchPlaceholder: "Search",
            search: ""
        },
        dom: '<>tr<"bottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
        columns: [
            // {"data": "checkbox", "name": "checkbox", searchable: false, orderable: false},
            {"data": 'ticket_id', "name": 'tracking_no'},
            {"data": "ticket_title", "name": "ticket_title"},
            {"data": "created_by", "name": "users.name"},
            {"data": "created_by", "name": "users.email"},
            {"data": "category_id", "name": "category.name"},
            {"data": "updated", "name": "created_at", searchable: false, orderable: false},
            {"data": "assigned_to", searchable: false, orderable: false},
            {"data": "action", searchable: false, orderable: false, responsivePriority: 3},
        ],
        columnDefs: [
            {
                targets: [4,5],
                visible: false,
            },
        ],
    });

$(document).on('click', '#deleteData', function () {
        var count = 0;
        $("#deleteForm").serializeArray().map(function (item) {
            if (item.name == 'multicheck_ticket_id[]') {
                count = count + 1;
            }
        });
        if (count != 0) {
            deleteTicketItem();
        }else{
            toastr.error("Select at least one row");
        }
    });

    // commonAjax('GET', $('#get-category-chart-data').val(), getCategoryChartData, getCategoryChartData);



window.deleteTicketItem = deleteTicketItem;
   function deleteTicketItem(url, id) {
    "use strict";

    Swal.fire({
        title: 'Sure! You want to delete?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Delete It!'
    }).then((result) => {
        if (result.value) {
            $("#deleteForm").submit();
        }
    })
}

window.getCategoryChartData = getCategoryChartData;
function getCategoryChartData(response){
   return 0;

}
window.getDailyChartData = getDailyChartData;
function getDailyChartData(response){
return 0;
}

})(jQuery)
