<?php

session_start();

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
var_dump($_SESSION);
require('fonction/printForms.php');
require('fonction/Utils.php');
require('fonction/logInOut.php');
require('data_base/Database.php');
require('data_base/Utilisateur.php');
require('data_base/Photo.php');

$dbh = Database::connect();
/*$user1= Utilisateur::getUtilisateur($dbh, 'test');
$user2= Utilisateur::getUtilisateur($dbh, 'a');*/  //Pour les tests

if (isset($_GET["page"])) {
    $askedPage = $_GET["page"];

    if (checkpage($askedPage)) {
        $authorized = true;
    } else {
        echo "page incorrecte";
        $askedPage = "erreur"; //Il faudra changer accueil ici par la page erreur à créer
    }
} else {
    $askedPage = "accueil";
}

generateHTMLHeader($askedPage);

if (!isset($_SESSION['loggedIn'])) { //J'arrive sur le site pour la première fois
    if (isset($_GET["todo"])) {

        if ($_GET["todo"] == "login_form") {
            printLoginForm();
        } else if ($_GET["todo"] == "register_form") {
            printregisterForm();          
        } else if ($_GET["todo"] == "login") {
            logIn($dbh);
        } else if ($_GET["todo"] == "logout") {
            generateNavHeader();
            generateNavbarRight();
            generateNavFooter();
        } else if ($_GET["todo"] == "register") {
            register($dbh);
            generateNavHeader();
            generateNavbarRight();
            generateNavFooter();
        } else {
            echo "Oops erreur 404 not found";
        }
    } else {
        generateNavHeader();
        generateNavbarRight();
        generateNavFooter();
    }
}





if (isset($_SESSION['loggedIn'])) {
    if ($_SESSION['loggedIn']) { //utilisateur connecté: on affiche le bouton de deconnexion et les menus
        if (isset($_GET["todo"])) {
            if ($_GET["todo"] == "logout") {
                logOut();
                generateNavHeader();
                generateNavbarRight();
                generateNavFooter();
               //$_session est supprimé et on bascule dans la première condiition
            } else {
                generateNavHeader();
                generateNavbarLeft($askedPage);
              
                generateProfile($_SESSION['user'],$_SESSION['name']);
                generateNavFooter();
            }
        } else {
            generateNavHeader();
            generateNavbarLeft($askedPage);
           
            generateProfile($_SESSION['user'],$_SESSION['name']);
            
            generateNavFooter();
        }
    } else {
        logOut();
        if (isset($_GET["todo"])) {
            if ($_GET["todo"] == "login_form") {
                generateNavHeader();
                printLoginForm();
                generateNavFooter();
            } else if ($_GET["todo"] == "register_form") {
                generateNavHeader();
                printregisterForm();
                generateNavFooter();
            } else {
                generateNavHeader();
                generateNavbarRight();
                generateNavFooter();
            }
        } else {
            generateNavHeader();
            generateNavbarRight();
            generateNavFooter();
        }
    }
}

if (isset($_GET["todo"])) {
    if ($_GET["todo"] != "login_form" && $_GET["todo"] != "register_form") {
        generateContent($askedPage);
    }
} else {
    generateContent($askedPage);
}

generateHTMLFooter();
?>