<?php 
session_start();
if (!isset($_SESSION['initiated'])) { 
    session_regenerate_id();
    $_SESSION['initiated'] = true;
    
}    
var_dump($_SESSION);   

require('fonction/printForms.php');
require('fonction/Utils.php');
require('fonction/logInOut.php');
require('data_base/Database.php');
require('data_base/Utilisateur.php');


$dbh = Database::connect();





	if(!isset($_SESSION['loggedIn'])){ //J'arrive sur le site pour la première fois
		

		if(isset($_GET["todo"])){

			if($_GET["todo"] == "login_form") {
				generateHTMLHeader(); 
				printLoginForm();
				generateHTMLFooter(); 
	    	
			}
			if($_GET["todo"] == "register_form") {
				generateHTMLHeader(); 
				printregisterForm();
				generateHTMLFooter();
	    	
			}
			if($_GET["todo"] == "login"){
				logIn($dbh);
			}
			if($_GET["todo"] == "logout"){
				generateHTMLHeader();  
				generateNavHeader();

				generateNavbarRight();						
				
				generateNavFooter();
				generateHTMLFooter();
			}
			if($_GET["todo"] == "register"){
				register($dbh);
				generateHTMLHeader();  
				generateNavHeader();

				generateNavbarRight();						
				
				generateNavFooter();
				generateHTMLFooter();

			}	
		}
		else{

			generateHTMLHeader();  
			generateNavHeader();

			generateNavbarRight();						
				
			generateNavFooter();
			generateHTMLFooter();
		}

			
	}


	if(isset($_SESSION['loggedIn'])){   
		 
		if($_SESSION['loggedIn']) { //utilisateur connecté: on affiche le bouton de deconnexion et les menus
			
			if(isset($_GET["todo"])){

				if($_GET["todo"] == "logout") {
					logOut();
				//$_session est supprimé et on bascule dans la première condiition
	    	   
				}
				if($_GET["todo"] == "login"){
					generateHTMLHeader();
					generateNavHeader();
						
					generateNavbarLeft();
					generateNavbarOff();

					generateNavFooter();
					generateHTMLFooter();
				}


			}
			else{
				generateHTMLHeader();
				generateNavHeader();
					
				generateNavbarLeft();
				generateNavbarOff();

				generateNavFooter();
				generateHTMLFooter();
			}
		} 
		else{
			generateHTMLHeader();  // la connexion n'a pas fonctionné donc on affiche toujour le formulaire de connexion
			generateNavHeader();

			generateNavbarRight();						
				
			generateNavFooter();
			generateHTMLFooter();

			}
		

		}	







?>