
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
class InventoryController
{
    public static function ctrAddInventory()
    {
        try {
            $ivt_nombre = strtoupper($_POST['ivt_nombre']);
            $ivt_fecha = $_POST['ivt_fecha'];

            $ivt = array(
                "ivt_nombre" => $ivt_nombre,
                "ivt_fecha" => $ivt_fecha,
            );

            $mca_inventario = InventoryModel::mdlAddCommodity($ivt);

            if ($mca_inventario) {

                $nombreArchivo = $_FILES['archivoExcel']['tmp_name'];
                // Cargar hoja de calculo
                $leerExcel = PHPExcel_IOFactory::createReaderForFile($nombreArchivo);
                $objPHPExcel = $leerExcel->load($nombreArchivo);
                //var_dump($objPHPExcel);
                $objPHPExcel->setActiveSheetIndex(0);
                $numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
                $countInsert = 0;
                $countUpdate = 0;
                //echo "NumRows => ",$objPHPExcel->getActiveSheet()->getCell('B' . 2)->getCalculatedValue();


                for ($i = 2; $i <= $numRows; $i++) {
                    $mca_codigo = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
                    $mca_descripcion = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
                    $mca_existencia = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
                    $mca_existencia_fisica = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
                    $mca_categoria = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
                    $mca_almacen = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
                    $mca_costo = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
                    $mca_precio_publico = $objPHPExcel->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
                    //Buscar si existe el registro
                    // $mca = InventoryModel::mdlGetInventoryByCode($mca_codigo);
                    //En caso de que producto exista
                    // if ($mca != null) {
                    //     $mca_descripcion =  $mca_descripcion == ""  ? $mca['mca_descripcion']   :   $mca_descripcion;
                    //     $mca_existencia =  $mca_existencia == ""  ? $mca['mca_existencia']   :   $mca_existencia;
                    //     $mca_existencia_fisica =  $mca_existencia_fisica == ""  ? $mca['mca_existencia_fisica']   :   $mca_existencia_fisica;
                    //     $mca_categoria =  $mca_categoria == ""  ? $mca['mca_categoria']   :   $mca_categoria;
                    //     $mca_almacen =  $mca_almacen == ""  ? $mca['mca_almacen']   :   $mca_almacen;
                    //     $mca_costo =  $mca_costo == ""  ? $mca['mca_costo']   :   $mca_costo;
                    //     $mca_precio_publico =  $mca_precio_publico == ""  ? $mca['pds_mca_precio_publico']   :   $mca_precio_publico;
                    // } else {
                    $mca_codigo = $mca_codigo;
                    $mca_descripcion = $mca_descripcion;
                    $mca_existencia =  $mca_existencia == ""  ? 0  :   $mca_existencia;
                    $mca_existencia_fisica =   $mca_existencia_fisica == ""  ? ""  :   $mca_existencia_fisica;
                    $mca_categoria =  $mca_categoria;
                    $mca_almacen =  $mca_almacen;
                    $mca_costo =  $mca_costo == ""  ? 0  :   $mca_costo;
                    $mca_precio_publico =  $mca_precio_publico == ""  ? 0  :   $mca_precio_publico;
                    // }

                    $data = array(
                        "mca_codigo" => $mca_codigo,
                        "mca_descripcion" => $mca_descripcion,
                        "mca_existencia" => $mca_existencia,
                        "mca_existencia_fisica" => $mca_existencia_fisica,
                        "mca_categoria" => $mca_categoria,
                        "mca_almacen" => $mca_almacen,
                        "mca_inventario" => $mca_inventario,
                        "mca_costo" => $mca_costo,
                        "mca_precio_publico" => $mca_precio_publico,
                    );

                    // if ($mca != null) {
                    //     //actualizar
                    //     $actualizar = InventoryModel::mdlUpdateInventory($data);

                    //     if ($actualizar) {
                    //         $countUpdate += 1;
                    //     }
                    // } else {
                    //insertar
                    $insert = InventoryModel::mdlImportInventory($data);

                    if ($insert) {
                        $countInsert += 1;
                    }
                    // }
                }
                return array(
                    'status' => true,
                    'mensaje' => "Carga de productos con éxito",
                    'insert' =>  $countInsert,
                    'update' => $countUpdate
                );
            }
        } catch (Exception $th) {
            $th->getMessage();
            return array(
                'status' => false,
                'mensaje' => "No se encuentra el archivo solicitado, por favor carga el archivo correcto",
                'insert' =>  "",
                'update' => ""
            );
        }
    }
    public static function ctrActualizarInventory($data)
    {
        $contSubir = 0;

        // $datos = json_decode(json_encode($data, true), true);

        // return $datos;

        foreach ($data as $key => $mca) {

            $subir = InventoryModel::mdlUpdateCommodity($mca['mca_id'], $mca['mca_existencia_fisica']);

            if ($subir) {
                $contSubir++;
            }
        }

        return  array(
            'status' => true,
            'mensaje' => $contSubir . ' productos se actualizarón'
        );
    }
    public function ctrMostrarInventory()
    {
    }
    public function ctrEliminarInventory()
    {
    }
}
