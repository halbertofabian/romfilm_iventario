<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require_once '../../config.php';
require '../vendor/autoload.php';
require '../src/config/db.php';


require_once '../../app/modules/users/users.controller.php';
require_once '../../app/modules/users/users.model.php';

require_once '../../app/modules/inventory/inventory.controller.php';
require_once '../../app/modules/inventory/inventory.model.php';





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

$app->get('/obtener_mercancia/{ivt_id}', function (Request $request, Response $response, array $args) {
    $ivt_id =  $args['ivt_id'];

    $inventary = InventoryModel::mdlGetCommodityById($ivt_id);

    return json_encode($inventary, true);
});

$app->post('/sincronizar_mercancia', function (Request $request, Response $response) {
    $json = $request->getBody();

    $mercancia = json_decode($json, true);

    $subirMerca = InventoryController::ctrActualizarInventory($mercancia);

    return json_encode($subirMerca, true);

    # code...

});




$app->run();
