<!--
Matric Number: A189479
Name: CHEOK KAH YEEK
-->
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
      <label for="pid">Product ID</label>
      <input name="pid" type="text"> <br>

      <label for="name">Name</label>
      <input name="name" type="text"> <br>

      <label for="price">Price</label>
      <input name="price" type="text"> <br>

      <label for="brand">Brand</label>
      <select name="brand">
        <option value="" disabled selected>Select a Brand</option>
        <option value="1">Nike</option>
        <option value="2">Adidas</option>
        <option value="3">Under Armour</option>
        <option value="4">Puma</option>
        <option value="5">Jordan</option>
      </select> <br>

      <label for="YoW">Year of Warranty</label>
      <input name="YoW" type="text"> <br>

      <label for="quantity">Quantity</label>
      <input name="quantity" type="text"> <br>

      <button type="submit" name="create">Create</button>
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
          <td>Year of Warranty</td>
          <td></td>
        </tr>
        <tr>
          <td>P001</td>
          <td>Nike Elite BasketBall</td>
          <td>1599</td>
          <td>Nike</td>
          <td>2</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>
        <tr>
          <td>P002</td>
          <td>Nike Elite Plus Basketball</td>
          <td>1899</td>
          <td>Nike</td>
          <td>2</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P003</td>
          <td>Adidas Pro Slam</td>
          <td>1299</td>
          <td>Adidas</td>
          <td>3</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P004</td>
          <td>Under Armour Thunder Dunk</td>
          <td>1499</td>
          <td>Under Armour</td>
          <td>1</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P005</td>
          <td>Puma Swift Shot</td>
          <td>1199</td>
          <td>Puma</td>
          <td>4</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P006</td>
          <td>Jordan Dynamic Dunk</td>
          <td>1799</td>
          <td>Jordan</td>
          <td>5</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P007</td>
          <td>Basketball Pro</td>
          <td>999</td>
          <td>Nike</td>
          <td>2</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P008</td>
          <td>Sky High Hoop</td>
          <td>1299</td>
          <td>Adidas</td>
          <td>3</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P009</td>
          <td>Court King</td>
          <td>1499</td>
          <td>Under Armour</td>
          <td>1</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>

        <tr>
          <td>P010</td>
          <td>Power Bounce</td>
          <td>1199</td>
          <td>Puma</td>
          <td>4</td>
          <td>
            <a href="products_details.php">Details</a>
            <a href="products.php">Edit</a>
            <a href="products.php">Delete</a>
          </td>
        </tr>
      </tbody>
    </table>
  </center>

</body>

</html>

<style>
  form {
    text-align: left;
    padding-left: 200px;
  }

  label {
    display: inline-block;
    width: 200px;
    /* Adjust the width based on your needs */
    margin-bottom: 7px;
  }

  input,
  select {
    margin-bottom: 7px;
    width: 200px;
  }

  hr {
    margin-top: 20px;
  }
</style>