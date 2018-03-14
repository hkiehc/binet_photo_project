<?php 


$form_values_valid = false;
 
if(isset($_POST["login"]) && $_POST["login"] != "" &&
	isset($_POST["nom"]) && $_POST["nom"] != "" &&
	isset($_POST["prenom"]) && $_POST["prenom"] != "" &&
	isset($_POST["naissance"]) && $_POST["naissance"] != "" &&
   isset($_POST["promotion"]) && $_POST["promotion"] != "" &&
   isset($_POST["email"]) && $_POST["email"] != "" &&
   isset($_POST["password1"]) && $_POST["password1"] != "" &&
   isset($_POST["password2"]) && $_POST["password2"] != "" &&
   $_POST["password1"] == $_POST["password2"])
    {
    Utilisteur::insererUtilisateur($dbh,$_POST["login"],$_POST["password1"],$_POST["nom"],$_POST["prenom"],$_POST["promotion"],$_POST["naissance"],$_POST["email"],'test.css');
	  $form_values_valid = true;
	
}
 
if (!$form_values_valid) {
 
	//print_register_Form();	
	
}


?>