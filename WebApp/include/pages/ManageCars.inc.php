<?php

//Handle the car update
if(isset($_POST['carMilageInput']) && isset($_POST['carColorInput']) &&
isset($_POST['carPriceInput']) && isset($_POST['carDescriptionInput']) &&
isset($_POST['carModelInput'])  && isset($_POST['pictureNames'])
&& isset($_POST['pictureDescriptions']) && isset($_GET['action'])){

  if($_GET['action'] == 0) {

    //Create Car object with POST values
    $newCar = new Car(
      array(
        "CAR_MILAGE"=>$_POST['carMilageInput'],
        "CAR_COLOR"=>$_POST['carColorInput'],
        "CAR_PRICE"=>$_POST['carPriceInput'],
        "CAR_DESCRIPTION" => $_POST['carDescriptionInput'],
        "MODEL_ID" => $_POST['carModelInput']
      )
    );

    //Call manager to create new car in the database
    $carManager->addCar($newCar);

    for($i = 0; $i < count($_POST['pictureNames']); $i++){

      if($_POST['pictureNames'][$i] != ""){

        $newPicture = new Picture(
          array(
            "PICTURE_NUM"=>$i,
            "PICTURE_NAME" => $_POST['pictureNames'][$i],
            "PICTURE_DESCRIPTION"=> $_POST['pictureDescriptions'][$i],
            "CAR_ID"=>$carManager->getLastInsertId()
          )
        );

        $pictureManager->addPicture($newPicture);
      } else {
        break;
      }
    }


  } elseif ($_GET['action'] == 1 && isset($_GET['id'])) {

    //Create Car object with POST values
    $updatedCar= new Car(
      array(
        "CAR_ID"=>$_GET['id'],
        "CAR_MILAGE"=>$_POST['carMilageInput'],
        "CAR_COLOR"=>$_POST['carColorInput'],
        "CAR_PRICE"=>$_POST['carPriceInput'],
        "CAR_DESCRIPTION" => $_POST['carDescriptionInput'],
        "MODEL_ID" => $_POST['carModelInput']
      )
    );

    //Call manager to update the car in the database
    $carManager->updateCar($updatedCar);

    //Update = Delete then add (More simple than update)

    //Delete
    $pictureManager->deletePictureByCarId($_GET['id']);

    //Add
    for($i = 0; $i < count($_POST['pictureNames']); $i++){

      if($_POST['pictureNames'][$i] != ""){

        $newPicture = new Picture(
          array(
            "PICTURE_NUM"=>$i,
            "PICTURE_NAME" => $_POST['pictureNames'][$i],
            "PICTURE_DESCRIPTION"=> $_POST['pictureDescriptions'][$i],
            "CAR_ID"=> $_GET['id']
          )
        );

        $pictureManager->addPicture($newPicture);

      } else {
        break;
      }
    }
  }

  //Redirect the user
  //exit(header("Location:./index.php?page=4&option=1&brand=",$_GET['brand']));
  ?><script> window.location.href="./index.php?page=4&option=2";  </script><?php

}


