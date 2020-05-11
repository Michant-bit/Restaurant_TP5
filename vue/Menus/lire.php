<?php $this->titre = "Création de menus" ?>

<menu>
    <header>
        <a href="<?= $this->nettoyer($menu['id']) ?>">
            <h4><?= $this->nettoyer($menu['nom']) ?></h4>
        </a>
        <h6><?= $this->nettoyer($menu['details']) ?></h6>
        De <time><?= $this->nettoyer($menu['date_debut']) ?></time> à <time><?= $this->nettoyer($menu['date_fin']) ?></time>, par <?= $this->nettoyer($menu['nom_utilisateur']) ?>
    </header>
</menu>
<hr />
<header>
    <p class="lead">Items du menu</p>
</header>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-sm-2">Nom</th>
            <th scope="col" class="col-sm-2">Prix($)</th>
            <th scope="col">Détails</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <?php if ($item['efface'] == '0') : ?>
            <tr>
                <td><?= $this->nettoyer($item['nom']) ?></td>
                <td><?= number_format((float) $this->nettoyer($item['prix']) , 2, '.', '')?></td>
                <td><?= $this->nettoyer($item['details']) ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    <tbody>
</table>
<hr />
<header>
        <p class="lead">Ajouter un item</p>
</header>
<div class="alert alert-secondary" role="alert">
Vous devez être connecté pour ajouter un item à ce menu
</div><br>

