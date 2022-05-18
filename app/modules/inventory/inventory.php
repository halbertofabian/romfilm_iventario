<?php
$app->showView2(
    array(
        1 => array(
            'page' => 'list',
                             // link     //text      // text page pricipal
            'header_page' => ['inventory', 'Inventario', 'Lista de inventario']
        ),
        2 => array(
            'page' => 'edit',
            'header_page' => ['inventory', 'Inventario', 'Editar inventario']
        ),
        3 => array(
            'page' => 'new',
            'header_page' => ['inventory', 'Inventario', 'Agregar nuevo inventario']
        ),
    ),
    "inventory",  // Module
    'list' // Default Page
);
