<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';


if(isset($_GET['btnAdd']))
  {
    $name = $_GET['name'];
    $insert = "INSERT INTO dept VALUES (null,'$name')";
    $result = mysqli_query($connection,$insert);
    if ($result) 
        {
        path('/departments/list.php');
      }
       else
       {
        echo "Error: " . $insert . "<br>" . mysqli_error($connection);
      }
  }
?>
<br>
<br>
<form class = "container">
  <div class="form-group">
    <label for="deptName">Department Name</label>
    <input type="text" class="form-control" id="deptName" name ="name">
  </div>

  <button type="submit" class="btn btn-primary" name="btnAdd">Add</button>
</form>

<?php
include '../shared/footer.php';
?>