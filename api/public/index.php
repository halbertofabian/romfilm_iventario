<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../../config.php';
require '../vendor/autoload.php';
require '../src/config/db.php';

// Requerir controlador y modelo de contratos 


require_once '../../app/modules/users/users.model.php';





$app = new \Slim\App([
    'settings' => [
        'addContentLengthHeader' => false
    ]
]);

// ['settings' => ['' => true]]


$app->post('/loginAppRomfilm', function (Request $request, Response $response) {
    $json = $request->getBody();

    $usr = json_decode($json, true);

    $login_msj =  UsersControlador::ctrLoginAppUser($usr);


    return json_encode($login_msj, true);

    # code...

});



$app->run();
