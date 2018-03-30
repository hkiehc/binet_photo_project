<?php

class Photo {

    public $nom;
    public $login;
    public $date;
    public $current;
    public $increment;

    public function __toString() {
        return "$this->nom";
    }

    public static function getPhoto($dbh, $nom) {
        $query = "SELECT * FROM `photos` WHERE `nom`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Photo');
        $sth->execute(array($nom));
        if ($sth->rowCount() != 1) {
            return null;
        }
        $photo = $sth->fetch();
        $sth->closeCursor();
        return $photo;
    }

    public static function getLastIncrement($dbh, $user) {
        $login = $user->login;
        $query = "SELECT MAX(`increment`) FROM `photos` WHERE `login`='$login'";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $i = $sth->fetch();
        if ($i[0] != null) {
            return $i[0];
        } else {
            return -1;
        }
    }

    public static function depot_photo($user, $format, $dbh) {
        $nom = Photo::nom_photo($user, $dbh);
        $login = $user->login;
        $i = Photo::getLastIncrement($dbh, $user) + 1;
        $query = "INSERT INTO `photos`(`nom`, `login`, `format`, `date`, `current`,`increment`) VALUES (?,?,?,CURRENT_TIMESTAMP,'1',?)";
        $sth = $dbh->prepare($query);
        $sth->execute(array($nom, $login, $format, $i));
    }

    public static function nom_photo($user, $dbh) {//permet de nommer la photo sous le format: casert-incrément. //ça marche
        $casert = $user->casert;
        $login = $user->login;
        $i = Photo::getLastIncrement($dbh, $user) + 1;
        return("$casert-$i");
    }

    public static function annuler_photo($dbh, $nom) {
        $query = "DELETE FROM `photos` WHERE `nom`=?;";
        $sth = $dbh->prepare($query);
        $sth->execute(array($nom));
    }

    public static function commandes_precedentes() {
        $user = $_SESSION['user'];
        $login = $user->login;
        $query = "SELECT `nom` FROM `photos` WHERE `login`=$login AND `current`='0' ORDER BY `date` DESC";
        $sth = $dbh->prepare($query);
        $request_succeeded = $sth->execute();
        while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
            $nom = $courant['nom'] . "_min"; // On mettra _min devant chaque photo pour garder la miniature. Je te laisse faire la fonction qui fait les miniatures (sur moodle)
            echo "<img src=\"photos/$nom\" >"; //il faudra gérer le fait qu'on enregistre des photos miniatures et des photos en taille normale. 
//Les photos miniatures auront pour but de permettre d'afficher facilement. C'est sur moodle
        }
    }

    public static function commandes_courantes() {
        $user = $_SESSION['user'];
        $login = $user->login;
        $query = "SELECT `nom` FROM `photos` WHERE `login`=$login AND `current`='1' ORDER BY `date` DESC";
        $sth = $dbh->prepare($query);
        $request_succeeded = $sth->execute();
        while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
            $nom = $courant['nom'] . "_min"; // On mettra _min devant chaque photo pour garder la miniature. Je te laisse faire la fonction qui fait les miniatures (sur moodle)
            echo "<img src=\"photos/$nom\" >"; //il faudra gérer le fait qu'on enregistre des photos miniatures et des photos en taille normale. 
//Les photos miniatures auront pour but de permettre d'afficher facilement. C'est sur moodle
        }
    }

    public static function upload_photos($dbh, $user) {
        if (!empty($_FILES['photos']['tmp_name']) && is_uploaded_file($_FILES['photos']['tmp_name'][0])) {
//            $user = Utilisateur::getUtilisateur($dbh, $_SESSION['user']);
            $maxsize = 2000000;
            $allowedExtensions = array('jpg', 'jpeg');
            $taille = count($_FILES['photos']['name']);
            $format = $_POST['format'];
            $liste = array(array());
            for ($i = 0; $i < $taille; $i++) {
                $truc = explode(".", $_FILES['photos']['name'][$i]);
                $file_extension = end($truc);
                if ((in_array($file_extension, $allowedExtensions))) {
                    echo "Bon type de fichier<br>";
                } else {
                    return "erreur de type<br>";
                }

//vérification de la taille
                $size = filesize($_FILES['photos']['tmp_name'][$i]);
                if ($size > $maxsize) {
                    return "$i-eme fichier trop volumineux!<br>";
                }

//upload effectif de l'image
                $casert = $user->casert;
                $batiment = str_split($casert, 2)[0];
                $nom = Photo::nom_photo($user, $dbh);
                $photoHD = $_FILES['photos']['tmp_name'][$i];
                $liste[$i][0] = "photos/$batiment/$format/$nom.jpg";
                $liste[$i][1] = $nom;
                $image = imagecreatefromjpeg($photoHD);
                $reussite = move_uploaded_file($photoHD, "photos/$batiment/$format/$nom.jpg");
                if (!($reussite)) {
                    return "echec de copie de la $i image<br>";
                } else {
                    echo "depot de " . $_FILES['photos']['name'][$i] . "<br>";
                }
//Depot dans la base de données
                Photo::depot_photo($user, $format, $dbh);
                echo "depot effectué<br>";
            }
            for ($i = 0; $i < $taille; $i++) {
                Photo::miniature($liste[$i][0], $liste[$i][1]);
            }
        } else {
            return "echec lors de l'envoi des photos ou aucune photo déposée.<br>";
        }
    }

    public static function miniature($photoHD, $nom) {
//Création de la miniature
        $newWidth = 100;
        $image = imagecreatefromjpeg($photoHD);
        // $photoHD est le chemin vers votre photo HD
        list($widthOrig, $heightOrig) = getimagesize($photoHD);

        $ratio = $widthOrig / $newWidth;
        $newHeight = (int) $heightOrig / $ratio;

        $tmpPhotoLD = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($tmpPhotoLD, $image, 0, 0, 0, 0, $newWidth, $newHeight, $widthOrig, $heightOrig);
        imagejpeg($tmpPhotoLD, "photos/miniatures/$nom" . "_min.jpg", 100);
    }

