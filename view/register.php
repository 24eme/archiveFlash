<!doctype html>
<html lang="fr">
<title>Inscription</title>
<head>
<?php include_once '../view/template/header.php'; ?>
</head>

<body class="text-center center-block">
<main class="form-signin w-25 ml-auto mr-auto mt-5">
  <form>
    <h1 class="h3 mb-3 fw-normal">Inscrivez-vous</h1>
    <label for="inputId" class="visually-hidden mt-3">Identifiant</label>
    <input type="email" id="inputId" class="form-control" placeholder="Identifiant" required autofocus>
    <label for="inputEmail" class="visually-hidden mt-3">Email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email" required>
    <label for="inputPassword" class="visually-hidden mt-3">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
    <label for="confirmPassword" class="visually-hidden mt-3">Confirmez le mot de passe</label>
    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmez le mot de passe" required>
    <div class="checkbox mb-3 mt-3">
      <label>
        <input class="mt-2" type="checkbox" value="remember-me"> J'accepte les Conditions Générales d'Utilisation
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Inscription</button>
  </form>
</main>
</div>

    
  </body>

<?php include_once '../view/template/footer.php'; ?>

</html>
