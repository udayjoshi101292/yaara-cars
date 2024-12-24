
if (document.querySelector(".database_tables_wrap") !== null) {
    $('.database_tables').DataTable({
        layout: {
            bottomStart: {
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            }
        },
        // scrollX: true,
        pageLength: 50,
        order: [
            [0, 'ascent']
            // []
        ],
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
        }],

        // bottomStart: {
        //     buttons: [
        //         {
        //             extend: 'excel',
        //             exportOptions: {
        //                 format: {
        //                     body: function (inner, rowidx, colidx, node) {
        //                         if ($(node).children("input").length > 0) {
        //                             return $(node).children("input").first().val();
        //                         } else {
        //                             return inner;
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     ]
        // }

    });
}