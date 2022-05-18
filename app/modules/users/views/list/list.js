
$(document).on("click", ".btnDeleteUser", function () {
    var usr_id = $(this).attr("user_id");
    var usr_status = $(this).attr("user_status");
    if(usr_status==1){
        var action = "activar"
    }else{
        var action= "desactivar"
    }
    swal({
        title: "¿Esta seguro de "+action+ " este usuario?",
        text: "Esta accion no es reversible",
        icon: "warning",
        buttons: ['No', `Si, ${action} usuario`],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("usr_id", usr_id)
                datos.append("usr_status", usr_status)
                datos.append("btnDeleteUsers", true)
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
                                location.reload();
                            });

                        } else {
                            swal("¡Error!", res.message, "error");
                        }
                    }
                })
            }
        });
});

$("#btnUpdatePassword").on("click", function () {
    var password1 = $("#password1").val();
    var password2 = $("#password2").val();

    if (password1 == ""){
        toastr.warning("Los campos son obligatorios", "Error");
        return;
    }
    if (password2 == ""){
        toastr.warning("Los campos son obligatorios", "Error");

        return;
    }

    

    swal({
        title: "¿Esta seguro de editar la contraseña de este usuario?",
        icon: "warning",
        buttons: ['No', 'Si, cambiar contraseña'],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();
                datos.append("usr_id", $('#usr_hiden_id').val())
                datos.append("usr_password1", password1)
                datos.append("usr_password2", password2)

                datos.append("btnUpdatePassword", true)
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
                                location.reload();
                            });

                        } else {
                            swal("¡Error!", res.message, "error");
                        }
                    }
                })
            }
        });
});



$('.btnEditPassword').on("click", function () {
    var usr_id = $(this).attr("usr_id")
    $("#usr_hiden_id").val(usr_id)
});
