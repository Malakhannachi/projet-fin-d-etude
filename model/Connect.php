<?php
namespace Model;    // il faut mettre le nom de namspace comme dans le dossier 

abstract class Connect
{
    const HOST = "localhost";
    const DB = "pfe";
    const USER = "root";
    const PASSWORD = "";
    public static function seConnecter(){
        try{
            return new \PDO("mysql:host=".self::HOST.";dbname=".self::DB, self::USER, self::PASSWORD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')); //ajouter utf8 pour les accents
        }catch(\Exception $ex){
            return $ex->getMessage();
        }
    }
}