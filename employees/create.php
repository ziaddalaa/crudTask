<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if(isset($_POST['add']))
{
  $name = $_POST['empName'];
  $email = $_POST['empEmail'];
  $password = $_POST['empPass'];
  $salary = $_POST['empSalary'];
  $depID = $_POST['depID'];

  $insert = "INSERT INTO `employees` VALUES(null,'$name','$email','$password',$depID,'$salary')";
  mysqli_query($connection,$insert);

  path('employees/create.php');
}

 // select dept

    $selectDept = "SELECT * FROM `dept`";
    $departments = mysqli_query($connection,$selectDept);


?>

<form class="container" action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="empName">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="empEmail">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <input type="password" class="form-control" name="empPass">
  </div>
  <div class="form-group">
    <label for="exampleInputSalary">Salary</label>
    <input type="text" class="form-control" name="empSalary">
  </div>
  <div class="form-group">
    <label>Department</label>
  <select class="form-control" name="depID">
       <?php if($edit) { ?>
      <option value="<?php echo $id ?>" selected> <?php echo $select1['deptName'] ?></option>
      <?php } ?>
    <?php foreach($departments as $data){
      ?>
     <option value="<?php echo $data['id']?>"><?php echo $data['deptName']?></option>
  <?php } ?>
  </select>
  </div>

 <button type="submit" class="btn btn-primary" name="add">Add</button>

 <?php
 include '../shared/footer.php';
 ?>
 