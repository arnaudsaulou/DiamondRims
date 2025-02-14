<?php
if (empty($_POST)){
  if(isset($_SESSION['currentUser'])){
    ?>

    <div class="col col-md-4 offset-md-4 bg-light mt-3 mb-3 card-body">
      <div class="text-center">
        <i class="fa fa-hourglass"></i>
        <span class="text-center">
          <h4>Vous êtes déjà connecté, vous allez être redirigé dans 1 secondes !</h4>
        </span>
      </div>

      <div class="card-body">
        <a class="btn btn-primary btn-block" href="index.php?page=0">Cliquez ici si vous n'êtes pas redirigé</a>
      </div>
    </div>

    <meta http-equiv="refresh" content="1; URL=index.php?page=0">

    <?php
  } else {
    ?>

    <h1 class="text-center text-white d-none d-lg-block site-heading site-heading-connection">
      <span class="text-primary">
        <img src="assets/img/DiamondRimsLogo.svg" alt="Diamond Rims Logo" class="loginLogo" />
        DIAMOND RIMS
      </span>
    </h1>
    <section class="page-section cta section-connection">
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-5">
                <span class="section-heading-upper">
                  CONNECTION
                </span>
                <span class="section-heading-lower">
                  ENTER THE MAGICAL
                </span>
              </h2>
              <form action="#" method="post">
                <div class="form-row">
                  <div class="col-6 offset-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" />
                    <input type="password" class="form-control mt-3" placeholder="Password" name="password"/>
                  </div>
                </div>

                <button class="btn btn-primary mt-4" type="submit">
                  Start the experience
                </button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php
  }
} else {

  $user = $userManager->getUserByUsername($_POST['username']);

  if($user != null){
    if($user -> checkPassword($_POST['password'])){

      // le mot de passe est OK
      $_SESSION['currentUser'] = serialize($user);
?>

      <div class="col col-md-4 offset-md-4 bg-light mt-3 mb-3 card-body">
        <div class="text-center">
          <i class="fa fa-hourglass"></i>
          <span class="text-center">
            <h4>Connexion réussie !</h4>
          </span>
        </div>

        <div class="card-body">
          <a class="btn btn-primary btn-block" href="index.php?page=4">Cliquez ici si vous n'êtes pas redirigé</a>
        </div>
      </div>

      <meta http-equiv="refresh" content="1; URL=index.php?page=4">

<?php
    } else {
?>
      <div class="col col-md-4 offset-md-4 bg-light mt-3 mb-3 card-body">
        <div class="text-center">
          <i class="fa fa-exclamation-triangle"></i>
          <span class=" text-center">
            <h4>Incorrect <br/> username or password</h4>
          </span>
        </div>

        <div class="card-body">
          <a class="btn btn-primary btn-block" href="index.php?page=3">Let's try again</a>
        </div>
      </div>

<?php
    }
  } else { // le login et/ou mot de passe n'est pas OK
?>

    <div class="col col-md-4 offset-md-4 bg-light mt-3 mb-3 card-body">
      <div class="text-center">
        <i class="fa fa-exclamation-triangle"></i>
        <span class=" text-center">
          <h4>Incorrect <br/> username or password</h4>
        </span>
      </div>

      <div class="card-body">
        <a class="btn btn-primary btn-block" href="index.php?page=3">Let's try again</a>
      </div>
    </div>

    <?php
  }
}
?>
