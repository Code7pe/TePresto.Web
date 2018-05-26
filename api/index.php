<?php
/**
 * Created by PhpStorm.
 * User: pvillalobos
 * Date: 26/05/2018
 * Time: 10:19
 */

require_once 'db/prestamosDb.php';
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

// BEGIN::Registrar usuarios

$app->post('/registrarCliente', function (Request $req,  Response $res, $args = []) {

    //POST or PUT
    $allPostPutVars = $req->getParsedBody();
    $nombre = $allPostPutVars['nombre'];
    $apellido = $allPostPutVars['apellido'];
    $correo = $allPostPutVars['correo'];
    $clave = $allPostPutVars['clave'];

    $db = new TeprestoDb();
    $data = $db->registrarCliente($nombre, $apellido, $correo, $clave);

    echo json_encode($data);
});

$app->post('/registrarPrestamo', function (Request $req, Response $res, $args = []) {

        //POST or PUT
    $allPostPutVars = $req->getParsedBody();
    $clienteid = $allPostPutVars['clienteid'];
    $tipoPrestamo = $allPostPutVars['tipoPrestamo'];
    $descripPrestamo = $allPostPutVars['descripPrestamo'];
    $monedaid = $allPostPutVars['monedaid'];
    $monto = $allPostPutVars['monto'];
    $descripPago = $allPostPutVars['descripPago'];
    $coutaSugerida = $allPostPutVars['coutaSugerida'];

    $db = new TeprestoDb();
    $data = $db->registrarPrestamo($clienteid, $tipoPrestamo, $descripPrestamo, $monedaid,
        $monto, $descripPago, $coutaSugerida);

    echo json_encode($data);
});



$app->run();