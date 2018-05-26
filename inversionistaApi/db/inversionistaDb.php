<?php
/**
 * Created by PhpStorm.
 * User: pvillalobos
 * Date: 26/05/2018
 * Time: 10:40
 */

require_once('inv_config/baseDb.php');

class InversionistaDb extends BaseDb
{
    public function listarPrestamos() {
        $sp = "CALL SP_INS_CLIENTE('$nombre', '$apellido', '$correo', '$clave');";
        return $this->querySelect($sp);
    }

}