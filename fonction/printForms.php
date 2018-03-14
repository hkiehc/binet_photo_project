<?php

function printLoginForm($askedPage){
echo <<<CHAINE_DE_FIN

	<form action="index.php?page=$askedPage&todo=login" method="post">
   
   		<p>Login : <input type="text" name="login" placeholder="login" required /></p>

    	<p>Password : <input type="password" name="password" required /></p>
    	<a href="index.php?page=register">Nouveau sur le site? Créer un compte</a>
    	<p><input type="submit" value="Valider" /></p>
 
 	</form>





CHAINE_DE_FIN;
}
function printLogOutForm(){
echo <<<CHAINE_DE_FIN

	<form action="index.php?todo=logout" method="post">

		<p><input type="submit" value="Déconnexion" /></p>

	</form>



CHAINE_DE_FIN;
}

function printregisterForm(){
echo <<<CHAINE_DE_FIN


<form action="index.php?todo=register" method=post
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
	<p>
  		<label for="login">login:</label>
  		<input id="login" type=text required name="login">
 	</p>

 	<p>
  		<label for="nom">nom:</label>
  		<input id="nom" type=text  required name="nom">
 	</p>

 	<p>
  		<label for="prenom">prenom:</label>
  		<input id="prenom" type=text required name="prenom">
 	</p>

 	<p>
  		<label for="promotion">promotion:</label>
  		<input id="promotion" type=text required name="promotion">
 	</p>

 	<p>
  		<label for="naissance">naissance:</label>
  		<input id="naissancce" type=text required name="naissance">
 	</p>


 	<p>
  		<label for="email">email:</label>
  		<input id="email" type=email required name=email>
 	</p>

 	<p>
  		<label for="password1">Password:</label>
  		<input id="password1" type=password required name=up>
 	</p>
 	<p>
  		<label for="password2">Confirm password:</label>
  		<input id="password2" type=password required name=up2>
 	</p>
  	<input type=submit value="Create account">

 </form>



CHAINE_DE_FIN;

}



function printChangePasswordForm(){
echo <<<CHAINE_DE_FIN

	<form action="index.php?todo=changepassword" method="post">
		<p>
  			<label for="login">login:</label>
  			<input id="login" type=text required name="login">
 		</p>
    	<p>
  			<label for="ancien_mot_de_passe">Ancien mot de passe:</label>
  			<input id="ancien_mot_de_passe" type=password required name=amp>
 		</p>
 		<p>
  			<label for="nouveau_mot_de_passe">nouveau mot de passe:</label>
  			<input id="nouveau_mot_de_passe" type=password required name=nmp>
 		</p>
 		<p>
  			<label for="nouveau_mot_de_passe2">confirmez le nouveau mot de passe:</label>
  			<input id="nouveau_mot_de_passe2" type=password required name=nmp2>
 		</p>
    	
    	<p><input type="submit" value="Valider" /></p>
  	</form>

CHAINE_DE_FIN;
}


function printdeleteuserForm(){
echo <<<CHAINE_DE_FIN

	<form action="index.php?todo=delete" method="post">
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



?>
