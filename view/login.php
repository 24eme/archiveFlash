<!doctype html>
<html lang="fr">
<title>Connexion</title>
<head>
<?php include_once '../view/template/header.php'; ?>
</head>

<body class="text-center center-block">
<main class="form-signin w-25 ml-auto mr-auto mt-5">
  <form>
    <h1 class="h3 mb-3 fw-normal">Connectez-vous</h1>
    <label for="inputEmail" class="visually-hidden mt-3">Identifiant</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Identifiant" required autofocus>
    <label for="inputPassword" class="visually-hidden mt-3">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
    <div class="checkbox mb-3">
      <label>
        <input class="mt-2" type="checkbox" value="remember-me"> Se souvenir de moi
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
  </form>
</main>
</div>

    
  </body>

<?php include_once '../view/template/footer.php'; ?>

</html>
