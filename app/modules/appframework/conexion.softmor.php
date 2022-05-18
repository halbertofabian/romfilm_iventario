<?php
class ConexionSoftmor
{

    static public function conectar()
    {

        $link = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
            DB_USER,
            DB_PASSWORD
        );

        $link->exec("set names utf8");

        return $link;
    }
}
