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
    // Page d'accueil
    include_once('pages/Home.inc.php');
    break;

    case 1:
    // Page d'accueil
    include_once('pages/Products.inc.php');
    break;

    case 2:
    // Page d'accueil
    include_once('pages/About.inc.php');
    break;

    case 3:
    // Page d'accueil
    include_once('pages/Connection.inc.php');
    break;

    // case 1:
    //     if ($_SESSION['droits'] == 1) {
    //         include("pages/afficherEtudiants.inc.php");
    //     }
    //     break;

    default :
    include_once('pages/Home.inc.php');
  }

  ?>
</div>
