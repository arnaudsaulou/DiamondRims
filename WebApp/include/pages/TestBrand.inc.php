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
