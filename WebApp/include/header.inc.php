<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Online luxury car dealer">
    <meta name="author" content="The best team">

    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="theme-color" content="#212529">

    <!-- Title / favicon -->
    <title>Diamond Rims</title>
    <link href="assets/img/DiamondRimsLogo.svg" rel="icon" type="image/x-icon">
    <link rel="apple-touch-icon" href="assets/icon/AppleDiamondRimsLogo.svg">

    <!-- Reset CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/resetStyle.css" async preloadlien>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css" async preloadlien>

    <!-- Ressources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css/styles.css" async preloadlien>

</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg bg-dark py-lg-2" id="mainNav">
        <div class="container-fluid">
          <a class="navbar-brand text-uppercase d-lg-none text-expanded" href="#">Diamond Rims</a>
          <button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div
                class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav mx-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php?page=0">Home</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=1">Products</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=2">About us</a></li>

                    <?php
                      if(isset($_SESSION['currentUser'])){
                        $user = unserialize($_SESSION['currentUser']);
                        if($user->getUserId() == 1){
                    ?>
                          <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=4">Manage</a></li>
                    <?php
                        } else {
                    ?>
                          <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=5">My account</a></li>
                    <?php
                        }
                     ?>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=6">Log out</a></li>
                    <?php } else { ?>
                      <li class="nav-item" role="presentation"><a class="nav-link" href="index.php?page=3">Log in</a></li>
                    <?php } ?>
                </ul>
        </div>
        </div>
    </nav>
