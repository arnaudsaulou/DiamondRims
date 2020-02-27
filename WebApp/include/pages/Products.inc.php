
<h1 class="text-center text-white d-none d-lg-block site-heading">
  <span class="text-primary site-heading-upper mb-3" style="font-size: 65px;color: rgb(244,172,21);">
    <img src="assets/img/DiamondRimsLogo.svg" style="width: 83px;" alt="Diamond rims logo">
    &nbsp;DIAMOND RIMS&nbsp;
  </span>
  <span class="site-heading-lower" style="font-size: 41px;">
    DIAMOND IS ETERNAL.<br>SO IS OUR CRAFTMANSHIP.<br>
  </span>
</h1>

<div class="container">

  <div class="row light-search-bar">
      <div class="col-sx-12">
          <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
              <div class="container">
                  <div class="collapse navbar-collapse" id="navcol-1">
                      <ul class="nav navbar-nav">
                          <li role="presentation" class="nav-item">
                            <select style="margin-right: 15px;">
                              <optgroup label="Brand">
                                <option value="1" selected>Abarth</option>
                                <option value="13">This is item 2</option>
                                <option value="14">This is item 3</option>
                              </optgroup>
                            </select>
                          </li>
                          <li role="presentation" class="nav-item">
                            <select style="margin-right: 15px;">
                              <optgroup label="Model">
                                <option value="1" selected>124 Spider</option>
                                <option value="13">This is item 2</option>
                                <option value="14">This is item 3</option>
                              </optgroup>
                            </select>
                          </li>
                          <li role="presentation" class="nav-item">
                            <select>
                              <optgroup label="Milage">
                                <option value="1" selected>0 - 1000 Km</option>
                                <option value="13">This is item 2</option>
                                <option value="14">This is item 3</option>
                              </optgroup>
                            </select>
                          </li>
                      </ul>
                      <form class="form-inline ml-auto" target="_self" style="margin-right: 20px;">
                          <div class="form-group">
                            <label for="search-field">
                              <i class="fa fa-search" style="filter: brightness(50%);"></i>
                            </label>
                            <input type="search" class="form-control search-field" id="search-field" name="search" style="filter: brightness(100%) contrast(100%);"/>
                          </div>
                      </form>
                      <a class="btn btn-light action-button" role="button" href="#">
                        Search
                      </a>
                    </div>
              </div>
          </nav>
      </div>
  </div>

  <div class="row product-list dev">

    <?php
    $carList = $carManager->getAllCars();
    foreach ($carList as $car) {
      $model = $modelManager->getModelById($car->getModelId());
      $brand = $brandManager->getBrandById($model->getBrandId());
      $picture = $pictureManager->getMainPictureByCarId($car->getCarId());

      ?>

      <div class="col-sm-6 col-md-4 product-item animation-element slide-top-left">

        <div class="product-container">

          <div class="row">
            <div class="col-md-12">
              <a class="product-image" href="index.php?page=7&id=<?php echo $car->getCarId(); ?>">
                <img src="public/carPictures/<?php echo $picture->getPictureName(); ?> " alt="<?php echo $picture->getPictureDescription(); ?>">
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <h2>
                <a href="index.php?page=7&id=<?php echo $car->getCarId(); ?>"><?php echo $brand->getBrandName(), " - ", $model->getModelName(); ?></a>
              </h2>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <p class="product-description">
                <?php
                  $description = $car->getCarDescription();
                  if(strlen($description) > 255){
                    echo substr($description, 0, 255), "...";
                  } else {
                    echo $description;
                  }

                ?>
              </p>
              <div class="row">
                <div class="col-6">
                  <form action="index.php?page=7&id=<?php echo $car->getCarId(); ?>" method="POST">
                    <button class="btn btn-dark" type="submit">Buy Now!</button>
                  </form>
                </div>
                <div class="col-6">
                  <p class="product-price">$<?php echo $car->getCarPrice(); ?> </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        }
      ?>
  </div>
</div>
