<?php 

    // conectar la base de datos - con clase static
    class Database {

        public static function connect() {
            $db = new mysqli('localhost', 'root', '', 'tienda_online');
            $db->query("SET NAMES 'utf8'");

            return $db;
        }

    }

?>