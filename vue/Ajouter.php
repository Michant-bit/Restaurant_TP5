<?php $titre = "Création de menus" ?>

<?php ob_start(); ?>
<header>
    <p class="lead">Ajouter un menu de l'utilisateur :</p>
</header>
<form action="index.php?action=ajouter" method="post">
    <p>
        <div class="row">
            <div class="col-sm-5">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom"/> <br />
            </div>
            <div class="col">
                <label for="details">Détails</label>
                <textarea type="text" class="form-control" name="details" id="details"></textarea><br />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut"/><br />
            </div>
            <div class="col-sm-2">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin"/><br />
            </div>
        </div>
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'vue/Gabarit.php'; ?>