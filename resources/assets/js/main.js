 $(document).ready( function () {
     $('#datatableData').DataTable({
      orderCellsTop: true,
      dom: 'Bfrtip',
        buttons: [
{
extend: 'excelHtml5',
text: '<i class="fa fa-file-excel-o"></i> Excel',
titleAttr: 'Export to Excel',
title: 'Insurance Companies',
exportOptions: {
columns: ':not(:last-child)',
}
},
{
extend: 'csvHtml5',
text: '<i class="fa fa-file-text-o"></i> CSV',
titleAttr: 'CSV',
title: 'Insurance Companies',
exportOptions: {
columns: ':not(:last-child)',
}
},
{
extend: 'pdfHtml5',
text: '<i class="fa fa-file-pdf-o"></i> PDF',
titleAttr: 'PDF',
title: 'Insurance Companies',
exportOptions: {
columns: ':not(:last-child)',
},
},
{
extend: 'print',
exportOptions: {
columns: ':visible'
},
customize: function(win) {
$(win.document.body).find( 'table' ).find('td:last-child, th:last-child').remove();
}
},
],
      "language":{
       "lengthMenu":"Mostrar _MENU_ registros por página.",
       "zeroRecords": "Lo sentimos. No se encontraron registros.",
             "info": "Mostrando página _PAGE_ de _PAGES_",
             "infoEmpty": "No hay registros aún.",
             "infoFiltered": "(filtrados de un total de _MAX_ registros)",
             "search" : "Búsqueda",
             "LoadingRecords": "Cargando ...",
             "Processing": "Procesando...",
             "SearchPlaceholder": "Comience a teclear...",
             "paginate": {
     "previous": "Anterior",
     "next": "Siguiente", 
     }
      },

              initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }

     }

     );
 } );
