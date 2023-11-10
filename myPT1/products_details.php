<!DOCTYPE html>
<html>

<head>
  <title>My BasketBall Ordering System : Products Details</title>
</head>

<body>
  <center>
    <div class="product_detail">
      <a href="index.php">Home</a> |
      <a href="products.php">Products</a> |
      <a href="customers.php">Customers</a> |
      <a href="staffs.php">Staffs</a> |
      <a href="orders.php">Orders</a>
      <hr>
      <strong>Product ID:</strong> P001 <br>
      <strong>Name:</strong> Nike Elite Basketball <br>
      <strong>Price:</strong> RM 1599.00 <br>
      <strong>Brand:</strong> Nike <br>
      <strong>Year of Warranty:</strong> 2 <br>
      <strong>Quantity:</strong> 5 <br>
      <img src="products/P001.jpeg" alt="Product Image">
    </div>
  </center>
</body>

</html>

<style>
    .product_detail {
        text-align: left;
        padding-left: 20px;
    }

    .product_detail a {
        text-decoration: none;
        color: #333;
    }

    hr {
        margin-top: 20px;
    }

    .product_detail img {
        max-width: 100%;
        height: auto;
    }
</style>
