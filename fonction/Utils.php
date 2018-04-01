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
    if ($askedPage == "accueil") {
        require("content/content_$askedPage.php");
    } else if ($askedPage == "accueil") {
        require("content/content_$askedPage.php");
    } else {
        if (isset($_SESSION["loggedIn"])) {
            if ($_SESSION["loggedIn"]) {
                require("content/content_$askedPage.php");
            } else {
                require("content/content_erreur.php");
            }
        } else {
            require("content/content_erreur.php");
        }
    }
    echo "</div>";
}

function generateHTMLHeader($askedPage) {
    $title = getPageTitle($askedPage);
    echo <<<END

<!DOCTYPE html>
  <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>$title</title>

        
        
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/perso.css" rel="stylesheet">    
    </head>
    <body>

    <div class="container">
            <div class="jumbotron">
                <h1><a href="index.php">Binet Photo</a></h1> 
            </div>
END;
}

function generateHTMLFooter() {
    echo <<<END
	    
    
    </div>

	</body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
 
	</html>



END;
}

function generateProfile($prenom,$nom){

echo <<<END

    <ul class="nav navbar-nav navbar-right" navbar-right>
      <button for="menu" class="btn btn-secondary  dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
        $prenom $nom
        <span class="caret"></span>
      </button>

      <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="dropdownMenu1">
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><span class="glyphicon glyphicon-wrench"></span> Paramètres</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=compte"><span class="glyphicon glyphicon-user"></span> Mon Compte</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?page=historique"><span class="glyphicon glyphicon-user"></span> Historique des commandes</a></li>
        <li role="presentation" class="divider"></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="index.php?todo=logout"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
      </ul>
    </ul>

END;

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

function generateNavbarLeft($askedPage,$admin) { //$admin vaut "1" ou "0" , modification du nav en fonction
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
    );
    echo" <ul class='nav navbar-nav'>";
    foreach ($page_list as $page) {
        $menutitle = $page["menutitle"];

        if($admin == "1"){

            if ($page["name"] == $askedPage) {
                

                echo "<li class='active'><a href='index.php?page=$askedPage'>$menutitle</a></li>";
            } else {
                $name = $page["name"];
                echo "<li><a href='index.php?page=$name'>$menutitle</a></li>";
            }
        }
        if($admin == "0"){

            if($page["name"] != "administrer"){
                if ($page["name"] == $askedPage) {
                    

                    echo "<li class='active'><a href='index.php?page=$askedPage'>$menutitle</a></li>";
                } else {
                    $name = $page["name"];
                    echo "<li><a href='index.php?page=$name'>$menutitle</a></li>";
                }
            }
        }

    }
    echo "</ul>";
}

function generateNavbarRight() {

    echo <<<END
    <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?todo=register_form"><span class="glyphicon glyphicon-user"></span> Créer un compte</a></li>
        <li><a href="index.php?todo=login_form"><span class="glyphicon glyphicon-log-in"></span> Se Connecter</a></li>
    </ul>

END;
}

function generateNavbarOff() {

    echo <<<END
    <ul class="nav navbar-nav navbar-right">
        
        <li><a href="index.php?todo=logout"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    </ul>

END;
}

function generateNavbar($askedPage) {
    generateNavHeader();
    if (isset($_SESSION["loggedIn"])) {
        if ($_SESSION["loggedIn"]) {
            if ($askedPage == "erreur") {
                generateNavbarLeft("accueil");
            } else {
                generateNavbarLeft($askedPage);
                generateNavbarOff();
            }
        } else {
            generateNavbarRight();
        }
    } else {
        generateNavbarRight();
    }
    generateNavFooter();
}
function generateContact(){
echo <<<END
    <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
        <h3>Nous Contacter</h3>
        <form role="form" id="contactForm">
            <div class="row">
            <div class="form-group col-sm-6">
                <label for="name" class="h4">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="nom" required>
            </div>
            <div class="form-group col-sm-6">
                <label for="email" class="h4">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email" required>
            </div>
            </div>
            <div class="form-group">
                <label for="message" class="h4 ">Message</label>
                <textarea id="message" class="form-control" rows="5" placeholder="Ton message" required></textarea>
            </div>
        <button type="submit" id="form-submit" class="btn btn-success btn-lg ">Submit</button>
        <div id="msgSubmit" class="h3 text-center hidden">Message Submitted!</div>
        </form>
    </div>
    </div>
END;
}

?>