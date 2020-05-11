<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8"/>
        <base href="<?= $racineWeb ?>" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <link href="../contenu/css/noSpace.css" rel="stylesheet" type="text/css" />
        <title><?= $titre ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">
            <svg class="bi bi-house-fill" width="2em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"/>
            </svg>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Acceuil<span class="sr-only"></span></a>
              </li>
              <?php if ($utilisateur != '') : ?>
                <li class="nav-item">
                  <a class="nav-link" href="AdminMenus/ajouter">Ajouter un menu</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tests.php">Tests</a>
                </li>
              <?php endif; ?>
              <li class="nav-item">
                  <a class="nav-link" href="apropos">À propos</a>
              </li>
              
            </ul>
            <?php if ($utilisateur != '') : ?>
              <form class="form-inline" action="Utilisateurs/deconnecter" method="post">
                <span class="navbar-text mr-sm-2">
                  Bienvenue <?= $utilisateur ?><br>
                </span>
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Se déconnecter</button>
              </form>
            <?php else : ?>
              <form class="form-inline" action="Utilisateurs/index" method="post">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Se connecter</button>
              </form>
            <?php endif; ?>
          </div>
        </nav>
        <div class="jumbotron">
          <p class="lead">Bienvenue sur la page web de création de menus !</p>
          <hr class="my-2">
          <?php if ($utilisateur == '') : ?>
            <div class="alert alert-primary" role="alert">Vous devez être connecté pour pouvoir ajouter, modifier ou supprimer un menu</div>
          <?php endif; ?>
          <header>
            <a href="index.php"></a>
          </header>
          <?php
            // Vérifier s'il y a un message d'avertissement à afficher
            if (isset($message) and $message != '') {
                    echo '<p class="erreur">' . $message . '</p><br/>';
            }
            ?>
          <div id="contenu">
            <?= $contenu ?>
          <div>
        </div>
        <div class="card-footer text-muted">
            Page web réalisé avec PHP, HTML5 et Bootstrap
        </div>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

    </body>
</html>