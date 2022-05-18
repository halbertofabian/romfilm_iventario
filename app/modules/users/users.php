<?php
$app->showView2(
    array(
        1 => array(
            'page' => 'list',
                             // link     //text      // text page pricipal
            'header_page' => ['users', 'Usuarios', 'Lista de usuarios']
        ),
        2 => array(
            'page' => 'edit',
            'header_page' => ['users', 'Usuarios', 'Editar usuarios']
        ),
        3 => array(
            'page' => 'new',
            'header_page' => ['users', 'Usuarios', 'Agregar nuevo usuario']
        ),
        4 => array(
            'page' => 'logout',
            'header_page' => ['users', 'Usuarios', 'Agregar nuevo usuario']
        ),
    ),
    "users",  // Module
    'list' // Default Page
);
