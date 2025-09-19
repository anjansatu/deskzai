(function ($) {
    "use strict";

    var categoryTicketsAdminTableSearch
    $(document).on('input', '#categoryListAdminTableSearch', function () {
        categoryTicketsAdminTableSearch.search($(this).val()).draw();
    });
    categoryTicketsAdminTableSearch= $('#ticketCategoryDataTable').DataTable({
        pageLength: 5,
        ordering: false,
        serverSide: true,
        processing: true,
        responsive:true,
        searing: false,
        ajax: $('#news-list-route').val(),
        language: {
            paginate: {
                previous: "<span class='iconify' data-icon='material-symbols:chevron-left-rounded'></span>",
                next: "<span class='iconify' data-icon='material-symbols:chevron-right-rounded'></span>",
            },
            searchPlaceholder: "Search",
            search: ""
        },
        dom: '<>tr<"tableBottom"<"row"<"col-sm-6"i><"col-sm-6"p>>><"clear">',
        columns: [
            {"data": "name", "name": "name"},
            {"data": "code", "name": "code"},
            {"data": "is_ticket_prefix", "name": "is_ticket_prefix"},
            {"data": "status", "name": "status"},
            {"data": "action", searchable: false, responsivePriority:2},
        ]
    });

    $('#add-modal').on('shown.bs.modal', function () {
        const $modal = $('#add-modal')
        $modal.find('.js-example-basic-multiple').each(function () {
            const $this = $(this);
            if (!$this.hasClass("select2-hidden-accessible")) {
                $this.select2({selectionCssClass: "sf-select-section",
                    dropdownParent: $modal
                });
            }
        });
    });

})(jQuery)
