(function ($) {
    "use strict";
    var testimonialsAdminTableSerch
    $(document).on('input', '#testimonialsAdminSearch', function () {
        testimonialsAdminTableSerch.search($(this).val()).draw();
    });
    testimonialsAdminTableSerch =  $('#testimonialDataTable').DataTable({
        pageLength: 25,
        ordering: false,
        serverSide: true,
        processing: true,
        responsive: true,
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
            {"data": "logo", "name": "logo", searchable: false, responsivePriority:1},

            {"data": "name", "name": "name"},
            {"data": "image", "name": "image", searchable: false, responsivePriority: 1},
            {"data": "designation", "name": "designation"},
            {"data": "status", "name": "status"},
            {"data": "action", searchable: false, responsivePriority: 2},
        ]
    });


})(jQuery)
