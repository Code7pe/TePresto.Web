<?php
/**
 * Created by PhpStorm.
 * User: pvillalobos
 * Date: 26/05/2018
 * Time: 10:40
 */

require_once('config/baseDb.php');

class TeprestoDb extends BaseDb
{
    public function registrarCliente($nombre, $apellido, $correo, $clave) {
        $sp = "CALL SP_INS_CLIENTE('$nombre', '$apellido', '$correo', '$clave');";
        return $this->querySelect($sp);
    }

    public function registrarPrestamo($clienteid, $tipoPrestamo, $descripPrestamo, $monedaid,
                                      $monto, $descripPago, $coutaSugerida) {

        $sp = "CALL SP_INS_PRESTAMO($clienteid, $tipoPrestamo, '$descripPrestamo', $monedaid,
        $monto, '$descripPago', $coutaSugerida);";
        return $this->querySelect($sp);
    }
}