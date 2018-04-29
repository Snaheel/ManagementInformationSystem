<?php session_start();
if($_SESSION['login']=="true")
{
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student</title>
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
    <div class="container" style="padding:100px;">
      <form method="post">
        <div class="row">
            <div class="col-xs-6">
              <input type="student_ID" name="student_ID" placeholder="Student Registration Number" class="form-control" required>
            </div>
          <div class="col-xs-6">
            <input type="class" name="class" placeholder="Student Class" class="form-control">
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-xs-4"></div>
          <div class="col-xs-4 text-center" style="padding:50px;"><input type="submit" name="search" value='Search' class="btn btn-primary"></div>
          <div class="col-xs-4"></div>
        </div>
      </form>
      </div>
    <!--<h1 class='container text-center'>List of all <code>Students</code></h1>-->
    <?php
    if(isset($_POST['search']))
    {
      $_SESSION['student_ID']=$_POST['student_ID'];
      $_SESSION['class']=$_POST['class'];
      header("location:search_student.php");
    }

      /*$con=mysqli_connect("localhost","root","");
      mysqli_select_db($con,"minor");
      $query="SELECT `fname`, `year`, `number`, `email`, `branch`, `sex`, `dob`, `class` FROM `student` order by fname";
      $rs=mysqli_query($con,$query);

      echo ("<br><br><table class='table table-responsive table-striped table-bordered text-center table-hover' style='width:60%;margin:auto;'><tr>");
	       while($field = mysqli_fetch_field($rs)){
		         echo "<th class='text-center'>".$field->name."</th>";
	              }
	               echo '</tr>';
	       while($row = mysqli_fetch_array($rs)){
		         echo "<tr>";
		           for($i = 0 ; $i < mysqli_num_fields($rs); $i++)
			            echo '<td>'. $row[$i] . '</td>';
		              echo "</tr>";
	               }
	         echo("</table>");*/

     include "footer.php"; ?>
  </body>
</html>
<?php
}
else {
  header("location:access_denied.php");
}
 ?>
