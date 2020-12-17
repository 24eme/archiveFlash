<!doctype html>
<html lang="fr">
<title>Ajouter un jeu</title>
<head>
<?php include_once '../view/template/header.php'; ?>
</head>

<main>
  <div class="row py-lg-5 text-center container mx-auto">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Comment ajouter votre jeu sur le site ?</h1>
      <p class="lead text-muted">Marche à suivre en 3 étapes</p>
    </div>
  </div>

  <div class="bg-light pt-5">
    <div class="container marketing">
      <div class="row">
        <div class="col-lg-4 text-center">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#17a2b8"/><text x="42%" y="62%" fill="white" style="font-size: 50px;">1</text></svg>

          <h2 class="mt-3">Les fichiers nécessaires</h2>
          <ul class="text-left">
            <li>Pour pouvoir proposer un jeu, il vous faut :<ul><li>Le fichier du jeu au format .swf</li><li>Une capture du jeu au format image(.png,.jpg,...)</li></ul></li>
          </ul>
        </div>
        <div class="col-lg-4 text-center">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#a7b4b8"/><text x="42%" y="62%" fill="white" style="font-size: 50px;">2</text></svg>

          <h2 class="mt-3">L'hébergement des fichiers</h2>
          <ul class="text-left">
            <li>Les fichiers ne sont pas hébergés sur le site mais sur le projet d'archive d'Internet : <a href="https://archive.org/">archive.org</a>. Pour faire héberger vos fichiers sur le site, il vous suffit de créer un compte et de suivre les consignes de la rubrique "<i title="title of search" class="fa fa-fw fa-upload"></i> UPLOAD".</li>
          </ul>
        </div>
        <div class="col-lg-4 text-center">
          <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#17a2b8"/><text x="42%" y="62%" fill="white" style="font-size: 50px;">3</text></svg>

          <h2 class="mt-3">Proposer le jeu</h2>
          <ul class="text-left">
            <li>Une fois vos fichiers hébergés, vous n'avez plus qu'à cliquer sur "Allons-y !" pour proposer votre jeu. </li>
          </ul>
        </div>
      </div> 
    </div>
    <div style="padding-bottom: 10px; margin-left: 47.8%;">
        <p><a class="btn btn-info" href="index.php?action=form" role="button">Allons-y !</a></p>
      </div>   
  </div>
</main>

<?php include_once '../view/template/footer.php'; ?>

</html>