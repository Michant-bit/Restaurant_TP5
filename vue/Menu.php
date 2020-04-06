<?php $titre = "Création de menus" ?>

<?php ob_start(); ?>
<menu>
    <header>
        <a href="<?= "index.php?action=menu&id=" . $menu['id'] ?>">
            <h4><?= $menu['nom'] ?></h4>
        </a>
        <h6><?= $menu['details'] ?></h6>
        De <time><?= $menu['date_debut'] ?></time> à <time><?= $menu['date_fin'] ?></time>, par utilisateur #<?= $menu['utilisateur_id'] ?>
    </header>
</menu>
<hr />
<header>
    <p class="lead">Items du menu</p>
</header>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Supprimer</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix($)</th>
            <th scope="col">Détails</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td>
                <a href="index.php?action=confirmer&id=<?= $item['id'] ?>" >
                    <svg class="bi bi-dash-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 108 1a7 7 0 000 14zm0 1A8 8 0 108 0a8 8 0 000 16z" clip-rule="evenodd"/>
                        <path fill-rule="evenodd" d="M3.5 8a.5.5 0 01.5-.5h8a.5.5 0 010 1H4a.5.5 0 01-.5-.5z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </td>
            <td><?= $item['nom'] ?></td>
            <td><?= $item['prix'] ?></td>
            <td><?= $item['details'] ?></td>
        </tr>
    <?php endforeach; ?>
    <tbody>
</table>

<form action="index.php?action=item" method="post">
    <h2>Ajouter un item</h2>
    <p>
        <label for="nom">Nom</label> : <input type="text" name="nom" id="nom" /><br />
        <label for="prix">Prix</label> :  <input type="double" name="prix" id="prix" /><br />
        <label for="details">Détails</label> :  <textarea type="text" name="details" id="details" ></textarea><br />
        <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>" /><br />
        <input type="submit" value="Envoyer" />
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'vue/Gabarit.php'; ?>

