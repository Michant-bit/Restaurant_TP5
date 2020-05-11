<?php $this->titre = "Création de menus" ?>

<?php foreach ($menus as $menu):
    ?>
    <menu>
        <header>
            <a href="AdminMenus/lire/<?= $this->nettoyer($menu['id']) ?>">
                <h4><?= $this->nettoyer($menu['nom']) ?></h4>
            </a>
            <h6><?= $menu['details'] ?></h6>
            <h6>De <time><?= $this->nettoyer($menu['date_debut']) ?></time> à <time><?= $this->nettoyer($menu['date_fin']) ?></time>, par <?= $this->nettoyer($menu['nom_utilisateur']) ?></h6>
            <h6><?= $this->nettoyer($menu['email']) ?></h6><br>
            <a href="AdminMenus/modifier/<?= $this->nettoyer($menu['id']) ?>">
                <button type="submit" class="btn btn-primary mb-2">Modifier</button>
            </a>
            <a href="AdminMenus/supprimer/<?= $this->nettoyer($menu['id']) ?>">
                <button type="submit" class="btn btn-danger mb-2">Supprimer</button>
            </a>
        </header>
    </menu>
    <hr />
<?php endforeach; ?>