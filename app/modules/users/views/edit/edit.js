
$("#FormEditUsers").on("submit", function (e) {
    e.preventDefault();
    swal({
        title: "¿Esta seguro de editar este usuario?",
        icon: "warning",
        buttons: ['No', 'Si, editar usuario'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData(this);
               
                datos.append("btnUpdateUsers", true)
                $.ajax({
                    url: urlApp + 'app/modules/users/users.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                    },
                    success: function (res) {
                        if (res.status) {
                            // $(clicked).closest('tr').remove();
                            swal({
                                title: "¡Bien!", text: res.message, type: "success", icon: "success"
                            }).then(function () {
                                window.location.href= urlApp+"users/list"
                            });

                        } else {
                            swal("¡Error!", res.message, "error");
                        }
                    }
                })
            }
        });
});