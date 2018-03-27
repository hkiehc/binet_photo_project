<div class="row">
    <div class="col-md-6 col-md-offset-3 title">
        <h1> Nouvelle Commande </h1>
    </div>
</div>

<div class="row">
    <hr>
    <h3>Pour commander des photos, c'est simple :</h3>
    <hr>
    <div>
        <div class="col-md-2 col-md-offset-1 gris">
            <p><span class="glyphicon glyphicon-upload" aria-hidden="true" ></span> </p>
            <h3> Etape 1 </h3>
            <h4> Transfère les photos que tu souhaites imprimer </h4></div>

        <div class="col-md-2 col-md-offset-2 gris">
            <p><span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
            <h3> Etape 2 </h3> 
            <h4> Choisis le format d'impression et valide</h4></div>

        <div class="col-md-2 col-md-offset-2 gris">
            <p> <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
            <h3> Etape 3 </h3>
            <h4> On te livre les photos directement dans ta boîte aux lettres !</h4></div>
    </div>
</div>

<div class="row">
    <?php
    if (isset($_GET['todo'])) {
        if ($_GET['todo'] == "upload") {
            echo "<p>photos envoyées!</p>";
            Photos::upload_photos(); //fonction à écrire... par Cheikh bien sûr (-:
        } else {
            echo "<p>erreur de code.</p>";
        }
    }
    ?>
    <div class="col-md-10 col-md-offset-1">
        <form action="index.php?page=impression"
              enctype="multipart/form-data" method="post">
            <input type="hidden" name="photo" value="true">
            <h3>
                Sélectionne les photos que tu souhaites imprimer (formats .jpg et .jpeg uniquement) : 
            </h3><br>
            <p>Utilise Ctrl ou Shift pour sélectionner plusieurs photos</p>
            <br/>
            <h3>MAXIMUM 20Mo en une fois! </h3> <br>
            <p style="text-align: center"> <input type="file" id='upload' name="photos[]" multiple></p>
            <hr>

            <h3>Choisis ton format</h3>
            <select name="format">
                <option value=10x15>10x15 (0.2 € maximum par photo)</option>
                <option value=20x30>20x30 (1.5 € maximum par photo)</option>
                <option value=50x76>50x76 (10 € maximum par photo)</option>
            </select>
            <br/>
            <br/>

            <hr>
            <div>
                <p style="text-align: center"> <input type="submit" value="Envoyer" style="font-size: 20px; font-weight:bold" class="btn btn-success"> </p>
            </div>
        </form>
    </div>
</div>
