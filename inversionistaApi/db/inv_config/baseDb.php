<?php
/**
 * Created by PhpStorm.
 * User: pvillalobos
 * Date: 26/05/2018
 * Time: 10:37
 */

abstract class DbConfig
{
    // Configuracion GoDaddy

    const DB_SERVER = "sdkpalestra.com";
    const DB_USER = "code7";
    const DB_PASSWORD = "RuCqQJy8^53*M(lj";
    const DB_NAME = "code7_prestamos";
}


abstract class BaseDb extends DbConfig
{



    final protected function querySelect($sql)
    {
        /* connect to the db */
        $conn = mysqli_connect(self::DB_SERVER,self::DB_USER,self::DB_PASSWORD,self::DB_NAME) or die('Error al conectar a la BD');
        $exe = $conn->query($sql);

        // Recoger la información del select
        $data = array();
        while($row = $exe->fetch_assoc())
        {
            $data[] = array_map('utf8_encode', $row);
        }
        $exe->close();
        return $data;
    }


}

