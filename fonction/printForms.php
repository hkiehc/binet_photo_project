<?php

function printLoginForm(){
echo <<<CHAINE_DE_FIN

	<form class= "form-horizontal" action="index.php?todo=login" method="post">
   
      <div class="form-group row">
        <label for="login" class="col-2 col-form-label"></label>
        <div class="col-10">
          <input class="form-control" id="login" type=text required name="login" placeholder="Login">
        </div>
      </div> 
   		
      <div class="form-group row">
        <label for="nom" class="col-2 col-form-label"></label>
        <div class="col-10">
          <input class="form-control" id="password1" type=password required name="password" placeholder="Mot de Passe">
        </div>
      </div> 

    	
    	
      <div class="form-group row">
        <label for="nom" class="col-2 col-form-label"></label>
        <div class="col-10">
          <input class="form-control" id="button1" type=submit value="Connexion">
        </div>
      </div> 
    	
      <a href="index.php?todo=register_form">Créer un compte</a>
 
 	</form>


CHAINE_DE_FIN;

}

function printregisterForm(){
echo <<<CHAINE_DE_FIN



<form action="index.php?todo=register" method=post
      oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">

  <div class="form-group row">
    <label for="login" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="login" type=text required name="login" placeholder="Login">
    </div>
  </div> 

  <div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="nom" type=text required name="nom" placeholder="Nom">
    </div>
  </div>    

  <div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="prenom" type=text required name="prenom" placeholder="prenom">
    </div>
  </div> 

 	<div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="casert" type=text required name="casert" placeholder="casert">
    </div>
  </div> 

  <div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="trigramme" type=text required name="trigramme" placeholder="trigramme">
    </div>
  </div> 

  <div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="password1" type=password required name=up placeholder="Mot de Passe">
    </div>
  </div> 
 	
  <div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="password2" type=password required name=up2 placeholder="Confirmer le mot de passe">
    </div>
  </div> 

 	<div class="form-group row">
    <label for="nom" class="col-2 col-form-label"></label>
    <div class="col-10">
      <input class="form-control" id="button" type=submit value="Inscription">
    </div>
  </div> 
  	
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
