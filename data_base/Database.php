<?php

//require('Utilisateur.php');

class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=base_photo;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }
}

$dbh = Database::connect();

//Utilisateur::insererUtilisateur($dbh,'b','a','a','a','11','1','aaa',1.);



?>