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



///////////////////////PROPUESTA//
$app->get('/prueba', function (Request $req, Response $res, $args = []) {

        //POST or PUT
    echo "renzo";
    

});


$app->post('/consultaPropuesta', function (Request $req, Response $res, $args = []) {

        //POST or PUT
    $allPostPutVars = $req->getParsedBody();
    $clienteid = $allPostPutVars['clienteid'];
    

    $db = new TeprestoDb();
    $data = $db->consultaPropuesta($clienteid);

    echo json_encode($data);
});

$app->post('/consultaPrestamo', function (Request $req, Response $res, $args = []) {

        //POST or PUT
    $allPostPutVars = $req->getParsedBody();
    $clienteid = $allPostPutVars['clienteid'];
    

    $db = new TeprestoDb();
    $data = $db->consultaPrestamo($clienteid);

    echo json_encode($data);
});






$app->post('/consultaPropuesta2/:clienteid/', function($clienteid) {
    $db = new TeprestoDb();
    $data = $db->consultaPropuesta2($clienteid);

    echo json_encode($data);
});






$app->run();