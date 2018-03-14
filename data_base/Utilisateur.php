<?php

class Utilisateur{
	
	public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $naissance;
    public $email;
    public $feuille;
 
    public function __toString() {
    	if($this->promotion == null){
    		return "[".$this->login."] ".$this->prenom." ".$this->nom.", né le ".$this->naissance.",".$this->email;
    	}
        else{
        	return "[".$this->login."] ".$this->prenom." ".$this->nom.", né le ".$this->naissance.", ".$this->promotion." ".$this->email;}
    }

    public static function getUtilisateur($dbh,$login){
        
        $query = "SELECT * FROM `utilisateurs` WHERE `login`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');  // le resultat envoyé sera ainsi sous forme d'objet Utilisateur
        $sth->execute(array($login));                                       // execution du code
        $user = $sth->fetch();
        $sth->closeCursor();                    //ferme la lecture courante donc la pile courante
        
        return $user;                     //affiche le résultat via la methode tostring 
    }

    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille){
        if(Utilisateur::getUtilisateur($dbh,$login) != null){
            }
            
        else{
            
            $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
            $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille));
            
        }
    }

    public static function userexist($dbh,$login){
        return (getUtilisateur($dbh,$login) != null);
    }

    public static function testerMdp($dbh,$login,$mdp){

        $user = Utilisateur::getUtilisateur($dbh,$login);

        return ($user->mdp == sha1($mdp));
        

    }

    public static function testerMdp2($dbh,$user,$mdp){ // version permettant d'economiser une requete

        return ($user->mdp == sha1($mdp));
        
    }

    public static function update_password($login,$new_password){
        $query = "UPDATE `utilisateurs` SET `mdp`='?' WHERE `login`=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($new_password,$login));


    }
    public static function delete_champ($login){
        $query = "DELETE FROM `utilisateurs` WHERE `login`=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
    }


    public static function test(){
        echo 'test reussie';
    }

    
}

?>
