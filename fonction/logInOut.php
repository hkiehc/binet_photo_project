 <?php 

function logIn($dbh){  //ok
	$login = $_POST['login'];
	$mdp = $_POST['password'];
	
	$user = Utilisateur::getUtilisateur($dbh,$login);
	if(isset($user)){
		if(Utilisateur::testerMdp2($dbh,$user,$mdp)){ //bon mot de passe
			$_SESSION['loggedIn'] = true;  //l'utilisateur est ainsi loggué
			
		}
		else{
			
			//printLoginForm($askedPage);
		}
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
    	
    	Utilisateur::insererUtilisateur($dbh,$_POST["login"],$_POST["up"],$_POST["nom"],$_POST["prenom"],$_POST["promotion"],$_POST["naissance"],$_POST["email"],'test.css');
	
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