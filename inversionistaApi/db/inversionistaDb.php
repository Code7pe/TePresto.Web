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
        $sp = "CALL INVSP_GetPrestamosAbiertos();";
        return $this->querySelect($sp);
    }

    public function getPrestamoById($id) {
        $sp = "CALL INVSP_GetPrestamoById($id);";
        return $this->querySelect($sp);
    }

    public function InsertPropuesta($prestamoId,$inversionistaId, $cuotas, $totalInteres, $totalPagar, $cuotaMensual) {
        $sp = "CALL INVSP_InsertPropuesta($prestamoId,$inversionistaId, $cuotas, $totalInteres, $totalPagar, $cuotaMensual);";
        return $this->querySelect($sp);
    }

}