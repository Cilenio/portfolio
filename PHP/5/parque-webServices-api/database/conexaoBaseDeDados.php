<?php
require_once "env.php";
class conexaoBaseDeDados{
    private static $instance;
    public static function getInstance(){
        if(!isset(self :: $instance)){
            try{
                self:: $instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';port='.DB_PORT, DB_USER, DB_PASSE);
                self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO:: FETCH_OBJ);
            }catch (PDOexception $e){
                echo $e -> getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}
?>