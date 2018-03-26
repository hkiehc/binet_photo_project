<div class="row">
    <div class="title">
        <h1> Nouvelle Commande </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <p>Merci de déposer les différentes photos que tu souhaites envoyer.(formats .jgp, .jpeg, .png) accepté</p>
        <?php
        if (isset($_GET['todo'])){
            if ($_GET['todo'] == "upload"){
                echo "<p>photos envoyées!</p>";
                Photos::upload_photos(); //fonction à écrire... par Cheikh bien sûr (-:
            }
            else{
                echo "<p>erreur de code.</p>";
            }
        }
        ?>
        
        <form action="?todo=upload" method="post" enctype="multipart/form-data">
            <input type="image" name="fichier"/>
            <br>
            <input type="submit" value="envoyer" />
        </form>

    </div>
</div>