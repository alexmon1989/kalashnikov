$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#products tfoot th').each( function () {
        var title = $('#products thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Поиск '+title+'" />' );
    } );

    // DataTable
    var table = $('#products').DataTable();

    // Apply the search
    table.columns().each( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );
} );