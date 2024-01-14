<?php
include_once 'products_crud.php';
include_once 'redirect.php';
include_once 'auth_level.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>My Bike Ordering System : Products</title>
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

  <?php include_once 'nav_bar.php'; ?>

  <div class="container-fluid">
    <div class="row" <?php echo ($_SESSION['access'] === 'N') ? 'style="display:none;"' : '' ?>>
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Product</h2>
        </div>
        <form action="products.php" method="post" class="form-horizontal">

          <div class="form-group">
            <label for="productid" class="col-sm-3 control-label">ID</label>
            <div class="col-sm-9">
              <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_product_num']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="productname" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-9">
              <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_product_name']; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="productprice" class="col-sm-3 control-label">Price</label>
            <div class="col-sm-9">
              <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price"
                value="<?php if (isset($_GET['edit']))
                  echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>
            </div>
          </div>
          <div class="form-group">
            <label for="productbrand" class="col-sm-3 control-label">Brand</label>
            <div class="col-sm-9">
              <select name="brand" class="form-control" id="productbrand" required>
                <option value="">Please select</option>
                <option value="Under Armour" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Kawasaki")
                  echo "selected"; ?>>Under Armour</option>
                <option value="Nike" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Honda")
                  echo "selected"; ?>>Nike</option>
                <option value="Puma" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Suzuki")
                  echo "selected"; ?>>Puma</option>
                <option value="Adidas" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Yamaha")
                  echo "selected"; ?>>Adidas</option>
                <option value="Jordan" <?php if (isset($_GET['edit'])) if ($editrow['fld_product_brand'] == "Yamaha")
                  echo "selected"; ?>>Jordan</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="productw" class="col-sm-3 control-label">Year Of Warranty</label>
            <div class="col-sm-9">
              <input name="warranty" type="number" class="form-control" id="productw" placeholder="Year Of Warranty"
                value="<?php if (isset($_GET['edit']))
                  echo $editrow['fld_product_warranty']; ?>" min="0" required>
            </div>
          </div>

          <div class="form-group">
            <label for="productq" class="col-sm-3 control-label">Quantity</label>
            <div class="col-sm-9">
              <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity"
                value="<?php if (isset($_GET['edit']))
                  echo $editrow['fld_product_quantity']; ?>" min="0" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <?php if (isset($_GET['edit'])) { ?>
                <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
                <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil"
                    aria-hidden="true"></span> Update</button>
              <?php } else { ?>
                <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus"
                    aria-hidden="true"></span> Create</button>
              <?php } ?>
              <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase"
                  aria-hidden="true"></span> Clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("select fld_product_num,fld_product_name,fld_product_brand,fld_product_price from tbl_products_a189479_pt2 ");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $data = array();

      foreach ($result as $readrow) {
        $data[] = $readrow;
      }
      error_log(json_encode($data));
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>

    <link rel="stylesheet" type="text/css"
      href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <div class='row'>

      <div class="container mt-5">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th>Product ID</th>
              <th>Name</th>
              <th>Brand</th>
              <th>Price</th>
              <th class="exclude-columns"></th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Output table rows dynamically based on data
            foreach ($data as $row) {
              echo '<tr>';
              foreach ($row as $value) {
                echo '<td>' . $value . '</td>';
              }
              echo '             
              <td class="exclude-columns">
                  <a onclick="loadProductDetails(\'' . $row['fld_product_num'] . '\')"
                     class="btn btn-warning btn-xs" role="button">Details</a>
                  
                  <a href="products.php?edit=' . $row['fld_product_num'] . '" class="btn btn-success btn-xs"
                     role="button" ' . ($_SESSION['access'] === 'N' ? 'style="display:none;"' : '') . '>Edit</a>
                  
                  <a href="products.php?delete=' . $row['fld_product_num'] . '"
                     onclick="return confirm(\'Are you sure to delete?\');" class="btn btn-danger btn-xs" role="button" ' . ($_SESSION['access'] === 'N' ? 'style="display:none;"' : '') . '>Delete</a>
              </td>';

              echo '</tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- JavaScript to load product details dynamically -->
  <script>
    function loadProductDetails(pid) {
      // Using jQuery to load content dynamically into the modal body
      jQuery('#productDetailsContainer').load('products_details.php?pid=' + pid);
      // Show the modal
      jQuery('#productDetailsModal').modal('show');
    }
  </script>
  <script>
    $(document).ready(function () {

      var table = $('#example').DataTable({
        paging_type: 'full_numbers',
        columnDefs: [{
          targets: [3, 4],
          searchable: false
        }],
        order: [
          [1, "asc"]
        ],
        pageLength: 5,
        lengthMenu: [
          [5, 10, 20, 30, -1],
          [5, 10, 20, 30, "All"]
        ],
        buttons: [

          {
            extend: 'excel',
            exportOptions: {
              columns: ':visible:not(.exclude-columns)'
            }
          }
        ]
      });
      // Move Buttons container above DataTable
      table.buttons().container()
        .appendTo($('.dataTables_wrapper'))
        .addClass('dt-buttons-bottom-right');

    });
  </script>
  <!-- Modal container -->
  <div class="modal fade" id="productDetailsModal" tabindex="-1" role="dialog"
    aria-labelledby="productDetailsModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productDetailsModalLabel">Product Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="productDetailsContainer">
          <!-- Content will be dynamically loaded here -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" style="" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>



</body>

</html>