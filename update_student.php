<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php include "header.php";?><br><br>
    <div class="container" style="width:60%;margin:auto;">
      <div class="row">
        <div class="col-xs-4 text-center">
          <a href="add_student.php" class="btn btn-primary">Add</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="update_initial.php" class="btn btn-primary">Change</a>
        </div>
        <div class="col-xs-4 text-center">
          <a href="delete_student.php" class="btn btn-primary">Delete</a>
        </div>
      </div>
    </div><br><br>
    <?php
    $student_ID= $_SESSION['student_ID'];
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"minor");
    $query="SELECT `student_ID`, `name`, `number`, `email`, `sex`, `branch`, `class`, `dob` FROM `student` WHERE student_ID='$student_ID'";
    $rs=mysqli_query($con,$query);
    while($row=mysqli_fetch_array($rs))
    {
    ?>
    <form method="post">
      <div class="form-group" style="width:70%;margin:auto;">
        <div class="row">
          <div class="col-xs-6">
            <input type="id" name="student_ID" value=<?php echo $row['student_ID']?> class="form-control" >
          </div>
          <div class="col-xs-6">
            <input type="name" name="name" value=<?php echo $row['name'] ?> class="form-control" >
          </div>
        </div><br>
        <div class="row">
          <div class="col-xs-6">
            <input type="email" name="email" value=<?php echo $row['email'] ?> class="form-control" >
          </div>
          <div class="col-xs-6">
            <input type="number" name="number" value=<?php echo $row['number']; ?> class="form-control" >
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6">
            <input type="branch" name="branch" value=<?php echo $row['branch']; ?> class="form-control" >
          </div>
          <div class="col-xs-6">
            <input type="class" name="class" value=<?php echo $row['class']; ?> class="form-control" >
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-6 checkbox">
            <label><code>Sex:</code>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <label class="radio-inline"><input type="radio" name="sex" value="male"><code>Male</code></label>
            <label class="radio-inline"><input type="radio" name="sex" value="female"><code>Female</code></label>
          </div>
          <div class="col-xs-6">
            <input type="date" name="dob" value=<?php echo $row['dob']; ?> class="form-control">
          </div>
            <?php } ?>
        </div><br><br><br><br>
        <div class="row">
          <div class="col-xs-5"></div>
          <div class="col-xs-6"></div>
          <div class="col-xs-1">
            <input type="submit" name="change" value="Change" class="btn btn-primary text-right">
          </div>
        </div>
        </div>
    </form>
    <?php include "footer.php"; ?>
  </body>
</html>
<?php
  if(isset($_POST['change']))
  {
    $student_ID=$_SESSION['student_ID'];
    $name=$_POST['name'];$email=$_POST['email'];$number=$_POST['number'];
    $branch=$_POST['branch'];$class=$_POST['class'];
    $dob =$_POST['dob'];
    $date=date_create($dob);
    date_format($date,"Y/m/d");

      $query="UPDATE `student` SET `name`='$name',`number`='$number',`email`='$email',`branch`='$branch',`dob`='$dob',`class`='$class' WHERE student_ID= '$student_ID' ";
      $rs=mysqli_query($con,$query);
      if($rs)
      {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-success alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Successfully updated entry.
        </div>
        </div>";
        //header("location:student.php");
      }
      else {
        echo "<br><div class='row' style='width:50%;margin:auto;'>
        <div class='alert alert-danger alert-dismissable col-sx-4'>
        <a href=''#'' class='close' data-dismiss='alert' aria-label='close'>×</a>
        Could not update the Entry.
        </div>
        </div>";
      }
      //header("location:student.php");
    }
}
else {
  header("location:access_denied.php");
}
 ?>
