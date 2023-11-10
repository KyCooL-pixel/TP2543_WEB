<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM myguestbook WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 
<form method="post" action="update.php">
  Nama :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br>
  Email :
  <input type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  <br>
  How did you find me?
    <select name="find">
        <option value="From a friend" <?php echo ($result["How_did_you_find_me"] == "From a friend" ? 'selected' : ''); ?>>From a friend</option>
        <option value="I googled you" <?php echo ($result["How_did_you_find_me"] == "I googled you" ? 'selected' : ''); ?>>I googled you</option>
        <option value="Just surf on in" <?php echo ($result["How_did_you_find_me"] == "Just surf on in" ? 'selected' : ''); ?>>Just surf on in</option>
        <option value="From your Facebook" <?php echo ($result["How_did_you_find_me"] == "From your Facebook" ? 'selected' : ''); ?>>From your Facebook</option>
        <option value="I clicked an ads" <?php echo ($result["How_did_you_find_me"] == "I clicked an ads" ? 'selected' : ''); ?> >I clicked an ads</option>
    </select>
    <br>
    I like your :<br>
    <input type="hidden" name="front" value=0>
    <input type="checkbox" name="front" value=1 <?php echo ($result['Front_page'] == 1 ? 'checked':''); ?>>Front page<br>
    <input type="hidden" name="form" value=0>
    <input type="checkbox" name="form" value=1 <?php echo ($result['Form'] == 1 ? 'checked':'');?>>Form<br>
    <input type="hidden" name="userint" value=0>
    <input type="checkbox" name="userint" value=1 <?php echo ($result['User_interface'] == 1 ? 'checked':''); ?>>User interface
    <br>
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  <br>
</form>
 
</body>
</html>