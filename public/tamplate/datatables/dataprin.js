//print data
$(document).ready(function () {
    var table = $('#example').DataTable({
        lengthChange: false,
        buttons: ['print', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#example_wrapper .col-md-6:eq(0)');
});
//alert
window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove()
    })
}, 3000)


//datatable list
$(document).ready(function () {
    $('#user_prin').DataTable();
});


$(document).ready(function () {
    $('#user').DataTable();
});

