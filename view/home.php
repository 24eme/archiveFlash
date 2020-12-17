<!doctype html>
<html lang="fr">
<title>Home</title>
<head>
<?php include_once '../view/template/header.php'; ?>
</head>

<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">ArchiveFlash</h1>
        <p class="lead text-muted">ArchiveFlash est un projet de [...]</p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($files as $file) { 
          $data = open('db/games/'.$file);?>
          <a href="index.php?action=game&id=<?php echo $data['id']; ?>" style="text-decoration: none;">
            <div class="col mt-4">
              <div class="card shadow-sm">
                <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo $data['capture_link'];?>"/>

                <div class="card-body">
                  <h5><?php echo $data['name']; ?></h5>
                  <p class="card-text"><?php echo $data['description']; ?></p>
                  <!-- <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div> -->
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</main>

<?php include_once '../view/template/footer.php'; ?>

</html>