//If a special action to a special model has been asked
if(isset($_GET['action'])){

  $brandName = $brandManager->getBrandById($_GET['brand'])->getBrandName();

  //Add
  if($_GET['action'] == 0) {

    ?>

    <h3 class="col-12 mb-4 mt-4">Add a new <?php echo $brandName; ?> car</h3>

    <!--  Display add model form -->
    <form class="col-md-12" action="index.php?page=4&option=2&action=0" method="post">

      <div class="form-group">
        <label for="carModelInput">Car model</label>
        <select class="form-control" id="carModelInput" name="carModelInput" required>

          <?php

          $modelList = $modelManager->getAllModelsByBrand($_GET['brand']);

          foreach ($modelList as $model) {
            ?>
            <option value="<?php echo $model->getModelId(); ?>"><?php echo $model->getModelName(); ?></option>
            <?php
          }
          ?>

        </select>
      </div>

      <div class="form-group">
        <label for="carColorInput">Car color</label>
        <input
        type="text" class="form-control" id="carColorInput" name="carColorInput"
        placeholder="Please enter a color for this car" required >
      </div>

      <div class="form-group">
        <label for="carMilageInput">Car milage</label>
        <input
        type="number" class="form-control" id="carMilageInput" name="carMilageInput"
        placeholder="Please enter a milage for this car"
        min="0" max="500000" required >
      </div>

      <div class="form-group">
        <label for="carDescriptionInput">Car description</label>
        <textarea
        class="form-control" id="carDescriptionInput" rows="3" name="carDescriptionInput"
        placeholder="Please enter a description for this car" required></textarea>
      </div>

      <div class="form-group">
        <label for="carPriceInput">Car price</label>
        <input
        type="number" class="form-control" id="carPriceInput" name="carPriceInput"
        placeholder="Please enter the price of this car" min="0" max="60000000"
        required >
      </div>

      <div class="picturesPicker">
        <div class="form-group py-2">
          <label for="mainPictureInput">Main picture</label>
          <div class="form-control py-1" id="mainPictureInput">
            <input name="pictureNames[]" type="file" accept=".webp" required/>
            <input class="form-control" name="pictureDescriptions[]" type="text"
            placeholder="Please enter a description for this picture"
            required/>
          </div>
        </div>

        <div class="form-group">
          <label for="sidePictureInput">Side pictures (optional)</label>
          <div class="form-control" id="sidePictureInput">

            <div class="form-control py-2 mb-2 mt-2" id="sidePictureInput">
              <input name="pictureNames[]" type="file" accept=".webp"/>
              <input  class="form-control" name="pictureDescriptions[]" type="text"
              placeholder="Please enter a description for this picture"/>
            </div>

            <div class="form-control py-2 mb-2 mt-2" id="sidePictureInput">
              <input name="pictureNames[]" type="file" accept=".webp"/>
              <input  class="form-control" name="pictureDescriptions[]" type="text"
              placeholder="Please enter a description for this picture"/>
            </div>

            <div class="form-control py-2 mb-2 mt-2" id="sidePictureInput">
              <input name="pictureNames[]" type="file" accept=".webp"/>
              <input  class="form-control" name="pictureDescriptions[]" type="text"
              placeholder="Please enter a description for this picture"/>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>


    <?php
    //Update
  } elseif($_GET['action'] == 1 && isset($_GET['id'])) {

    $car = $carManager->getCarById($_GET['id']);
    ?>

    <h3 class="col-12 mb-4 mt-4">Update a <?php echo $brandName; ?> car</h3>

    <!--  Display update car form -->
    <form class="col-md-12" action="index.php?page=4&option=2&action=1&id=<?php echo $_GET['id']; ?>" method="post">

      <div class="form-group">
        <label for="carModelInput">Car model</label>
        <select class="form-control" id="carModelInput" name="carModelInput" required>

          <?php

          $modelList = $modelManager->getAllModelsByBrand($_GET['brand']);

          foreach ($modelList as $model) {
            ?>
            <option value="<?php echo $model->getModelId(); ?>"
              <?php if($model->getModelId() == $car->getModelId()){ ?> selected <?php } ?>>
              <?php echo $model->getModelName(); ?>
            </option>
            <?php
          }
          ?>

        </select>
      </div>

      <div class="form-group">
        <label for="carColorInput">Car color</label>
        <input
        type="text" class="form-control" id="carColorInput" name="carColorInput"
        placeholder="Please enter a color for this car"
        value="<?php echo $car->getCarColor(); ?>"
        required >
      </div>

      <div class="form-group">
        <label for="carMilageInput">Car milage</label>
        <input
        type="number" class="form-control" id="carMilageInput" name="carMilageInput"
        placeholder="Please enter a milage for this car"
        min="0" max="500000" value="<?php echo $car->getCarMilage(); ?>" required >
      </div>

      <div class="form-group">
        <label for="carDescriptionInput">Car description</label>
        <textarea
        class="form-control" id="carDescriptionInput" rows="3" name="carDescriptionInput"
        placeholder="Please enter a description for this car" required><?php echo $car->getCarDescription(); ?></textarea>
      </div>

      <div class="form-group">
        <label for="carPriceInput">Car price</label>
        <input
        type="number" class="form-control" id="carPriceInput" name="carPriceInput"
        placeholder="Please enter the price of this car" min="0" max="60000000"
        value="<?php echo $car->getCarPrice(); ?>" required >
      </div>

      <?php
        $pictureList = $pictureManager->getAllPicturesByCarId($car->getCarId());
      ?>

      <div class="picturesPicker">
        <div class="form-group py-2">
          <label for="mainPictureInput">Main picture</label>
          <div class="form-control py-1" id="mainPictureInput">
            <input name="pictureNames[]" type="file" accept=".webp"
            required/>
            <input class="form-control" name="pictureDescriptions[]" type="text"
            placeholder="Please enter a description for this picture"
            value="<?php if(count($pictureList) > 0){ echo $pictureList[0]->getPictureDescription();} ?>"
            required/>
          </div>
        </div>

        <div class="form-group">
          <label for="sidePictureInput">Side pictures (optional)</label>
          <div class="form-control" id="sidePictureInput">

            <div class="form-control py-2 mb-2 mt-2" id="sidePictureInput">
              <input name="pictureNames[]" type="file" accept=".webp"/>
              <input  class="form-control" name="pictureDescriptions[]" type="text"
              value="<?php if(count($pictureList) > 1){ echo $pictureList[1]->getPictureDescription();} ?>"
              placeholder="Please enter a description for this picture"/>
            </div>

            <div class="form-control py-2 mb-2 mt-2" id="sidePictureInput">
              <input name="pictureNames[]" type="file" accept=".webp"/>
              <input  class="form-control" name="pictureDescriptions[]" type="text"
              value="<?php if(count($pictureList) > 2){ echo $pictureList[2]->getPictureDescription();} ?>"
              placeholder="Please enter a description for this picture"/>
            </div>

            <div class="form-control py-2 mb-2 mt-2" id="sidePictureInput">
              <input name="pictureNames[]" type="file" accept=".webp"/>
              <input  class="form-control" name="pictureDescriptions[]" type="text"
              value="<?php if(count($pictureList) > 3){ echo $pictureList[3]->getPictureDescription();} ?>"
              placeholder="Please enter a description for this picture"/>
            </div>
          </div>
        </div>
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>

    <?php
    //Delete
  }elseif($_GET['action'] == 2 && isset($_GET['id'])) {
    //Call manager to delete car in the database
    $carManager->deleteCarById($_GET['id']);

    //Redirect the user
    ?><script> window.location.href="./index.php?page=4&option=2";  </script><?php

  }

  //View
} else {

  //If a brand has been specified
  if(isset($_GET['brand'])){
    ?>
    <!-- Display the brands list -->
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Model</th>
          <th scope="col">Color</th>
          <th scope="col">Milage</th>
          <th scope="col">Price</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>


        <?php
        $modelList = $modelManager->getAllModelsByBrand($_GET['brand']);

        foreach ($modelList as $model) {


          $carList = $carManager->getAllCarsByModel($model->getModelId());

          foreach ($carList as $car) {

            ?>
            <tr>
              <th scope="row"><?php echo $car->getCarId(); ?></th>
              <th><?php echo $model->getModelName(); ?></th>
              <td><?php echo $car->getCarColor(); ?></td>
              <td><?php echo $car->getCarMilage(); ?></td>
              <td><?php echo $car->getCarPrice(); ?></td>

              <td>
                <a href="index.php?page=4&option=2&action=1&brand=<?php echo $model->getBrandId(); ?>&id=<?php echo $car->getCarId(); ?>">
                  <img class="crudIcon" src="assets/icon/pencilIcon.png" alt="pencil icon">
                </a>
              </td>
              <td>
                <a href="index.php?page=4&option=2&action=2&brand=<?php echo $model->getBrandId(); ?>&id=<?php echo $car->getCarId(); ?>"
                  onclick="return confirm('Are you sure you whant to delete this car ?')">
                  <img class="crudIcon" src="assets/icon/binIcon.png" alt="bin icon">
                </a>
              </td>
            </tr>

            <?php
          }
        }
        ?>

      </tbody>

    </table>

    <?php

    //List brands available
  } else {
    ?>

    <div class="row">

      <?php
      $brandList = $brandManager->getAllBrands();

      foreach ($brandList as $brand) {
        ?>
        <a href="index.php?page=4&option=2&brand=<?php echo $brand->getBrandId(); ?>" class="m-1">
          <button type="button" class="btn btn-dark">
            <?php echo $brand->getBrandName(); ?>
          </button>
        </a>

        <?php
      }
      ?>

    </div>

    <?php
  }

}