//}}}

    public static function lancer_commande($dbh) { //renvoie un zip qui contient les photos, organisées par dossiers et un récapitulatif excel.
        $batiment = array("09", "10", "11", "12", "70", "71", "72", "73", "74", "75", "76", "77", "78", "79", "80");
        $format = array("10x15", "20x30", "50x76");
        foreach ($format as $f) {
            foreach ($batiment as $b) {
                mkdir("commande/$b/$f", 0777, true); //création des répertoires
                $query = "SELECT `nom` FROM `photos` WHERE `format`='$f' AND `nom` LIKE '$b.%' AND current='1'"; //sélection des images en cours par bâtiment et par format
                $sth = $dbh->prepare($query);
                $sth->execute();
                while ($courant = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $nom = $courant['nom'];
                    if (file_exists("photos/$b/$f/$nom.jpg")) {
                        copy("photos/$b/$f/$nom.jpg", "commande/$b/$f/$nom.jpg");  //copies de toutes les images en cours
                    }
                }
            }
        } //file contien toutes les photos à envoyer
        //$date=Date::getNextDate();
        // Get real path for our folder
        $rootPath = realpath('commande');

// Initialize archive object
        $zip = new ZipArchive();
        $zipname = 'commande.zip';
        $zip->open($zipname, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);

                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }

// Zip archive will be created only after closing object
        $zip->close();
        header('Pragma: public');
        ini_set('zlib.output_compression', 0);
        $date = gmdate(DATE_RFC1123);
        header('Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0');

        header('Content-Tranfer-Encoding: none');
        header('Content-Length: ' . filesize($zipname));
        header('Content-MD5: ' . base64_encode(md5_file($zipname)));
        header('Content-Type: application/octetstream; name="' . $zipname . '"');
        header('Content-Disposition: attachment; filename="' . $zipname . '"');

        header('Date: ' . $date);
        header('Expires: ' . gmdate(DATE_RFC1123, time() + 1));
        header('Last-Modified: ' . gmdate(DATE_RFC1123, filemtime($zipname)));
        readfile($zipname);
    }

}
