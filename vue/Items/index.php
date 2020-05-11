<?php $this->titre = "Création de menus" ?>

<?php foreach ($items as $item):
    ?>
    <item>
        <header>
            <h4><?= $this->nettoyer($item['nom']) ?></h4>
            <h6><?= $item['prix'] ?></h6>
            <h6><?= $this->nettoyer($item['prix']) ?><?= $this->nettoyer($item['details']) ?></h6>
            <small class="text-muted">Vous devez être connecté pour modifier ou supprimer cette item</small>
        </header>
</item>
    <hr />
<?php endforeach; ?>