<?php $this->titre = "Suppression d'item" ?>

<menu>
    <header>
        <div class="alert alert-danger" role="alert">Voulez-vous vraiment supprimer l'item ?</div>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col" class="col-sm-2">Nom</th>
                    <th scope="col" class="col-sm-2">Prix($)</th>
                    <th scope="col">Détails</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $this->nettoyer($item['nomItem']) ?></td>
                    <td><?= $this->nettoyer($item['prix']) ?></td>
                    <td><?= $this->nettoyer($item['detailsItem']) ?></td>
                </tr>
            </tbody>
        </table>
    </header>
    <form action="AdminItems/supprimer" style="display:inline-block;" method="post">
        <input type="hidden" name="id" value="<?= $this->nettoyer($item['id']) ?>" />
        <button type="submit" class="btn btn-secondary">Confirmer</button>
    </form>
    <form action="AdminMenus/lire" style="display:inline-block;" method="post" >
        <input type="hidden" name="id" value="<?= $this->nettoyer($item['menu_id']) ?>" />
        <button type="submit" class="btn btn-light">Annuler</button>
    </form>
</menu>