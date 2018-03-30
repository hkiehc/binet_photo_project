<div class="row">
    <div class="col-md-6 col-md-offset-3 title">
        <h1> Lancer une commande </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <?php
        $dbh= Database::connect();
        if (isset($_GET['execute'])) {
            if ($_GET['execute'] == "lancer") {
                Photo::lancer_commande($dbh);
            }
        }
        ?>

        <form action="?page=administrer&execute=lancer" method="post">
            <p>Cliquer ici pour recevoir le zip.</p><input type="submit" value="envoyer" />
        </form>

    </div>
</div>