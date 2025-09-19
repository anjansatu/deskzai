(function ($) {
    "use strict";
    var knowledgeCategoryTableSerch
    $(document).on('input', '#knowledgeCategorySearch', function () {
        knowledgeCategoryTableSerch.search($(this).val()).draw();
    });
    knowledgeCategoryTableSerch =  $('#knowledgeCategoryDataTable').DataTable({
        pageLength: 25,
        ordering: false,
        serverSide: true,
        processing: true,
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
            {"data": "title", "name": "title"},
            {"data": "status", "name": "status"},
            {"data": "action", searchable: false, responsivePriority:2},
        ]
    });

})(jQuery)
