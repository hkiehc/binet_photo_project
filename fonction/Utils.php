<?php

$page_list = array(
    array(
        "name" => "accueil",
        "title" => "Impression Binet Photo",
        "menutitle" => "Accueil",),
    array(
        "name" => "administrer",
        "title" => "Administrer les commandes",
        "menutitle" => "Administrer les commandes"),
    array(
        "name" => "commander",
        "title" => "Passer une commande",
        "menutitle" => "Passer une commande"),
    array(
        "name" => "compte",
        "title" => "Mon compte",
        "menutitle" => "Mon compte"),
    array(
        "name" => "contacter",
        "title" => "Nous contacter",
        "menutitle" => "Nous contacter"),
    array(
        "name" => "historique",
        "title" => "Historique des commandes",
        "menutitle" => "Historique des commandes"),
);

function checkpage($askedPage) {
    $page_list = array(
    array(
        "name" => "accueil",
        "title" => "Impression Binet Photo",
        "menutitle" => "Accueil",),
    array(
        "name" => "administrer",
        "title" => "Administrer les commandes",
        "menutitle" => "Administrer les commandes"),
    array(
        "name" => "commander",
        "title" => "Passer une commande",
        "menutitle" => "Passer une commande"),
    array(
        "name" => "compte",
        "title" => "Mon compte",
        "menutitle" => "Mon compte"),
    array(
        "name" => "contacter",
        "title" => "Nous contacter",
        "menutitle" => "Nous contacter"),
    array(
        "name" => "historique",
        "title" => "Historique des commandes",
        "menutitle" => "Historique des commandes"),
);
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return true;
        }
    }
    return false;
}

function getPageTitle($askedPage) {
    $page_list = array(
    array(
        "name" => "accueil",
        "title" => "Impression Binet Photo",
        "menutitle" => "Accueil",),
    array(
        "name" => "administrer",
        "title" => "Administrer les commandes",
        "menutitle" => "Administrer les commandes"),
    array(
        "name" => "commander",
        "title" => "Passer une commande",
        "menutitle" => "Passer une commande"),
    array(
        "name" => "compte",
        "title" => "Mon compte",
        "menutitle" => "Mon compte"),
    array(
        "name" => "contacter",
        "title" => "Nous contacter",
        "menutitle" => "Nous contacter"),
    array(
        "name" => "historique",
        "title" => "Historique des commandes",
        "menutitle" => "Historique des commandes"),
);
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return $page["title"];
        }
    }
}

function generateContent($askedPage) {
    
    echo "<div id='content'>";
    require("content/content_$askedPage.php");
    echo "</div>";
}

function generateHTMLHeader($askedPage) {
    $title = getPageTitle($askedPage);
    echo <<<CHAINE_DE_FIN

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>$title</title>

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
                <h1><a href="index.php">Binet Photo</a></h1> 
            </div>
CHAINE_DE_FIN;
}

function generateHTMLFooter() {
    echo <<<CHAINE_DE_FIN
	    
 
    </div>

	</body>
 
	</html>



CHAINE_DE_FIN;
}

function generateNavHeader() {
    echo <<<END

<div class="navbar navbar-inverse" role="navigation">
<div class="navbar-collapse collapse">

END;
}

function generateNavFooter() {
    echo <<<END

</div>
</div>
 

END;
}

function generateNavbarLeft($askedPage) {
    $page_list = array(
    array(
        "name" => "accueil",
        "title" => "Impression Binet Photo",
        "menutitle" => "Accueil",),
    array(
        "name" => "administrer",
        "title" => "Administrer les commandes",
        "menutitle" => "Administrer les commandes"),
    array(
        "name" => "commander",
        "title" => "Passer une commande",
        "menutitle" => "Passer une commande"),
    array(
        "name" => "compte",
        "title" => "Mon compte",
        "menutitle" => "Mon compte"),
    array(
        "name" => "contacter",
        "title" => "Nous contacter",
        "menutitle" => "Nous contacter"),
    array(
        "name" => "historique",
        "title" => "Historique des commandes",
        "menutitle" => "Historique des commandes"),
);
    echo" <ul class='nav navbar-nav'>";
    foreach ($page_list as $page) {
        $menutitle = $page["menutitle"];

        if ($page["name"] == $askedPage) {
            echo "<li class='active'><a href='index.php?page=$askedPage'>$menutitle</a></li>";
        } else {
            $name=$page["name"];
            echo "<li><a href='index.php?page=$name'>$menutitle</a></li>";
        }
    }
}

function generateNavbarRight() {
    echo <<<CHAINE_DE_FIN
    <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?todo=register_form"><span class="glyphicon glyphicon-user"></span> Créer un compte</a></li>
        <li><a href="index.php?todo=login_form"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</a></li>
    </ul>

CHAINE_DE_FIN;
}

function generateNavbarOff() {
    echo <<<CHAINE_DE_FIN
    <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?todo=logout"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    </ul>

CHAINE_DE_FIN;
}

?>