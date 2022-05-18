<?php
class UsersControlador
{
    public static function ctrAddUsers()
    {
        $usr_full_name = $_POST['usr_full_name'];
        $usr_profile = $_POST['usr_profile'];
        $usr_email = $_POST['usr_email'];
        $usr_password = $_POST['usr_password'];
        $usr_phone = $_POST['usr_phone'];

        $res_get_email = UsersModel::mdlGetEmailUser($usr_email);
        if ($res_get_email) {
            return array(
                'status' => false,
                'message' => 'El correo ' . $usr_email . ' ya existe, por favor intente con otro.'
            );
        } else {
            $data = array(
                'usr_full_name' => $usr_full_name,
                'usr_profile' => $usr_profile,
                'usr_email' => $usr_email,
                'usr_password' => crypt($usr_password, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'),
                'usr_date_log' => DATE_TIME,
                'usr_last_login' => '0000-00-00 00:00:00',
                'usr_avatar' => '',
                'usr_token' => '',
                'usr_phone' => $usr_phone
            );

            $res = UsersModel::mdlNewUser($data);
            if ($res) {
                return array(
                    'status' => true,
                    'message' => 'El usuario fue creado con exito!'
                );
            } else {
                return array(
                    'status' => false,
                    'message' => 'Hubo un error al crear el usuario.'
                );
            }
        }
    }


    public static function ctrEditUsers()
    {
        $usr_id = $_POST['usr_id'];
        $usr_full_name = $_POST['usr_full_name'];
        $usr_profile = $_POST['usr_profile'];
        $usr_email = $_POST['usr_email'];
        $usr_phone = $_POST['usr_phone'];


        $data = array(
            'usr_full_name' => $usr_full_name,
            'usr_profile' => $usr_profile,
            'usr_email' => $usr_email,
            'usr_phone' => $usr_phone,
            'usr_id' => $usr_id
        );

        $res = UsersModel::mdlUpdateUser($data);
        if ($res) {
            return array(
                'status' => true,
                'message' => 'El usuario fue actualizado con éxito'
            );
        } else {
            return array(
                'status' => false,
                'message' => 'Hubo un error al actualizar el usuario'
            );
        }
    }

    public static function ctrDeleteUser()
    {

        $usr_id = $_POST['usr_id'];
        $usr_status = $_POST['usr_status'];
        $res = UsersModel::mdlDeleteUser($usr_id, $usr_status);

        if ($res) {
            return array(
                'status' => true,
                'message' => 'Operación realizada con éxito'
            );
        } else {
            return array(
                'status' => false,
                'message' => 'Hubo un error al eliminar el usuario'
            );
        }
    }
    public static function ctrUpdatePassword()
    {

        $usr_id = $_POST['usr_id'];
        $password1 = $_POST['usr_password1'];
        $password2 = $_POST['usr_password2'];


        if ($password1 != $password2) {
            return array(
                'status' => false,
                'message' => 'Las contraseñas no coinciden'
            );
        } else {
            $password1 = crypt($password1, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            $res = UsersModel::mdlUpdatePassword($usr_id, $password1);

            if ($res) {
                return array(
                    'status' => true,
                    'message' => 'La contraseña se actualizo correctamente!'
                );
            } else {
                return array(
                    'status' => false,
                    'message' => 'Hubo un error al actualizar la contraseña.'
                );
            }
        }
    }
    static public function ctrLoginUser()
    {
        $usuario = trim($_POST["usr_id"]);
        $password = crypt($_POST["usr_password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        $usr = UsersModel::mdlLoginUsers($usuario);
        if (!$usr) {
            return array(
                'status' => false,
                'message' => 'Usuario o contraseña incorrectos, intenta de nuevo'
            );
        }
        if ($usr["usr_password"] == $password) {
            if ($usr["usr_status"] == 1) {
                $_SESSION["session_start"] = true;
                $_SESSION['session_usr'] = $usr;
                //header('Location:' . HTTP_HOST);
                return array(
                    'status' => true
                );
            } else {
                return array(
                    "status" => false,
                    'message' => 'Tu usuario fue desactivado por los administradores del negocio'
                );
            }
        } else {
            return array(
                "status" => false,
                'message' => 'Usuario o contraseña incorrecto, intente de nuevo'
            );
        }
    }
}
