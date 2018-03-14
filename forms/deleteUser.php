<?php
$U = new Utilisateur;


function printdeleteForm(){
echo <<<CHAINE_DE_FIN

	<form action="deleteUser.php" method="post">
		<p>
  			<label for="login">login:</label>
  			<input id="login" type=text required name="login">
 		</p>
    	<p>
  			<label for="mot_de_passe"> mot de passe:</label>
  			<input id="mot_de_passe" type=password required name=up>
 		</p>
 		<p><input type="submit" value="Supprimmer compte" /></p>
 	
  	</form>

CHAINE_DE_FIN;
}
$dbh = Database::connect();
$form_val = false;
if(isset($_POST["login"]) && $_POST["login"] != "" &&
   $U->getUtilisateur($dbh,$_POST["login"]) != null &&
   $U->testerMdp2($dbh,getUtilisateur($dbh,$_POST["login"]),$_POST["ancien_mot_de_passe"])
   )
    {
    $U->delete_champ($_POST["login"]) ;
	$form_val = true;
	}
if(!$form_val){

generateHTMLHeader();
printdeleteForm();	
generateHTMLFooter();}


?>