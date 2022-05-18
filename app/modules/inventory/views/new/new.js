$("#formNewInventory").on("submit", function (e) {
    e.preventDefault()
    swal({
        title: "¿Estas seguro de querer importar la lista de productos?",
        text: "Asegurate de tener el archivo con los requerimientos solicitados",
        icon: "info",
        buttons: ["Calcelar", "Si, importar lista"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData(this);
                var files = $("#input_file")[0].files[0];
                datos.append("archivoExcel", files);
                datos.append("btnImportProducts", true);
                $.ajax({
                    url: urlApp + 'app/modules/inventory/inventory.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {
                        startLoadButton()
                    },
                    success: function (respuesta) {
                        stopLoadButton('Redirigiendo...')

                        if (respuesta.status) {

                            swal({
                                title: respuesta.mensaje,
                                text: "Se registraron " + respuesta.insert + " productos",
                                icon: "success",
                                buttons: [false, "Ver lista"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = urlApp + "inventory/list"
                                    } else {
                                        window.location.href = urlApp + "inventory/list"

                                    }
                                })

                        } else {

                            swal({
                                title: "Error",
                                text: respuesta.mensaje,
                                icon: "error",
                                buttons: [false, "Intentar de nuevo"],
                                dangerMode: true,
                            })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = "./productos"
                                    } else {
                                        window.location.href = "./productos"

                                    }
                                })

                        }

                    }
                })
            }
        });
})
