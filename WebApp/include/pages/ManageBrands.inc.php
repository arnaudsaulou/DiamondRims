<?php
//Handle the brand update
if(isset($_POST['brandNameInput']) && isset($_POST['brandDescriptionInput']) && isset($_GET['action'])){

  if($_GET['action'] == 0) {

    //Create Brand object with POST values
    $newBrand = new Brand(
      array(
        "BRAND_NAME"=>$_POST['brandNameInput'],
        "BRAND_DESCRIPTION"=>$_POST['brandDescriptionInput']
      )
    );

    //Call manager to create new brand in the database
    $brandManager->addBrand($newBrand);

  } elseif ($_GET['action'] == 1) {

    //Create Brand object with POST values
    $updatedBrand = new Brand(
      array(
        "BRAND_ID"=>$_GET['id'],
        "BRAND_NAME"=>$_POST['brandNameInput'],
        "BRAND_DESCRIPTION"=>$_POST['brandDescriptionInput']
      )
    );

    //Call manager to update brand in the database
    $brandManager->updateBrandById($updatedBrand);
  }

  //Redirect the user
  ?><script> window.location.href="./index.php?page=4&option=0";  </script><?php

}


//If a special action to a special brand has been asked
if(isset($_GET['action'])){

  //Add
  if($_GET['action'] == 0){
?>

    <!--  Add brand form -->
    <form class="col-md-12" action="index.php?page=4&option=0&action=0" method="post">
      <div class="form-group">
        <label for="brandNameInput">Brand name</label>
        <input
        type="text" class="form-control" id="brandNameInput" name="brandNameInput"
        placeholder="Please enter a name for this brand" required >
      </div>

      <div class="form-group">
        <label for="brandDescriptionInput">Brand description</label>
        <textarea
        class="form-control" id="brandDescriptionInput" rows="3" name="brandDescriptionInput"
        placeholder="Please enter a description for this brand" required></textarea>
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>

<?php
  //Update
  } elseif($_GET['action'] == 1 && isset($_GET['id'])) {

    $brand = $brandManager->getBrandById($_GET['id']);
?>

    <!--  Display update brand form -->
    <form class="col-md-12" action="index.php?page=4&option=0&action=1&id=<?php echo $_GET['id'] ?>" method="post">
      <div class="form-group">
        <label for="brandNameInput">Brand name</label>
        <input
        type="text" class="form-control" id="brandNameInput" name="brandNameInput"
        placeholder="Please enter a name for this brand" value="<?php echo $brand->getBrandName(); ?>"
        required >
      </div>

      <div class="form-group">
        <label for="brandDescriptionInput">Brand description</label>
        <textarea
        class="form-control" id="brandDescriptionInput" rows="3" name="brandDescriptionInput"
        placeholder="Please enter a description for this brand"
        required><?php echo $brand->getBrandDescription(); ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary col-sm-2 offset-sm-10">VALIDATE</button>
    </form>

<?php
  //Delete
  } elseif($_GET['action'] == 2 && isset($_GET['id'])) {
    //Call manager to delete brand in the database
    $brandManager->deleteBrandById($_GET['id']);

    //Redirect the user
    ?><script> window.location.href="./index.php?page=4&option=0";  </script><?php
  }

//View
} else {
?>

  <!-- Display the brands list -->
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>

<?php
      $brandList = $brandManager->getAllBrands();

      foreach ($brandList as $brand) {
?>
        <tr>
          <th scope="row"><?php echo $brand->getBrandName(); ?></th>
          <td><?php echo $brand->getBrandDescription(); ?></td>
          <td>
            <a href="index.php?page=4&option=0&action=1&id=<?php echo $brand->getBrandId(); ?>">
              <img class="crudIcon" src="assets/icon/pencilIcon.png" alt="pencil icon">
            </a>
          </td>
          <td>
            <a href="index.php?page=4&option=0&action=2&id=<?php echo $brand->getBrandId(); ?>">
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
