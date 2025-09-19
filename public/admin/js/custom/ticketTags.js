(function ($) {
    "use strict";

    $('#add-modal').on('shown.bs.modal', function () {
        const $modal = $('#add-modal')
        $modal.find('.js-example-basic-multiple').each(function () {
            const $this = $(this);
            if (!$this.hasClass("select2-hidden-accessible")) {
                $this.select2({
                    selectionCssClass: "sf-select-section",
                    dropdownParent: $modal
                });
            }
        });
    });

    var tagTicketsAdminTableSearch
    $(document).on('input', '#tagListDatatableSearch', function () {
        tagTicketsAdminTableSearch.search($(this).val()).draw();
    });
    tagTicketsAdminTableSearch =  $('#ticketTagsDataTable').DataTable({
        pageLength: 25,
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
            {"data": "status", "name": "status"},
            {"data": "action", searchable: false, responsivePriority:2},
        ]
    });

})(jQuery)
