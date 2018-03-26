<?php

$page_list = array(
  array(
    "name"=>"welcome",
    "title"=>"Accueil de notre site",
    "menutitle"=>"Accueil"),
  array(
    "name"=>"contacts",
    "title"=>"Qui sommes-nous ?",
    "menutitle"=>"Nous contacter"),
  
);

function generateHTMLHeader(){
echo <<<CHAINE_DE_FIN

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Index</title>

        <script src="css/bootstrap/js/jquery.js"></script>
        <script src="css/bootstrap/js/bootstrap.js"></script>

        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/perso.css" rel="stylesheet">
     
        

    </head>
    <body>

    <div class="container">
            <div class="jumbotron">
                <h1>Binet Photo</h1>
            </div>
         
            
 
            

            


CHAINE_DE_FIN;
}
function generateHTMLFooter(){
echo <<<CHAINE_DE_FIN
	    
 
    </div>

	</body>
 
	</html>



CHAINE_DE_FIN;
}

function generateNavHeader(){
echo <<<END

<div class="navbar navbar-inverse" role="navigation">
<div class="navbar-collapse collapse">

END;

}

function generateNavFooter(){
echo <<<END

</div>
</div>
 

END;

}


function generateNavbarLeft(){
echo <<<CHAINE_DE_FIN
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Accueil</a></li>
            <li><a href="#">Mes Commandes</a></li>
            <li><a href="#">Nous contacter</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Administrer les commandes
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">En attente</a></li>
                    <li><a href="#">En impression</a></li>
                                      
                </ul>
            </li>
        </ul>

        

CHAINE_DE_FIN;
}

function generateNavbarRight(){
echo <<<CHAINE_DE_FIN
    <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?todo=register_form"><span class="glyphicon glyphicon-user"></span> Créer un compte</a></li>
        <li><a href="index.php?todo=login_form"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</a></li>
    </ul>

CHAINE_DE_FIN;

}

function generateNavbarOff(){
echo <<<CHAINE_DE_FIN
    <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?todo=logout"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    </ul>

CHAINE_DE_FIN;

}

function getPageTitle($askedPage){
  foreach($page_list as $page){
    if($page["name"] == $askedPage){
      return $page["title"];
    }
  }
}

function checkPage($askedPage){
  foreach($page_list as $page){
    if($page["name"] == $askedPage){
      return true;
    }
  }
  return false;
}

?>