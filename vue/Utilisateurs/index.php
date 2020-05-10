<?php $titre = "Création de menus - Connexion" ?>

<header>
    <p class="lead">Connexion</p>
</header>
<?= ($erreur == 'mdp') ? '<div class="alert alert-danger" role="alert">Identifiant ou mot de passe incorrects</div>' : '' ?>
<form action="Utilisateurs/connecter" method="post">
  <div class="row">
    <div class="col-sm-4">
        <label>Identifiant</label>
        <input name="login" type="text" placeholder="Entrez votre nom d'identifiant" class="form-control" required autofocus>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-sm-4">
        <label>Mot de passe</label>
        <input name="mdp" type="password" placeholder="Entrez votre mot de passe" class="form-control" required>
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form><br>