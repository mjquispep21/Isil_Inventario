var tabla;

function init() {
}


$(document).ready(function () {


    tabla = $('#stock_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [

        ],
        "ajax": {
            url: '../../Controllers/reportes.php?op=listar_stock',
            type: "post",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",", 
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();


});

$(document).ready(function () {


    tabla = $('#ficha_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ],
        "ajax": {
            url: '../../Controllers/reportes.php?op=listar',
            type: "post",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();

});


$(document).ready(function () {


    $('#ficha_descrip').summernote({
        height: 400,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function (image) {
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function (e) {
                console.log("Text detect...");
            }
        }
    });

    $.post("../../Controllers/categoria.php?op=combo_sede", function (data, status) {
        $('#ID_sede').html(data);
    });

    $.post("../../Controllers/categoria.php?op=combo_torre", function (data, status) {
        $('#ID_torre').html(data);
    });

    $.post("../../Controllers/categoria.php?op=combo_almacen", function (data, status) {
        $('#ID_almacen').html(data);
    });

    $.post("../../Controllers/categoria.php?op=combo_equipo", function (data, status) {
        $('#ID_equipo').html(data);
    });

    $.post("../../Controllers/categoria.php?op=combo_marca", function (data, status) {
        $('#ID_marca').html(data);
    });

    $.post("../../Controllers/categoria.php?op=combo_modelo", function (data, status) {
        $('#ID_modelo').html(data);
    });

    $.post("../../Controllers/categoria.php?op=combo_operatividad", function (data, status) {
        $('#ID_operatividad').html(data);
    });


});

function ver(ID_ficha) {

    $('#mdltitulo').html('Visualizar Registro');

    $.post("../../Controllers/reportes.php?op=ver", { ID_ficha: ID_ficha }, function (data) {
        data = JSON.parse(data);
        $('#ID_ficha').val(data.ID_ficha);
        $('#ID_sede').val(data.ID_sede).trigger('change');
        $('#ID_torre').val(data.ID_torre).trigger('change');
        $('#Salon').val(data.Salon);
        $('#ID_almacen').val(data.ID_almacen).trigger('change');
        
        var promise = new Promise(function(resolve, reject) {
            $('#ID_almacen').change(function() {
                var ID_Almacen = $(this).val();
                $.post("../../Controllers/categoria.php?op=combo_equipo", {ID_Almacen: ID_Almacen}, function(data) {
                    $('#ID_equipo').html(data);
                    resolve(); // Resuelve la promesa cuando los datos se han cargado
                });
            }).change();
        });
        promise.then(function() {
            $('#ID_equipo').val(data.ID_equipo).trigger('change');
        });
        
        $('#Descripcion').val(data.Descripcion);
        $('#ID_marca').val(data.ID_marca).trigger('change');
        $('#ID_modelo').val(data.ID_modelo).trigger('change');
        $('#Numero_serie').val(data.Numero_serie);
        $('#Codigo_isil').val(data.Codigo_isil);
        $('#Cantidad').val(data.Cantidad);
        if (data.Imagen) {
            $('#Imagen').attr('src', 'data:image/*;base64,' + data.Imagen);
        } else {
            // Si no hay imagen, muestra una imagen predeterminada.
            $('#Imagen').attr('src', '../../assets/img/pendiente.jpg');
        }
        $('#ID_usuario').val(data.ID_usuario);
        $('#ID_operatividad').val(data.ID_operatividad).trigger('change');
        $('#Observaciones').val(data.Observaciones);
    });

    $('#modalreporte').modal('show');
}




init();