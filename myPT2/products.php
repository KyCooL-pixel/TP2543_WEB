<!--
Matric Number: A189479
Name: CHEOK KAH YEEK
-->
<?php
include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>My BasketBall Ordering System : Products</title>
</head>

<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="products.php" method="post">
      Product ID
      <input name="pid" type="text" value="<?php if (isset($_GET['edit']))
        echo $editrow['fld_product_num']; ?>"> <br>
      Name
      <input name="name" type="text" value="<?php if (isset($_GET['edit']))
        echo $editrow['fld_product_name']; ?>"> <br>
      Price
      <input name="price" type="text" value="<?php if (isset($_GET['edit']))
        echo $editrow['fld_product_price']; ?>">
      <br>
      Brand
      <select name="brand">
        <option value="Nike" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Nike")
          echo "selected"; ?>>Nike</option>
        <option value="Adidas" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Adidas")
          echo "selected"; ?>>Adidas</option>
        <option value="Under Armour" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Under Armour")
          echo "selected"; ?>>Under Armour</option>
        <option value="Puma" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Puma")
          echo "selected"; ?>>Puma</option>
        <option value="Jordan" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Jordan")
          echo "selected"; ?>>Jordan</option>

      </select> <br>
      Year Of Warranty
      <input name="warranty" type="text" value="<?php if (isset($_GET['edit']))
        echo $editrow['fld_product_warranty']; ?>"> <br>
      Quantity
      <input name="quantity" type="text" value="<?php if (isset($_GET['edit']))
        echo $editrow['fld_product_quantity']; ?>"> <br>
      <?php if (isset($_GET['edit'])) { ?>
        <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
        <button type="submit" name="update">Update</button>
      <?php } else { ?>
        <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1">
      <tbody>
        <tr>
          <td>Product ID</td>
          <td>Name</td>
          <td>Price</td>
          <td>Brand</td>
          <td></td>
        </tr>
        <?php
        // Read
        try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a189479_pt2");
          $stmt->execute();
          $result = $stmt->fetchAll();
        } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
        }
        foreach ($result as $readrow) {
          ?>
          <tr>
            <td>
              <?php echo $readrow['fld_product_num']; ?>
            </td>
            <td>
              <?php echo $readrow['fld_product_name']; ?>
            </td>
            <td>
              <?php echo $readrow['fld_product_price']; ?>
            </td>
            <td>
              <?php echo $readrow['fld_product_brand']; ?>
            </td>
            <td>
              <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>">Details</a>
              <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>">Edit</a>
              <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>"
                onclick="return confirm('Are you sure to delete?');">Delete</a>
            </td>
          </tr>
          <?php
        }
        $conn = null;
        ?>
    </table>
  </center>

</body>

</html>