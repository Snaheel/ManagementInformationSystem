<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Change Settings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php include "header.php"; ?>
    <?php
    $admin_ID=$_SESSION['admin_ID'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"minor");
    $query="SELECT `username`, `password` FROM `admin` where admin_ID='$admin_ID'";
    $rs=mysqli_query($con,$query);
    while ($row=mysqli_fetch_array($rs)) {
    ?>
    <div class="container" style="margin-top:50px;">
    <form method="post" style="width:70%;margin:auto;">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" value=<?php echo $row['username'] ?> class="form-control" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="text" name="password" value=<?php echo $row['password'] ?> class="form-control" required>
      </div>
      <input type="submit" value="Update" class="btn btn-primary" name="update">
    </form>
      </div>
    <?php } include "footer.php"; ?>
  </body>
</html>
<?php
  if (isset($_POST['update'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="UPDATE `admin` SET `username`='$username',`password`='$password' WHERE admin_ID='$admin_ID'";
    $rs=mysqli_query($con,$query);
    if($rs)
    {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-success alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Successfully updated entry.
      </div>
      </div>";
      header("location:admin.php");
    }
    else {
      echo "<br><div class='row' style='width:50%;margin:auto;'>
      <div class='alert alert-danger alert-dismissable col-sx-4'>
      <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
      Could not update the Entry.
      </div>
      </div>";
    }
  }
}
else {
  header("location:access_denied.php");
}
 ?>
