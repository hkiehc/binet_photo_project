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

$dbh = Database::connect();

if (isset($_GET["page"])) {
    $askedPage = $_GET["page"];

    if (checkpage($askedPage)) {
        $authorized = true;
    } else {
        echo "page incorrecte";
        $askedPage = "accueil"; //Il faudra changer accueil ici par la page erreur à créer
    }
} else {
    $askedPage = "accueil";
}

generateHTMLHeader($askedPage);

if (!isset($_SESSION['loggedIn'])) { //J'arrive sur le site pour la première fois
    if (isset($_GET["todo"])) {

        if ($_GET["todo"] == "login_form") {
            printLoginForm();
            generateHTMLFooter();
        } else if ($_GET["todo"] == "register_form") {
            printregisterForm();
            generateHTMLFooter();
        } else if ($_GET["todo"] == "login") {
            logIn($dbh);
        } else if ($_GET["todo"] == "logout") {
            generateNavHeader();
            generateNavbarRight();
            generateNavFooter();
            generateHTMLFooter();
        } else if ($_GET["todo"] == "register") {
            register($dbh);
            generateNavHeader();
            generateNavbarRight();
            generateNavFooter();
            generateHTMLFooter();
        } else {
            echo "Oops erreur 404 not found";
        }
    } else {
        generateNavHeader();
        generateNavbarRight();
        generateNavFooter();
        generateHTMLFooter();
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
                generateNavbarOff();
                generateNavFooter();
            }
        } else {
            generateNavHeader();
            generateNavbarLeft($askedPage);
            generateNavbarOff();
            generateNavFooter();
        }
    } else {
        logOut();
        if (isset($_GET["todo"])) {
            if ($_GET["todo"] == "login_form") {
                printLoginForm();
            } else if ($_GET["todo"] == "register_form") {
                printregisterForm();
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