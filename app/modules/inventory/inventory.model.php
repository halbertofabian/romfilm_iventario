
<?php
/**
 *  Desarrollador: 
 *  Fecha de creación: 17/05/2022 14:34
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

require_once DOCUMENT_ROOT . "app/modules/appframework/conexion.softmor.php";

class InventoryModel
{
    public static function mdlAddInventory()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlImportInventory($mca)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_mercancia_mca(mca_codigo, mca_descripcion, mca_existencia, mca_existencia_fisica,
            mca_categoria, mca_almacen, mca_inventario, mca_costo, mca_precio_publico) VALUES (?,?,?,?,?,?,?,?,?)";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $mca['mca_codigo']);
            $pps->bindValue(2, $mca['mca_descripcion']);
            $pps->bindValue(3, $mca['mca_existencia']);
            $pps->bindValue(4, $mca['mca_existencia_fisica']);
            $pps->bindValue(5, $mca['mca_categoria']);
            $pps->bindValue(6, $mca['mca_almacen']);
            $pps->bindValue(7, $mca['mca_inventario']);
            $pps->bindValue(8, $mca['mca_costo']);
            $pps->bindValue(9, $mca['mca_precio_publico']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlAddCommodity($ivt)
    {
        try {
            //code...
            $sql = "INSERT INTO tbl_inventario_ivt(ivt_nombre, ivt_fecha) VALUES(?,?)";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ivt['ivt_nombre']);
            $pps->bindValue(2, $ivt['ivt_fecha']);
            $pps->execute();
            return $con->lastInsertId();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlUpdateInventory($mca)
    {
        try {
            //code...
            $sql = "UPDATE tbl_mercancia_mca
            SET mca_descripcion=?, mca_existencia=?, mca_existencia_fisica=?, mca_categoria=?, mca_almacen=?, mca_inventario=?, 
            mca_costo=?, mca_precio_publico=? WHERE mca_codigo=?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $mca['mca_descripcion']);
            $pps->bindValue(2, $mca['mca_existencia']);
            $pps->bindValue(3, $mca['mca_existencia_fisica']);
            $pps->bindValue(4, $mca['mca_categoria']);
            $pps->bindValue(5, $mca['mca_almacen']);
            $pps->bindValue(6, $mca['mca_inventario']);
            $pps->bindValue(7, $mca['mca_costo']);
            $pps->bindValue(8, $mca['mca_precio_publico']);
            $pps->bindValue(9, $mca['mca_codigo']);
            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetAllInventory()
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_mercancia_mca";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetInventoryByCode($mca_codigo)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_mercancia_mca WHERE mca_codigo = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $mca_codigo);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlGetInventoryById($ivt_id)
    {
        try {
            //code...
            $sql = "SELECT * FROM tbl_inventario_ivt WHERE ivt_id = ?";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ivt_id);
            $pps->execute();
            return $pps->fetch();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
    public static function mdlEliminarInventory()
    {
        try {
            //code...
            $sql = "";
            $con = ConexionSoftmor::conectar();
            $pps = $con->prepare($sql);

            $pps->execute();
            return $pps->rowCount() > 0;
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
