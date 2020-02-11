<table>
    <thead>
        <tr>
            <th colspan   ="3">Brands</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>brandId</td>
        <td>brandName</td>
        <td>brandDescription</td>
      </tr>

      <?php
        $brandList    = $brandManager->getAllBrands();

        foreach ($brandList as $brand) {
      ?>
          <tr>
            <td style ="border: 1px solid #333;"><?php echo $brand->getBrandId() ?></td>
            <td style ="border: 1px solid #333;"><?php echo $brand->getBrandName() ?></td>
            <td style ="border: 1px solid #333;"><?php echo $brand->getBrandDescription() ?></td>
          </tr>
      <?php
        }
      ?>

  </tbody>
</table>


<hr>
<br>
<br>
<br>
<hr>

<table>
    <thead>
        <tr>
            <th colspan  ="3">Models</th>
        </tr>
    </thead>
    <tbody>
      <tr>
        <td>modelId</td>
        <td>modelName</td>
        <td>modelHorsePower</td>
        <td>modelDescription</td>
        <td>brandId</td>
      </tr>

      <?php
        $modelList = $modelManager->getAllModels();

        foreach ($modelList as $model) {
      ?>
          <tr>
            <td style ="border: 1px solid #333;"><?php echo $model->getModelId() ?></td>
            <td style ="border: 1px solid #333;"><?php echo $model->getModelName() ?></td>
            <td style ="border: 1px solid #333;"><?php echo $model->getModelHorsePower() ?></td>
            <td style ="border: 1px solid #333;"><?php echo $model->getModelDescription() ?></td>
            <td style ="border: 1px solid #333;"><?php echo $model->getBrandId() ?></td>
          </tr>
      <?php
        }
      ?>

  </tbody>
</table>
