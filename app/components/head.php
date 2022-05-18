<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>RomFilm</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= HTTP_HOST . 'app/' ?>assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= HTTP_HOST . 'app/' ?>assets/img/romfilm/logo_white.jpeg">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= HTTP_HOST . 'app/' ?>assets/img/romfilm/logo_white.jpeg">
    <link rel="shortcut icon" type="image/x-icon" href="<?= HTTP_HOST . 'app/' ?>assets/img/romfilm/logo_white.jpeg">
    <link rel="manifest" href="<?= HTTP_HOST . 'app/' ?>assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="<?= HTTP_HOST . 'app/' ?>assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/config.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/style-global.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/toastr.min.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/rich-text/richtext.min.css" rel="stylesheet">

    <!-- Autocomplete -->
    <link href="<?= HTTP_HOST ?>app/assets/css/autocomplete/jquery-ui.css" rel="stylesheet" />
    <link href="<?= HTTP_HOST ?>app/assets/css/autocomplete/jquery-ui.theme.css" rel="stylesheet" />

    <!-- Data table -->

    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>assets/css/data-tables/dataTables.bootstrap5.css" />
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>assets/css/data-tables/buttons.bootstrap5.css" />
    <link rel="stylesheet" type="text/css" href="<?= HTTP_HOST . 'app/' ?>assets/css/data-tables/responsive.bootstrap5.css" />

    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/select2.min.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/select2-bootstrap-5-theme.min.css" rel="stylesheet">
    <link href="<?= HTTP_HOST . 'app/' ?>assets/css/select2-bootstrap-5-theme.rtl.min.css" rel="stylesheet">

    <!-- Summernote -->
    <link href="<?= HTTP_HOST . 'app/' ?>assets/plugin/summernote/summernote-bs4.css" rel="stylesheet">

    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/jquery.min.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/toastr.min.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/sweetalert.min.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/select2.min.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/jquery.number.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/rich-text/jquery.richtext.min.js"></script>

    <!-- Autocomplete -->
    <script src="<?= HTTP_HOST  ?>app/assets/css/autocomplete/jquery-ui.js"></script>

    <!-- Data tables -->
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/jquery.dataTables.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/dataTables.bootstrap5.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/dataTables.buttons.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/buttons.bootstrap5.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/buttons.html5.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/dataTables.responsive.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/responsive.bootstrap5.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/jszip.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/pdfmake.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>assets/js/data-tables/vfs_fonts.js"></script>

    <!-- Summernote -->
    <script src="<?= HTTP_HOST . 'app/' ?>assets/plugin/summernote/summernote-bs4.min.js"></script>
    <script src="<?= HTTP_HOST . 'app/' ?>vendors/tinymce/tinymce.min.js"></script>

</head>