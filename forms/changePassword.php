<?php
function printCP(){
echo <<<CHAINE_DE_FIN

	<form action="changePassword.php" method="post">
		<p>
  			<label for="login">login:</label>
  			<input id="login" type=text required name="login">
 		</p>
    	<p>
  			<label for="ancien_mot_de_passe">Ancien mot de passe:</label>
  			<input id="ancien_mot_de_passe" type=password required name=up>
 		</p>
 		<p>
  			<label for="nouveau_mot_de_passe">nouveau mot de passe:</label>
  			<input id="nouveau_mot_de_passe" type=password required name=up2>
 		</p>
 		<p>
  			<label for="nouveau_mot_de_passe2">confirmez le nouveau mot de passe:</label>
  			<input id="nouveau_mot_de_passe2" type=password required name=up2>
 		</p>
    	
    	<p><input type="submit" value="Valider" /></p>
  	</form>

CHAINE_DE_FIN;
}
$dbh = Database::connect();

$form_values = false;

if(isset($_POST["login"]) && $_POST["login"] != "" &&
	isset($_POST["ancien_mot_de_passe"]) && $_POST["ancien_mot_de_passe"] != "" &&
   isset($_POST["nouveau_mot_de_passe"]) && $_POST["nouveau_mot_de_passe"] != "" &&
   isset($_POST["nouveau_mot_de_passe2"]) && $_POST["nouveau_mot_de_passe2"] != "" &&
   $_POST["nouveau_mot_de_passe"] == $_POST["nouveau_mot_de_passe2"] &&
   Utilisateur::getUtilisateur($dbh,$_POST["login"]) != null &&
   Utilisateur::testerMdp2($dbh,getUtilisateur($dbh,$_POST["login"]),$_POST["ancien_mot_de_passe"])
   )
    {
    Utilisateur::update_password($_POST["login"],$_POST["nouveau_mot_de_passe"]);
	$form_values = true;
	
	}
if(!$form_values) {
	generateHTMLHeader();
	printCP();	
	generateHTMLFooter();
}


$dbh = null;


?>