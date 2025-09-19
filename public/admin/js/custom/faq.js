(function ($) {
    "use strict";
    var faqAdminTableSerch
    $(document).on('input', '#faqAdminSearch', function () {
        faqAdminTableSerch.search($(this).val()).draw();
    });
    faqAdminTableSerch =  $('#faqDataTable').DataTable({
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
            {"data": "category_name", "name": "category_name"},
            {"data": "question", "name": "question"},
            {"data": "answer", "name": "answer"},
            {"data": "status", "name": "status"},
            {"data": "action", searchable: false, responsivePriority:2},
        ]
    });


})(jQuery)
