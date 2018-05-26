<?php
/**
 * Created by PhpStorm.
 * User: pvillalobos
 * Date: 26/05/2018
 * Time: 10:19
 */

require_once 'db/inversionistaDb.php';
require 'vendor/autoload.php';

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);


$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/listarPrestamosAbiertos', function (Request $req,  Response $res, $args = []) {

    $db = new InversionistaDb();
    $data = $db->listarPrestamosAbiertos();

    echo json_encode($data);
});

$app->get('/getPrestamo/{id}', function (Request $req,  Response $res, $args = []) {

    $prestamoId = $args['id'];

    $db = new InversionistaDb();
    $data = $db->getPrestamoById($prestamoId);

    echo json_encode($data);
});

$app->post('/crearPropuesta', function (Request $req,  Response $res, $args = []) {


    $allPostPutVars = $req->getParsedBody();
    $prestamoId = $allPostPutVars['prestamoId'];
    $inversionistaId = $allPostPutVars['inversionistaId'];
    $cuotas = $allPostPutVars['cuotas'];
    $totalInteres = $allPostPutVars['totalInteres'];
    $totalPagar = $allPostPutVars['totalPagar'];
    $cuotaMensual = $allPostPutVars['cuotaMensual'];

    $db = new InversionistaDb();
    $data = $db->InsertPropuesta($prestamoId,$inversionistaId, $cuotas, $totalInteres, $totalPagar, $cuotaMensual);

    echo json_encode($data);
});

$app->run();