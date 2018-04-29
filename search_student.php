<?php session_start();
if($_SESSION['login']=="true")
{
  $class=$_SESSION['class'];
  $student_ID=$_SESSION['student_ID'];
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Student Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <?php include "header.php";
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"minor");
    if($class==""){
        $query="SELECT * FROM `student` WHERE student_ID LIKE '$student_ID%'";
    }
    else{
        $query="SELECT * FROM `student` WHERE class='$class' and student_ID LIKE '$student_ID%'";
    }
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
         echo("</table>");
    ?>

    <?php include "footer.php"; ?>
  </body>
</html>
<?php
}
else {
  header("location:access_denied.php");
}
 ?>
