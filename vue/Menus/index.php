<?php $this->titre = "Création de menus" ?>

<?php foreach ($menus as $menu):
    ?>
    <menu>
        <header>
            <a href="Menus/lire/<?= $this->nettoyer($menu['id']) ?>">
                <h4><?= $this->nettoyer($menu['nom']) ?></h4>
            </a>
            <h6><?= $menu['details'] ?></h6>
            De <time><?= $this->nettoyer($menu['date_debut']) ?></time> à <time><?= $this->nettoyer($menu['date_fin']) ?></time>, par <?= $this->nettoyer($menu['email']) ?>
            <br /><br />
            <a href="Menus/modifier/<?= $this->nettoyer($menu['id']) ?>">
                <button type="submit" class="btn btn-primary mb-2">Modifier</button>
            </a>
            <a href="Menus/supprimer/<?= $this->nettoyer($menu['id']) ?>">
                <button type="submit" class="btn btn-danger mb-2">Supprimer</button>
            </a>
        </header>
    </menu>
    <hr />
<?php endforeach; ?>