 <?php 

function logIn($dbh){  
	$login = $_POST['login'];
	$mdp = $_POST['password'];
	
	$user = Utilisateur::getUtilisateur($dbh,$login);
	if(isset($user) && isset($login) && isset($mdp)){
		if(Utilisateur::testerMdp2($dbh,$user,$mdp)){ 
			$_SESSION['loggedIn'] = true;  // autoriser la connexion

		}
		else{
			$_SESSION['loggedIn'] = false;
		}
		
	}
	else{
			$_SESSION['loggedIn'] = false;
	}
	
}

function logOut(){ //ok
	unset($_SESSION['loggedIn']);
	session_unset();
	session_destroy();
	
}

function register($dbh){ //ok
 if(isset($_POST["login"]) && $_POST["login"] != "" &&
		isset($_POST["nom"]) && $_POST["nom"] != "" &&
		isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
		isset($_POST["casert"]) && $_POST["casert"] != "" &&
		isset($_POST["trigramme"]) && $_POST["trigramme"] != "" &&
   		isset($_POST["up"]) && $_POST["up"] != "" &&
   		isset($_POST["up2"]) && $_POST["up2"] != "" &&
   		$_POST["up"] == $_POST["up2"])
    	{
    	
    	Utilisateur::insererUtilisateur($dbh,$_POST["login"],$_POST["nom"],$_POST["prenom"],$_POST["up"],$_POST["casert"],1,$_POST["trigramme"],100);
	
	}
 

}

function changepassword($dbh){ // a tester dans Utilisateur avant toute chose
	

	if(isset($_POST["login"]) && $_POST["login"] != "" &&
		isset($_POST["amp"]) && $_POST["amp"] != "" &&
	   isset($_POST["nmp"]) && $_POST["nmp"] != "" &&
	   isset($_POST["nmp2"]) && $_POST["nmp2"] != "" &&
	   $_POST["nmp"] == $_POST["nmp2"])
	{
		if(Utilisateur::getUtilisateur($dbh,$_POST["login"]) != null &&
	   	   Utilisateur::testerMdp2($dbh,getUtilisateur($dbh,$_POST["login"]),$_POST["amp"])
	   ){
			Utilisateur::update_password($_POST["login"],$_POST["nmp"]);
			
		}

	}
	  

}

function deleteuser($dbh){  // a tester dans Utilisateur avant toute chose

	if(isset($_POST["login"]) && $_POST["login"] != "" &&
   		$U->getUtilisateur($dbh,$_POST["login"]) != null &&
   		$U->testerMdp2($dbh,getUtilisateur($dbh,$_POST["login"]),$_POST["ancien_mot_de_passe"])
   	)
    {
    $U->delete_champ($_POST["login"]) ;
	}

}


?>