$("#FormNewUsers").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnNewUsers", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modules/users/users.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (res) {

            if (res.status) {
                toastr.success(res.message, "Muy bien");
                setTimeout(() => {
                    window.location.href = "list"
                }, 1000)

            } else {
                toastr.error(res.message, "Error");

            }

        }
    })


});