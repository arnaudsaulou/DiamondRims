<?php
if (empty($_POST)){
  if(isset($_SESSION['currentUser'])){
    ?>
    <p>Vous êtes déjà connecté, vous allez être redirigé dans 2 secondes !</p>
    <meta http-equiv="refresh" content="2; URL=index.php">
    <?php
  } else {
    ?>

    <h1 class="text-center text-white d-none d-lg-block site-heading site-heading-connection">
      <span class="text-primary" style="font-size: 35px;color: rgb(244,172,21);">
        <img src="assets/img/DiamondRimsLogo.png" style="width: 45px;" />
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
                  <div class="col" style="max-width: 50%;margin: auto;">
                    <input type="text" class="form-control" placeholder="Username" name="username" />
                    <input type="password" class="form-control" style="margin-top: 20px;" placeholder="Password" name="password"/>
                  </div>
                </div>

                <button class="btn btn-primary" type="submit" style="margin-top: 20px;">
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
          <i class="fa fa-hourglass" style="color:green"></i>
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
          <i class="fa fa-exclamation-triangle" style="color:red"></i>
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
        <i class="fa fa-exclamation-triangle" style="color:red"></i>
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
