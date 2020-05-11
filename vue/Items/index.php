<?php $this->titre = "Création de menus" ?>

<?php foreach ($items as $item):
    ?>
    <item>
        <header>
            <?php if ($utilisateur != '') : ?>
                <a href="AdminMenus/lire/<?= $this->nettoyer($item['menu_id']) ?>">
                    <h4><?= $this->nettoyer($item['nomItem']) ?> (<?= $item['prix'] ?> $)</h4>
                </a>
            <?php else : ?>
                <a href="Menus/lire/<?= $this->nettoyer($item['menu_id']) ?>">
                    <h4><?= $this->nettoyer($item['nomItem']) ?> (<?= $item['prix'] ?> $)</h4>
                </a>
            <?php endif; ?>
            <h6><?= $this->nettoyer($item['detailsItem']) ?></h6>
            <h6>Du menu [<?= $this->nettoyer($item['nom']) ?>]</h6>
        </header>
    </item>
    <hr />
<?php endforeach; ?>