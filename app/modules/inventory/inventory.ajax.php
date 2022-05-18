
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


include_once '../../../config.php';

require_once DOCUMENT_ROOT . 'app/modules/inventory/inventory.model.php';
require_once DOCUMENT_ROOT . 'app/modules/inventory/inventory.controller.php';
require_once DOCUMENT_ROOT . 'app/modules/appframework/appframework.controller.php';

require_once DOCUMENT_ROOT . 'app/libs/PHPExcel/Classes/PHPExcel/IOFactory.php';
require_once DOCUMENT_ROOT . 'app/libs/PHPExcel/Classes/PHPExcel.php';
require_once DOCUMENT_ROOT . 'app/libs/PHPExcel/Classes/PHPExcel/Writer/Excel5.php';
class InventoryAjax
{
    public function ajaxImportProducts()
    {
        $respuesta = InventoryController::ctrAddInventory();
        echo json_encode($respuesta, true);
    }
}
if (isset($_POST['btnImportProducts'])) {
    $importProducts = new InventoryAjax();
    $importProducts->ajaxImportProducts();
}
