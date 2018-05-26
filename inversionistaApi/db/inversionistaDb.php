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
    public function listarPrestamosAbiertos() {
        $sp = "CALL INVSP_ListarPrestamosAbiertos();";
        return $this->querySelect($sp);
    }

}