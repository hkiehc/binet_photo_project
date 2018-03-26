<div class="row">
    <div class="title">
        <h1> Historique des commandes</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <p>Tu pourras retrouver ici les photos de tes précédentes demandes impressions.</p>
        Demande en cours:
        <?php
        Photos::commandes_courantes();
        ?>
        Demande passées:
        <?php
        Photos::commandes_precedentes();
        ?>
    </div>
</div>