<?php
require_once DOCUMENT_ROOT . "app/modules/appframework/conexion.softmor.php";

class UsersModel
{
    public static function mdlNewUser($usr)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_users_usr(usr_full_name, usr_profile, usr_email, usr_password, usr_date_log, usr_last_login, usr_avatar, usr_token, usr_phone) VALUES(?,?,?,?,?,?,?,?,?)";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr['usr_full_name']);
            $pps->bindValue(2, $usr['usr_profile']);
            $pps->bindValue(3, $usr['usr_email']);
            $pps->bindValue(4, $usr['usr_password']);
            $pps->bindValue(5, $usr['usr_date_log']);
            $pps->bindValue(6, $usr['usr_last_login']);
            $pps->bindValue(7, $usr['usr_avatar']);
            $pps->bindValue(8, $usr['usr_token']);
            $pps->bindValue(9, $usr['usr_phone']);
            $pps->execute();
            // return $pps->errorInfo();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlUpdateUser($usr)
    {
        try {
            //code...
            $sql = "UPDATE tbl_users_usr SET usr_full_name = ?, usr_profile = ?, usr_email = ?, usr_phone = ? WHERE usr_id = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr['usr_full_name']);
            $pps->bindValue(2, $usr['usr_profile']);
            $pps->bindValue(3, $usr['usr_email']);
            $pps->bindValue(4, $usr['usr_phone']);
            $pps->bindValue(5, $usr['usr_id']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetEmailUser($usr_email)
    {
        try {
            //code...
            $sql = "SELECT usr_email FROM tbl_users_usr WHERE usr_email = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_email);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlLoginUsers($user)
    {

        try {
            //code...
            $sql = "SELECT * FROM tbl_users_usr WHERE usr_id = ? OR usr_email = ? OR usr_phone = ? ";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $user);
            $pps->bindValue(2, $user);
            $pps->bindValue(3, $user);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetAllUsers($profile = "")
    {
        try {
            //code...
            if ($profile == 1) {


                $sql = "SELECT * FROM tbl_users_usr  ORDER BY usr_id DESC";
                $con = ConexionSoftmor::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            } else {
                $sql = "SELECT * FROM tbl_users_usr WHERE usr_status = 1 and usr_profile != 1 ORDER BY usr_id DESC";
                $con = ConexionSoftmor::conectar();
                $pps = $con->prepare($sql);
                $pps->execute();
                return $pps->fetchAll();
            }
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetAllUsersByID($usr_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_users_usr WHERE usr_id = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlDeleteUser($usr_id, $usr_status)
    {
        try {
            //Funcion que activa y desactiva
            $sql = "UPDATE tbl_users_usr SET usr_status = ? WHERE usr_id = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $usr_status);
            $pps->bindValue(2, $usr_id);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlUpdatePassword($usr_id, $password)
    {
        try {
            //code...
            $sql = "UPDATE tbl_users_usr SET usr_password = ? WHERE usr_id = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $password);
            $pps->bindValue(2, $usr_id);
            $pps->execute();
            return $pps->rowCount() > 0;
            //return $pps->errorInfo();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetAllUserVendors()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_users_usr WHERE usr_status = 1 AND usr_profile = 5 ORDER BY usr_id DESC";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
            return false;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
