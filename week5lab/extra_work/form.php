<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 
<form method="post" action="insert.php">
  Nama :
  <input type="text" name="name" size="40" required>
  <br>
  Email :
  <input type="text" name="email" size="25" required>
  <br>
  How did you find me?
    <select name="find">
        <option value="From a friend">From a friend</option>
        <option value="I googled you">I googled you</option>
        <option value="Just surf on in">Just surf on in</option>
        <option value="From your Facebook">From your Facebook</option>
        <option value="I clicked an ads">I clicked an ads</option>
    </select>
    <br>
    I like your :<br>
    <input type="hidden" name="front" value=0>
    <input type="checkbox" name="front" value=1>Front page<br>
    <input type="hidden" name="form" value=0>
    <input type="checkbox" name="form" value=1>Form<br>
    <input type="hidden" name="userint" value=0>
    <input type="checkbox" name="userint" value=1>User interface
    <br>
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required></textarea>
  <br>
  <input type="submit" name="add_form" value="Add a New Comment">
  <input type="reset">
  <br>
</form>
 
</body>
</html>