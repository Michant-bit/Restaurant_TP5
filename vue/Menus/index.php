<?php $this->titre = "Création de menus" ?>

<?php foreach ($menus as $menu):
    ?>
    <menu>
        <header>
            <a href="Menus/lire/<?= $this->nettoyer($menu['id']) ?>">
                <h4><?= $this->nettoyer($menu['nom']) ?></h4>
            </a>
            <h6><?= $menu['details'] ?></h6>
            <h6>De <time><?= $this->nettoyer($menu['date_debut']) ?></time> à <time><?= $this->nettoyer($menu['date_fin']) ?></time>, par <?= $this->nettoyer($menu['nom_utilisateur']) ?></h6>
            <h6><?= $this->nettoyer($menu['email']) ?></h6>
            <small class="text-muted">Vous devez être connecté pour modifier ou supprimer ce menu</small>
        </header>
    </menu>
    <hr />
<?php endforeach; ?>