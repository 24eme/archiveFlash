<!doctype html>
<html lang="fr">
<title>Ajouter un jeu</title>
<head>
<?php include_once '../view/template/header.php'; ?>
</head>

<body class="bg-light">
    
  <div class="container">
    <main>
      <div class="py-5 text-center">
        <h2>Ajouter un jeu</h2>
        <p class="lead">[...]</p>
      </div>

      <div class="row g-2">
        <div class="col-md-7 col-lg-8 mx-auto">
          <h4 class="mb-3">Infos du jeu</h4>
          <form class="needs-validation" novalidate>
            <input type="hidden" name="action" value="traitement_nG">
            <div class="row g-3">
              <div class="col-12">
                <label for="firstName" class="form-label">Titre du jeu</label>
                <input type="text" name="titre" class="form-control mb-3" id="title" placeholder="Titre" value="" required>
              </div>

              <div class="col-12">
                <label class="form-label">Description</label>
                <div class="input-group">
                  <input type="text" name="description" class="form-control mb-3" id="username" placeholder="Gameplay,contrôles,..." required>
                </div>
              </div>

              <div class="col-12">
                <label class="form-label">License</label><br/>
                  <input type="radio" id="d-p" name="licence" value="Domaine public"> <label for="d-p">Domaine public</label><br>
                  <input type="radio" id="s-l" name="licence" value="Sous licence"> <label for="s-l">Sous licence : </label>
                  <span><input type="text" name="licence-name" placeholder="Nom de la licence"></span><label class="ml-2 mr-2"> jusqu'au :</label><input type="date" id="licence-end" name="licence-end">
                  <br/>
                  <input class="mb-4" type="radio" id="n-r" name="licence" value="Non renseigné" checked> <label for="n-r">Non renseigné</label>
              </div>

              <div class="col-6">
                <label class="form-label">Émulateurs</label><br/>
                <input type="radio" id="n-t" name="émul-test" value="Non compatible avec Ruffle" checked> <label for="n-r">Non compatible avec Ruffle</label><br/>
                <input class="mb-3" type="radio" id="c-a" name="émul-test" value="Compatible avec Ruffle"> <label for="n-r">Compatible avec Ruffle</label>
              </div>
            </div>

            <hr class="my-4">

            <h4 class="mb-3">Liens des fichiers du jeu</h4>

            <div class="row g-3">
              <div class="col-12">
                <label class="form-label">Lien vers le fichier .swf <br/> <i>ex : https://archive.org/download/xxxx/file_name.swf</i></label>
                <input type="url" class="form-control mb-3" id="swf_link" name="swf_link" placeholder="" value="" required>
              </div>

              <div class="col-12">
                <label class="form-label">Lien vers la capture du jeu <br/> <i>ex : https://archive.org/download/xxxx/capture_name.png</i></label>
                <div class="input-group">
                  <input type="url" class="form-control mb-3" id="capture_link" name="capture_link" placeholder="" required>
                </div>
              </div>

              <div class="col-12">
                <label class="form-label">Lien de téléchargement des fichiers <br/> <i>ex : https://archive.org/download/xxxx</i></label>
                <div class="input-group">
                  <input type="url" class="form-control mb-3" id="download_link" name="download_link" placeholder="" required>
                </div>
              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Ajouter le jeu</button>
          </form>
        </div>
      </div>
    </main>
  </div>
</body>

<?php include_once '../view/template/footer.php'; ?>

</html>