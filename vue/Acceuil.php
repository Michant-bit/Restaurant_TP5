<?php $titre = "Création de menus"; ?>

<?php ob_start(); ?>
<?php foreach ($menus as $menu):
    ?>
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
<?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'vue/Gabarit.php'; ?>