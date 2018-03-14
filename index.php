<?php 
//page accueil 
//session_name("test");
session_start();
if (!isset($_SESSION['initiated'])) { // dans le cas ou il n'y a pas de session on le crée via la variable initiated 
    session_regenerate_id();
    $_SESSION['initiated'] = true;
    
}    
//var_dump($_SESSION);   // debugage en affichant le tableau $session

require('fonction/printForms.php');
require('fonction/Utils.php');
require('fonction/logInOut.php');
require('data_base/Database.php');
require('data_base/Utilisateur.php');


$dbh = Database::connect();

//initialisation de mes variables

$_SESSION['loggedIn'] = false;
$page = "";

if(isset($_GET["page"])){
	if( $_GET["page"] == "register"){
		$page = "register";
	}
}


//trautement des contenus des formulaires
if(isset($_GET["todo"])){

	if($_GET["todo"] == "login") {
    	logIn($dbh);
	}

	if($_GET["todo"] == "logout") {
    	logOut();
	}
	if($_GET["todo"] == "register") {
    	register($dbh);
	}
}






if(isset($_SESSION['loggedIn'])) {
 
	if($_SESSION['loggedIn']) {
		//ici je sais si l'utilisateur est connecte donc peux afficher plein de trucs bonjour Mr etc grace aux sessions
		//var_dump($_SESSION);   // debugage en affichant le tableau $session
		generateHTMLHeader();
		printLogoutForm();
		generateHTMLFooter();
	} 
	else{
		generateHTMLHeader();
	    printLoginForm("");
	    generateHTMLFooter();

	}

}
else {
	if($page == "register"){
		generateHTMLHeader2();
		printregisterForm();
		generateHTMLFooter2();
	}
	else{
		
		generateHTMLHeader();
	    printLoginForm("");
	    generateHTMLFooter();
	}
}



?>