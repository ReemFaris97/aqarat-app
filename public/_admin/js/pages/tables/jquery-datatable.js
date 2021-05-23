$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });
    // $(window).resize(function () {
    //     $("table.table").resize();
    // });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
