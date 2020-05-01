<?php $this->$titre = "Suppression de menus" ?>

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
                    <td><?= $item['nom'] ?></td>
                    <td><?= $item['prix'] ?></td>
                    <td><?= $item['details'] ?></td>
                </tr>
            </tbody>
        </table>
    </header>
    <form action="index.php?action=supprimer" style="display:inline-block;" method="post">
        <input type="hidden" name="id" value="<?= $item['id'] ?>" />
        <button type="submit" class="btn btn-secondary">Confirmer</button>
    </form>
    <form action="index.php" style="display:inline-block;" method="get" >
        <input type="hidden" name="action" value="menu" />
        <input type="hidden" name="id" value="<?= $item['menu_id'] ?>" />
        <button type="submit" class="btn btn-light">Annuler</button>
    </form>
</menu>