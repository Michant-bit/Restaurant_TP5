<?php $this->titre = "Modification de menus" ?>

<header>
    <p class="lead">Modifier un menu de l'utilisateur :</p>
</header>
<form action= "index.php?action=miseAJourMenu&id" method="post">
    <p>
        <div class="row">
            <div class="col-sm-5">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" value="<?= $menu['nom'] ?>"/><br />
            </div>
            <div class="col">
                <label for="details">Détails</label>
                <textarea type="text" class="form-control" name="details" id="details"><?= $menu['details'] ?></textarea><br />
            </div>
        </div>
        <div class="row">
            <div class="col-sm-5">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="<?= $menu['email'] ?>"/><br />
            </div>
            <div class="col-sm-2">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" value="<?= $menu['date_debut'] ?>"/><br />
            </div>
            <div class="col-sm-2">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" value="<?= $menu['date_fin'] ?>"/><br />
            </div>
        </div>
        <input type="hidden" name="utilisateur_id" value="1" /><br />
        <input type="hidden" name="id" value="<?= $menu['id'] ?>" />
        <button type="submit" class="btn btn-primary mb-2">Modifier</button>
    </p>
</form>