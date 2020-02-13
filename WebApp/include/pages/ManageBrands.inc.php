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

if(isset($_GET['action']) && isset($_GET['id'])){

  //Update
  if($_GET['action'] == 1) {

  }

  //Delete
  elseif($_GET['action'] == 2) {
    $brandManager->deleteBrandById($_GET['id']);
    header("location:./index.php?page=4");
    exit;
  }
}

//View
else {

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
