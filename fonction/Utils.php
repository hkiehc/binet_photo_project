<?php
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
 
            <!-- Static navbar -->
            <div class="navbar navbar-default" role="navigation">
                <div class="navbar navbar-inverse">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="lien1">Lien 1</a></li>
                            <li><a href="lien2">Lien 2</a></li>
                            <li><a href="lien3">Lien 3</a></li>
                            <li><a href="lien4">Lien 4</a></li>
                        </ul>
                        <div align = "right">
                        <button type="button" class="btn btn-default navbar-btn">Connection</button>
                        <button type="button" class="btn btn-default navbar-btn">Inscription</button>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="jumbotron">
                <h1>En-tête</h1>
                <p>A completer</p>
            </div>

            <div id="content">
                <div>
                    <h1>Titre à choisir</h1>
                    <p>Contenu du corps principal de la page, dépend de la page affichée</p>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-2">
                        <h3>section1</h3>
                        <p>A compléter</p>
                    </div>
                    <div class="col-md-3 col-md-offset-2">
                        <h3>section2</h3>
                        <p>A compléter</p>
                    </div>
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
function generateHTMLHeader2(){
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
 
            
 
            

            


CHAINE_DE_FIN;
}
function generateHTMLFooter2(){
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