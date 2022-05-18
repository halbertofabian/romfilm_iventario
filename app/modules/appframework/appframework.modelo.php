
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 30/03/2022 12:18
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.ifixit.php";
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.softmor.php";

class AppFrameWorkModelo
{
    public static function mdlAgregarAppFrameWork()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlActualizarAppFrameWork()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlMostrarAppFrameWork()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps ->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarAppFrameWork()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionIfixit::conectar();
            $pps = $con->prepare($sql);

            $pps -> execute();
            return $pps -> rowCount()>0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}


