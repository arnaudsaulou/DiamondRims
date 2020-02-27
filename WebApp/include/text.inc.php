<div class="texte">
  <?php

  if (!empty($_GET["page"])) {
    $page = $_GET["page"];
  } else {
    $page = 0;
  }

  // TODO Connexion system
  // if (!isset($_SESSION['droits'])) {
  //     $page = 3; // si la personne n'est pas connectée elle est redirigée vers la page de connexion
  // }

  switch ($page) { //pour chaque cas on test si la personne a les droits d'acceder à la page

    case 0:
    // Home page
    include_once('pages/Home.inc.php');
    break;

    case 1:
    // Product page
    include_once('pages/Products.inc.php');
    break;

    case 2:
    // About page
    include_once('pages/About.inc.php');
    break;

    case 3:
    // Login page
    include_once('pages/Login.inc.php');
    break;

    case 4:

    //If a user is connected
    if(isset($_SESSION['currentUser'])){
      $user = unserialize($_SESSION['currentUser']);

      //If current user is admin
      if($user->getUserId() == 1){
        // Admin manage page
        include_once('pages/Manage.inc.php');
      }
      //else it is a standard user
      else {
        include_once('pages/Login.inc.php');
      }
    }
    //Else if no user conected
    else {
      include_once('pages/Login.inc.php');
    }
    break;

    case 5:
    //TODO User account page
    include_once('pages/.inc.php');
    break;

    case 6:
      // Logout and redirect to home page
      session_destroy ();
      exit(header("Location:./index.php?page=0"));
    break;

    case 7:
    // Details product page
    include_once('pages/ProductsDetails.inc.php');
    break;

    default :
    include_once('pages/Home.inc.php');
  }

  ?>
</div>
