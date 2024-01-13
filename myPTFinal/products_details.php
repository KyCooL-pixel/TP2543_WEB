<?php
  include_once 'db.php';
?> 
<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM tbl_products_a189479_pt2 WHERE fld_product_num = :pid");
  $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $pid = $_GET['pid'];
  $stmt->execute();
  $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
?>
 
<div class="container-fluid">
  <div class="row">
    <div  style="width:100%; height:auto; border: 2px solid rgba(0, 0, 0, 0.15);padding:20px; align-item:center;">
      <?php if ($readrow['fld_product_image'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="products/<?php echo $readrow['fld_product_image'] ?>"  style="display: block; margin: 0 auto; max-width: 300px; max-height: 200px; min-width: 100px; min-height: 75px;" class="img-responsive" >
      <?php } ?>
    </div>
  </div>
  <div class="row">
    <div  style="width:100%;">
      <div class="panel panel-default">
      <div class="panel-heading"><strong>Product Details</strong></div>
      <div class="panel-body">
          Below are specifications of the product.
      </div>
      <table class="table">
        <tr>
          <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
          <td><?php echo $readrow['fld_product_num'] ?></td>
        </tr>
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['fld_product_name'] ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
          <td>RM <?php echo $readrow['fld_product_price'] ?></td>
        </tr>
        <tr>
          <td><strong>Brand</strong></td>
          <td><?php echo $readrow['fld_product_brand'] ?></td>
        </tr>
        <tr>
          <td><strong>Year Of Warranty</strong></td>
          <td><?php echo $readrow['fld_product_warranty'] ?></td>
        </tr>
        <tr>
          <td><strong>Quantity</strong></td>
          <td><?php echo $readrow['fld_product_quantity'] ?></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
</div>
