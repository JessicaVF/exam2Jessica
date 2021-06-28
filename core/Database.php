<?php



class Database 
{
    /**
    * Créer la connexion à la base de données
    * @return pdo
    */

    public static function getPdo(){

        $pdo = new PDO('mysql:host=localhost;dbname=examvelos','examvelos' ,'examvelos', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION  ,
            PDO::ATTR_DEFAULT_FETCH_MODE  =>    PDO::FETCH_ASSOC          
        ]);

        return $pdo;

    }


}




