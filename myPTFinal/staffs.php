<!--
Matric Number: A189479
Name: CHEOK KAH YEEK
-->

<?php
  include_once 'staffs_crud.php';
  include_once 'redirect.php';
  include_once 'auth_level.php';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MyBasketBall Ordering System : Staff</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php include_once 'nav_bar.php'; ?>
  <div class="container-fluid">
    <div class="row" >
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Staff</h2>
        </div>
        <form action="staffs.php" method="post" class="form-horizontal">
          <div class="form-group">
            <label for="sid" class="col-sm-3 control-label">ID</label>
            <div class="col-sm-9">
              <input name="sid" type="text" class="form-control" id="sid" placeholder="staff ID" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_staff_num']; ?>" required> <br>
            </div>
          </div>

          <div class="form-group">
            <label for="fname" class="col-sm-3 control-label">First Name</label>
            <div class="col-sm-9">
              <input name="fname" type="text" class="form-control" id="fname" placeholder="First Name" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_staff_fname']; ?>" required> <br>
            </div>
          </div>

          <div class="form-group">
            <label for="lname" class="col-sm-3 control-label">Last Name</label>
            <div class="col-sm-9">
              <input name="lname" type="text" class="form-control" id="lname" placeholder="Last Name" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_staff_lname']; ?>" required> <br>
            </div>
          </div>

          <div class="form-group">
            <label for="gender" class="col-sm-3 control-label">Gender</label>
            <div class="col-sm-9">
              <div class="radio">
                <label>
                  <input name="gender" type="radio" value="Male" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_gender'] == "Male")
                    echo "checked"; ?>> Male
                </label>
              </div>
              <div class="radio">
                <label>
                  <input name="gender" type="radio" value="Female" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_gender'] == "Female")
                    echo "checked"; ?>> Female
                </label>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="phone" class="col-sm-3 control-label">Phone</label>
            <div class="col-sm-9">
              <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_staff_phone']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
              <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?php if (isset($_GET['edit']))
                echo $editrow['fld_staff_email']; ?>" required>
            </div>
          </div>

          <div class="form-group">
            <label for="level" class="col-sm-3 control-label">User Level</label>
            <div class="col-sm-9">
              <select name="level" class="form-control" id="level" required>
                <option value="">Please select</option>
                <option value="Normal" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_level'] == "Normal")
                  echo "selected"; ?>>Normal Staff</option>
                <option value="Super" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_level'] == "Super")
                  echo "selected"; ?>>Supervisor</option>
                <option value="Admin" <?php if (isset($_GET['edit'])) if ($editrow['fld_staff_level'] == "Admin")
                  echo "selected"; ?>>Admin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="password" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-9">
              <input name="password" type="password" class="form-control" id="password" placeholder="password"  <?php echo isset($_GET['edit']) ? 'disabled' : ''; ?>  required>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <?php if (isset($_GET['edit'])) { ?>
                <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
                <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil"
                    aria-hidden="true"></span> Update</button>
              <?php } else { ?>
                <button class="btn btn-default" type="submit" name="create" <?php echo ($_SESSION['access']==='S') ? 'disabled':''?>><span class="glyphicon glyphicon-plus"
                    aria-hidden="true" ></span> Create</button>
              <?php } ?>
              <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase"
                  aria-hidden="true"></span> Clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="page-header">
          <h2>Staff List</h2>
        </div>
        <table class="table table-striped table-bordered">
          <tr>
            <th>staff ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Level</th>
            <th></th>
          </tr>

          <?php
          // Read
          $per_page = 5;
          if (isset($_GET["page"]))
            $page = $_GET["page"];
          else
            $page = 1;
          $start_from = ($page - 1) * $per_page;
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("select * from tbl_staffs_a189479_pt2 LIMIT $start_from, $per_page");
            $stmt->execute();
            $result = $stmt->fetchAll();
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
          }
          foreach ($result as $readrow) {
            ?>
            <tr>
              <td>
                <?php echo $readrow['fld_staff_num']; ?>
              </td>
              <td>
                <?php echo $readrow['fld_staff_fname']; ?>
              </td>
              <td>
                <?php echo $readrow['fld_staff_lname']; ?>
              </td>
              <td>
                <?php echo $readrow['fld_staff_gender']; ?>
              </td>
              <td>
                <?php echo $readrow['fld_staff_phone']; ?>
              </td>
              <td>
                <?php echo $readrow['fld_staff_email']; ?>
              </td>
              <td>
                <?php echo $readrow['fld_staff_level']; ?>
              </td>
              <td>
              <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs"
                  role="button"> Edit </a>
                <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>"
                  onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs"
                  role="button" <?php echo ($_SESSION['access']==='S') ? 'style="display:none;"':''?>>Delete</a>
              </td>
            </tr>
            <?php
          }
          // $conn = null;
          ?>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <nav>
          <ul class="pagination">
            <?php
            try {
              $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
              $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a189479_pt2");
              $stmt->execute();
              $result = $stmt->fetchAll();
              $total_records = count($result);
              $conn = null;
            } catch (PDOException $e) {
              echo "Error: " . $e->getMessage();
            }
            $total_pages = ceil($total_records / $per_page);
            ?>
            <?php if ($page == 1) { ?>
              <li class="disabled"><span aria-hidden="true">«</span></li>
            <?php } else { ?>
              <li><a href="staffs.php?page=<?php echo $page - 1 ?>" aria-label="Previous"><span
                    aria-hidden="true">«</span></a></li>
              <?php
            }
            for ($i = 1; $i <= $total_pages; $i++)
              if ($i == $page)
                echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
              else
                echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
            ?>
            <?php if ($page == $total_pages) { ?>
              <li class="disabled"><span aria-hidden="true">»</span></li>
            <?php } else { ?>
              <li><a href="staffs.php?page=<?php echo $page + 1 ?>" aria-label="Previous"><span
                    aria-hidden="true">»</span></a></li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
</body>

</html>