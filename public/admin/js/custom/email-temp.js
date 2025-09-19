(function ($) {
    "use strict";

    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
        $('.select2').select2({
            selectionCssClass: "sf-select-section",
            dropdownParent: $('#add-modal')
        });
    });

    var emailTempAdminTableSerch
    $(document).on('input', '#emailTempAdminTableSearch', function () {
        emailTempAdminTableSerch.search($(this).val()).draw();
    });
    emailTempAdminTableSerch =  $('#emailTempDataTable').DataTable({
        pageLength: 25,
        ordering: false,
        serverSide: true,
        processing: true,
        responsive: true,
        searing: false,
        ajax: $('#email-temp-route').val(),
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
            {"data": "category", "name": "category", searchable: false, responsivePriority:1},
            {"data": "subject", "name": "subject"},
            {"data": "body", "name": "body"},
            {"data": "action", searchable: false, responsivePriority:2},
        ]
    });


})(jQuery)
