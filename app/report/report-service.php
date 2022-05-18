<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['srv_id'])) {
    require_once DOCUMENT_ROOT . 'app/modules/services/services.model.php';
    require_once DOCUMENT_ROOT . 'app/modules/clients/clients.model.php';
    require_once('../libs/TCPDF/tcpdf.php');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('');
    $pdf->SetTitle('');
    $pdf->SetSubject('');
    $pdf->SetKeywords('');



    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 9, '', true);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage('P');

    $logo = HTTP_HOST . 'app/assets/img/rafa_detallado/logo.png';

    $services = ServicesModel::mdlGetAllServicesById(base64_decode($_GET['srv_id']));
    $srv_total_service = number_format($services["srv_total_service"], 2);
    $srv_services = json_decode($services['srv_services'], true);

    $client = ClientsModel::mdlGetAllClientsByID($services["srv_cts_id"]);

    //ENCABEZADO
    $header = <<<EOF
        <table style="padding-bottom: 20px;">
                <tr>
                    <td style="text-align: left;">
                        <img src="{$logo}" width="200" /><br>
                    </td>
                    <td style="text-align:right;">
                        <font style="font-size: 14px;">Folio <b style="color:red;">$services[srv_invoice]</b></font><br>
                        <font style="font-size: 10px;">Manuel J. Clouthier #815<br>Jardines de Guadalupe<br>C.P. 45030 Zapopan, Jal.</font><br>
                        <font style="font-size: 10px;">Tel: 3620-2337 Cel: 33-2272-0199</font>
                    </td>
                </tr>
                <tr>
                    <td>
                        <font style="font-size: 12px;"><strong>Cliente:</strong> $client[cts_name_contact]</font><br>
                        <font style="font-size: 12px;"><strong>Telefono:</strong> $client[cts_phone_mobile]</font><br>
                        <font style="font-size: 12px;"><strong>Fecha de recibido:</strong> $services[srv_date_received]</font><br>
                        <font style="font-size: 12px;"><strong>Fecha de entrega:</strong> $services[srv_date_delivery]</font>
                        
                    </td>
                    <td style="text-align:right;">
                        <font style="font-size: 12px;"><strong>Marca:</strong> $services[srv_mark]</font><br>
                        <font style="font-size: 12px;"><strong>Color:</strong> $services[srv_colour]</font><br>
                        <font style="font-size: 12px;"><strong>Modelo:</strong> $services[srv_model]</font><br>
                        <font style="font-size: 12px;"><strong>Placas:</strong> $services[srv_plates]</font>
                    </td>
                </tr>
        </table>
       
    EOF;
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);
    foreach ($srv_services as $service) {
        $precio = number_format($service['precio'], 2);
        $tbl_services .= <<<EOF
        <tr>
            <td style="border: 1px solid black;">
                $service[servicio]
            </td>
            <td style="border: 1px solid black;">
                $service[descripcion]
            </td>
            <td style="border: 1px solid black;">
                $precio
            </td>
            <td style="border: 1px solid black;">
                $service[observaciones]
            </td>
        </tr>    

EOF;
    }

    $srv_body = <<<EOF
<table style="padding: 5px; width: 100%; text-align:center">
    <thead>
        <tr style="background-color: #000000; color: white; font-weight:bold;">
            <th>Servicio</th>
            <th>Descripción.</th>
            <th>Precio</th>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
    $tbl_services
    </tbody>
    <tfoot>
        <tr>
            <td style="border: 1px solid black;" colspan="2" align="right"><strong>Total:</strong></td>
            <td style="border: 1px solid black;"><strong>$srv_total_service</strong></td>
            <td></td>
        </tr>
    </tfoot>
</table>
EOF;

    $pdf->writeHTMLCell(0, 0, '', '', $srv_body, 0, 1, 0, true, '', true);

    $imagen =  $logo = HTTP_HOST . 'app/assets/img/rafa_detallado/rafa-detallado.jpg';


    $firma = <<<EOF
    
    <table style="padding-top:30px; ">
        <thead>
            <tr>
                <td style="text-align: left;">
                    <img src="{$imagen}"  /><br>
                </td>
                <td>
                    <h3 style="text-align:center;">Importante</h3>
                    <p style="text-align: left;">
                        1.-Después del primer día de terminado el trabajo se cobrará pensión.<br>
                        2.-La empresa no se hace responsable por objetosde valor no reportados u olvidadosen el interior del vehículo.<br>
                        3.-La empresa no se hace responsable del robo total o parcial de su vehículo, aclarando que los vehículos deberán estar asegurados.<br>
                        4.-La empresa se hace responsable por colisiones ocasionados por nuestro personal, aclarando que los vehículos no asegurados tendran sus limitantes como rigen los acuerdos de las compañías aseguradoras.<br>
                        5.-La empresa no se hace responsable por fallas mecánicas y/o eléctricas.<br>
                        6.-La empresa no se hace responsable de cualquier daño ocurrido en caso de un siniestro natural.<br>
                        7.-Una vez entregado el vehículo no se aceptan reclamaciones.<br>
                        8.-Las cláusulas anteriores quedan aceptadas en el momento de recibir su vehículo.
                    </p>
                </td>
            </tr>
            <tr>
                <td></td>
                <td style="text-align: center;" colspan="2">
                    <p style="border-top: 1px solid #000;">Firma de Confirmado</p>
                </td>
            </tr>
        </thead>
    </table>
 
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $firma, 0, 1, 0, true, '', true);

    ob_end_clean();

    $registro = str_replace(".", "", "Servicio-$services[srv_invoice]");
    $pdf->Output($registro . '.pdf', 'I');
}
