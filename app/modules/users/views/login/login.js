$("#formLogin").on('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append('btnLoginUser', true)
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
            if(res.status){
                window.location.reload()
            }
            else {
                toastr.error(res.message, "Verifica tus datos");
            }
        }
    })
})