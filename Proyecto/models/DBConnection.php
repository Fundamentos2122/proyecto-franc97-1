<?php 

    class DBConnection {
        private static $connection;

        public static function getConnection(){
            if(self::$connection == null){
                //Crear objeto de connexión
                self::$connection = new PDO('mysql:host=localhost;dbname=fdfpotcast;charset=utf8', 'root', 'Velozirraptor9*');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            }
            return self::$connection;
        }
    }


?>