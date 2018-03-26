<?php

class Photos {

    public $nom;
    public $login;
    public $date;
    public $current;

    public function __toString() {
        return "$this->nom";
    }

    public static function commandes_precedentes() {
        $user = $_SESSION['user'];
        $login = $user->login;
        $query = "SELECT `nom` FROM `photos` WHERE `login`=$login AND `current`='0' ORDER BY `date` DESC";
        $sth = $dbh->prepare($query);
        $request_succeeded = $sth->execute();
        while ($courant =  $sth->fetch(PDO::FETCH_ASSOC)){
            $nom=$courant['nom']."_min"; // On mettra _min devant chaque photo pour garder la miniature. Je te laisse faire la fonction qui fait les miniatures (sur moodle)
            echo "<img src=\"photos/$nom\" >";//il faudra gérer le fait qu'on enregistre des photos miniatures et des photos en taille normale. 
                                              //Les photos miniatures auront pour but de permettre d'afficher facilement. C'est sur moodle
        }
    }

    public static function commandes_courantes() {
        $user = $_SESSION['user'];
        $login = $user->login;
        $query = "SELECT `nom` FROM `photos` WHERE `login`=$login AND `current`='1' ORDER BY `date` DESC";
        $sth = $dbh->prepare($query);
        $request_succeeded = $sth->execute();
        while ($courant =  $sth->fetch(PDO::FETCH_ASSOC)){
            $nom=$courant['nom']."_min"; // On mettra _min devant chaque photo pour garder la miniature. Je te laisse faire la fonction qui fait les miniatures (sur moodle)
            echo "<img src=\"photos/$nom\" >";//il faudra gérer le fait qu'on enregistre des photos miniatures et des photos en taille normale. 
                                              //Les photos miniatures auront pour but de permettre d'afficher facilement. C'est sur moodle
        }
    }
    
    public static function upload_photos(){
    }
    
        public static function lancer_commande(){
       
}
}
