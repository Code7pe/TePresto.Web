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

    public function consultaPropuesta($clienteid) {

        $sp = "CALL SP_SEL_PROPUESTA($clienteid);";
        return $this->querySelect($sp);
    }


    public function consultaPrestamo($clienteid) {

        $sp = "CALL SP_SEL_PRESTAMO($clienteid);";
        return $this->querySelect($sp);
    }
    


    public function consultaPropuesta2 ($clienteid) {
        $sql = "SELECT i.nombre + i.apellido as inversionista ,p.monto,po.cuotas,po.totalInteres,po.totalPagar,po.coutaMensual  from Propuesta po inner join Invesionista i
                on po.inversionstaid=i.inversionstaid inner join Prestamo p 
                on p.inversionstaid = p.inversionstaid where clienteid='$clienteid'";
        return $this->query($sql);
    }



}