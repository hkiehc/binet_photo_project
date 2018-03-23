<?php

class Utilisateur{
	
	public $login;
    public $nom;
    public $prenom;
    public $mdp;
    public $casert;
    public $admin;
    public $trigramme;
    public $argent;
 
    public function __toString() {

    	return "[".$this->login."] ".$this->nom." ".$this->prenom.", né le ".$this->casert.",".$this->admin.",".$this->trigramme.",".$this->argent;
    	
    }

    public static function getUtilisateur($dbh,$login){

        $query = "SELECT * FROM `utilisateurs` WHERE `login`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');  
        $sth->execute(array($login));   
        $user = $sth->fetch();                               
        $sth->closeCursor();                    
        
        return $user;                      
    }

    public static function insererUtilisateur($dbh,$login,$nom,$prenom,$mdp,$casert,$admin,$trigramme,$argent){
        if(Utilisateur::getUtilisateur($dbh,$login) == null){

            $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `nom`, `prenom`, `mdp`, `casert`, `admin`, `trigramme`, `argent`) VALUES(?,?,?,SHA1(?),?,?,?,?)");
            $sth->execute(array($login,$nom,$prenom,$mdp,$casert,$admin,$trigramme,$argent));
            
        }
    }

    

    public static function testerMdp($dbh,$login,$mdp){

        $user = Utilisateur::getUtilisateur($dbh,$login);

        return ($user->mdp == sha1($mdp));
        

    }

    public static function testerMdp2($dbh,$user,$mdp){ // version permettant d'economiser une requete

        if($user->mdp == sha1($mdp)){
            return true;
        }
        return false;
        
    }

    public static function update_password($login,$new_password){
        $query = "UPDATE `utilisateurs` SET `mdp`='?' WHERE `login`=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($new_password,$login));


    }
    public static function delete_user($login){
        $query = "DELETE FROM `utilisateurs` WHERE `login`=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
    }



    
}

?>
