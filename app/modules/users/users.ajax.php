
<?php

/**
 *  Desarrollador: 
 *  Fecha de creación: 30/03/2022 16:56
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modules/users/users.model.php';
require_once DOCUMENT_ROOT . 'app/modules/users/users.controller.php';
require_once DOCUMENT_ROOT . 'app/modules/appframework/appframework.controller.php';
class UsersAjax
{
    public function ajaxNewUsers()
    {
        $res = UsersControlador::ctrAddUsers();
        echo json_encode($res, true);
    }
    public function ajaxUpdateUsers()
    {
        $res = UsersControlador::ctrEditUsers();
        echo json_encode($res, true);
    }
    public function ajaxDeleteUsers()
    {
        $res = UsersControlador::ctrDeleteUser($_POST);
        echo json_encode($res, true);
    }
    public function ajaxUpdatePassword()
    {
        $res = UsersControlador::ctrUpdatePassword($_POST);
        echo json_encode($res, true);
    }
    public function ajaxLoginUser()
    {
        $res = UsersControlador::ctrLoginUser($_POST);
        echo json_encode($res, true);
    }
    public function ajaxListVendors()
    {
        $res = UsersModel::mdlGetAllUserVendors();
        echo json_encode($res, true);
    }
}

if (isset($_POST['btnNewUsers'])) {
    $newUsuario = new UsersAjax();
    $newUsuario->ajaxNewUsers();
}

if(isset($_POST['btnUpdateUsers'])){
    $updateUser = new UsersAjax();
    $updateUser->ajaxUpdateUsers();
}
if (isset($_POST['btnDeleteUsers'])) {
    $deleteUsers = new UsersAjax();
    $deleteUsers->ajaxDeleteUsers();
}
if (isset($_POST['btnUpdatePassword'])) {
    $updatePassword = new UsersAjax();
    $updatePassword->ajaxUpdatePassword();
}
if (isset($_POST['btnLoginUser'])) {
    $loginUser = new UsersAjax();
    $loginUser->ajaxLoginUser();
}
if (isset($_POST['btnListVendors'])) {
    $listVendors = new UsersAjax();
    $listVendors->ajaxListVendors();
}
