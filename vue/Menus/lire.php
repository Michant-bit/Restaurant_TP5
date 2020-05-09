<?php $this->titre = "Création de menus" ?>

<menu>
    <header>
        <a href="<?= $this->nettoyer($menu['id']) ?>">
            <h4><?= $this->nettoyer($menu['nom']) ?></h4>
        </a>
        <h6><?= $this->nettoyer($menu['details']) ?></h6>
        De <time><?= $this->nettoyer($menu['date_debut']) ?></time> à <time><?= $this->nettoyer($menu['date_fin']) ?></time>, par utilisateur #<?= $this->nettoyer($menu['utilisateur_id']) ?>
    </header>
</menu>
<hr />
<header>
    <p class="lead">Items du menu</p>
</header>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-sm-2">Supprimer</th>
            <th scope="col" class="col-sm-2">Nom</th>
            <th scope="col" class="col-sm-2">Prix($)</th>
            <th scope="col">Détails</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td>
                <a href="Items/confirmer/<?= $this->nettoyer($item['id']) ?>" >
                    <svg class="bi bi-dash-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </td>
            <td><?= $this->nettoyer($item['nom']) ?></td>
            <td><?= number_format((float) $this->nettoyer($item['prix']) , 2, '.', '')?></td>
            <td><?= $this->nettoyer($item['details']) ?></td>
        </tr>
    <?php endforeach; ?>
    <tbody>
</table>
<hr />
<header>
        <p class="lead">Ajouter un item</p>
</header>
<?= ($erreur == 'dollar') ? '<div class="alert alert-danger" role="alert">Veuillez entrer un prix valide (Ex. 12.99)</div>' : '' ?> 
<form action="Items/ajouter" method="post">
    <p>
        <div class="row">
            <div class="col-sm-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom"/> <br />
            </div>
            <div class="col-sm-1">
                <label for="prix">Prix($)</label>
                <input type="double" class="form-control" name="prix" id="prix"/> <br />
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="details">Détails</label>
                <textarea type="text" class="form-control" name="details" id="details"></textarea><br />
            </div>
        </div>
        <input type="hidden" name="menu_id" value="<?= $this->nettoyer($menu['id']) ?>" /><br />
        <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
    </p>
</form>

