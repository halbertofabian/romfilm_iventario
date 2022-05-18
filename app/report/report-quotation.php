<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['qton_id'])) {
    require_once DOCUMENT_ROOT . 'app/modules/quotation/quotation.model.php';
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

    $quotations_list = QuotationModel::mdlGetAllQuotationById(base64_decode($_GET['qton_id']));
    $subtotal = number_format($quotations_list["qton_subtotal"], 2);
    $descuento = number_format($quotations_list["qton_discount"], 2);
    $costo_envio = number_format($quotations_list["qton_shipping_charges"], 2);
    $ajuste = number_format($quotations_list["qton_adjust"], 2);
    $total = number_format($quotations_list["qton_total"], 2);
    $qton_details = json_decode($quotations_list['qton_details'], true);

    $client = ClientsModel::mdlGetAllClientsByID($quotations_list["qton_cts_id"]);

    //ENCABEZADO
    $header = <<<EOF
        <table style="padding-bottom: 20px; width:100%">
                <tr>
                    <td style="text-align: left;">
                        <img src="{$logo}" width="200" /><br>
                    </td>
                    <td style="text-align:right;">
                        <font style="font-size: 30px;">Cotización</font>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:right; width: 100%">
                        <font style="font-size: 12px;"><strong>Cliente:</strong> $client[cts_name_contact]</font><br>
                        <font style="font-size: 12px;"><strong>Telefono:</strong> $client[cts_phone_mobile]</font><br>
                        <font style="font-size: 12px;"><strong>Whatsapp:</strong> $client[cts_whatsapp]</font>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left; width:50%">
                        <font style="font-size: 12px;"><strong>Marca:</strong> $quotations_list[qton_mark]</font><br>
                        <font style="font-size: 12px;"><strong>Color:</strong> $quotations_list[qton_colour]</font><br>
                        <font style="font-size: 12px;"><strong>Modelo:</strong> $quotations_list[qton_model]</font><br>
                        <font style="font-size: 12px;"><strong>Placas:</strong> $quotations_list[qton_plates]</font>
                    </td>
                    <td style="text-align:right;width:50%">
                        <font style="font-size: 12px;"><strong>Fecha de cotizacion:</strong> $quotations_list[qton_start_date]</font><br>
                        <font style="font-size: 12px;"><strong>Fecha de vencimiento:</strong> $quotations_list[qton_end_date]</font>
                    </td>
                </tr>
        </table>
       
    EOF;
    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);
    $count = 0;
    foreach ($qton_details as $detail) {
        $count++;
        $art_name = explode("|", $detail["art_name"]);
        $tarifa = number_format($detail["tarifa"], 2);
        $importe = number_format($detail["importe"], 2);
        $quotations .= <<<EOF
        <tr style="border-bottom: 1pt solid black;">
            <td>
                $count
            </td>
            <td>
                <strong>$art_name[0]</strong><br>$art_name[1]
            </td>
            <td>
                $detail[cantidad]
            </td>
            <td>
                $tarifa
            </td>
            <td>
                $importe
            </td>
        </tr>    

EOF;
    }

    $qton_body = <<<EOF
<table style="padding: 5px; width: 100%; text-align:center" border="1">
    <thead>
        <tr style="background-color: #000000; color: white; font-weight:bold;">
            <th>#</th>
            <th>Articulo y descripción</th>
            <th>Cant.</th>
            <th>Tarifa</th>
            <th>Importe</th>
        </tr>
    </thead>
    <tbody>
    $quotations
    </tbody>
</table>
<br>
EOF;

    $pdf->writeHTMLCell(0, 0, '', '', $qton_body, 0, 1, 0, true, '', true);
    $qton_body2 = <<<EOF
<table style="padding: 5px; width: 100%;">
    <tr>
        <td colspan="4" align="right"><strong>Subtotal:</strong></td>
        <td>$subtotal</td>
    </tr>
    <tr>
        <td colspan="4" align="right"><strong>Descuento:</strong></td>
        <td>$descuento</td>
    </tr>
    <tr>
        <td colspan="4" align="right"><strong>Costo envio:</strong></td>
        <td>$costo_envio</td>
    </tr>
    <tr>
        <td colspan="4" align="right"><strong>$quotations_list[qton_adjust_name]:</strong></td>
        <td>$ajuste</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right" style="background-color: #f8f9fa;font-weight:bold;"><strong>Total:</strong></td>
        <td style="background-color: #f8f9fa;font-weight:bold;">$total</td>
    </tr>
</table>
<br>
EOF;

    $pdf->writeHTMLCell(0, 0, '', '', $qton_body2, 0, 1, 0, true, '', true);
    $qton_nota = <<<EOF
<table style="padding: 5px; width: 100%;">
    <tr>
        <td colspan="5"><strong>Notas:</strong></td>
    </tr>
    <tr>
        <tdcolspan="5">$quotations_list[qton_client_notes]</td>
    </tr>
    <tr>
        <td colspan="5"><strong>Terminos y condiciones:</strong></td>
    </tr>
    <tr>
        <tdcolspan="5">$quotations_list[qton_terms_and_conditions]</td>
    </tr>
</table>
<br>
EOF;

    $pdf->writeHTMLCell(0, 0, '', '', $qton_nota, 0, 1, 0, true, '', true);


    ob_end_clean();

    $registro = str_replace(".", "", "prueba");
    $pdf->Output($registro . '.pdf', 'I');
}
