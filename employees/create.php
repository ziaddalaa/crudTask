<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

auth();

if(isset($_POST['add']))
{
  $name = $_POST['empName'];
  $email = $_POST['empEmail'];
  $phone = $_POST['empPhone'];
  $salary = $_POST['empSalary'];
  $depID = $_POST['depID'];

  $image_name = time() . $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $img_location = "./upload/$image_name";

  move_uploaded_file($tmp_name,$img_location);


  $insert = "INSERT INTO `employees` VALUES(null,'$name','$email','$phone',$depID,'$salary','$img_location')";
  mysqli_query($connection,$insert);

  path('employees/list.php');
}

 // select dept

    $selectDept = "SELECT * FROM `dept`";
    $departments = mysqli_query($connection,$selectDept);


?>
<br>
<br>

<form class="container" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="empName">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="empEmail">
  </div>
  <div class="form-group">
    <label for="exampleInputPhone">Phone</label>
    <input type="text" class="form-control" name="empPhone">
  </div>
  <div class="form-group">
    <label for="exampleInputSalary">Salary</label>
    <input type="text" class="form-control" name="empSalary">
  </div>
  <div class="form-group">
    <label for="exampleInputSalary">Employee Picture</label>
    <input type="file" class="form-control" name="image">
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
</form>

 <?php
 include '../shared/footer.php';
 ?>
 