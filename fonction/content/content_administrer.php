<div class="row">
    <div class="col-md-6 col-md-offset-3 title">
        <h1> Lancer une commande </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <p>Merci de déposer les différentes photos que tu souhaites envoyer.(formats .jgp, .jpeg, .png) accepté</p>
        <?php
        if (isset($_GET['todo'])):
            if ($_GET['todo'] == "lancer"):
                echo "<p>Voici le lien pour récupérer les photos.</p>";
                Photos::lancer_commande(); //fonction à écrire... par Cheikh bien sûr (-:
            endif;
        endif;
        ?>
        
        <form action="?todo=lancer" method="post">
            <p>Cliquer ici pour recevoir le zip.</p><input type="submit" value="envoyer" />
        </form>

    </div>
</div>