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
 
        <!-- CSS Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        
        
        <!-- CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">

 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

    <div class="container">
            <div class="jumbotron">
                <h1>Binet Photo</h1>
            </div>
         
            <div class="navbar navbar-inverse" role="navigation">
                
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="lien1">Accueil</a></li>
                            <li><a href="lien2">Commander</a></li>
                            <li><a href="lien3">Mes Commandes</a></li>
                            <li><a href="lien4">Administrer les commandes</a></li>
                            <li><a href="lien5">Nous contacter</a></li>
                            <li><a href="lien6">Mon compte</a></li>
                            <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
                        </ul>
                    
                    
            </div>
    </div>
 
            

            


CHAINE_DE_FIN;
}
function generateHTMLFooter(){
echo <<<CHAINE_DE_FIN
	
			<div id="footer">
                <p>Site réalisé en Modal par…</p>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        	<script src="js/jquery.js"></script>
        	<!-- Include all compiled plugins (below), or include individual files as needed -->
        	<script src="js/bootstrap.js"></script>
 
    </div>

	</body>
 
	</html>



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