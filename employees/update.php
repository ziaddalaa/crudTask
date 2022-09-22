<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php'; 

if(isset($_GET['edit']))
        {
          $id = $_GET['edit'];
          $selectEdit= "SELECT * FROM empdep WHERE empID =$id";
          $employee = mysqli_query($connection,$selectEdit);
          $row = mysqli_fetch_assoc($employee);

          $selectPass = "SELECT mypass from employees where id = $id";
          $retrievePass = mysqli_query($connection,$selectPass);
          $row1 = mysqli_fetch_assoc($retrievePass);
          
          
          
        }
        if(isset($_POST['update']))
          {
            $name = $_POST['empName'];
            $email = $_POST['empEmail'];
            $password = $_POST['empPass'];
            $salary = $_POST['empSalary'];
            $depID = $_POST['depID'];
            $updateStatement = "UPDATE `employees` SET `name`='$name',`email`='$email',`mypass`='$password',`deptID`=$depID,`salary`='$salary' WHERE id = $id" ;
            mysqli_query($connection,$updateStatement);
            path('/employees/list.php');
          }
          $selectDep = "SELECT * FROM dept";
          $departments = mysqli_query($connection,  $selectDep);

          
       
?>

<form class="container" action="" method="POST">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="empName" value ="<?php echo $row['empName'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="empEmail" value ="<?php echo $row['email'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <input type="text" class="form-control" name="empPass" value ="<?php echo $row1['mypass'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputSalary">Salary</label>
    <input type="text" class="form-control" name="empSalary" value ="<?php echo $row['salary'] ?>">
  </div>
  <div class="form-group">
    <label>Department</label>
  <select class="form-control" name="depID">
      
      <option disabled value="<?php echo $row['deptID'] ?>" selected> <?php echo $row['deptName'] ?></option>
      
    <?php foreach($departments as $data){
      ?>
     <option value="<?php echo $data['id']?>"><?php echo $data['deptName']?></option>
  <?php } ?>
  </select>
  </div>
  
  <button name="update" class="btn btn-info"> Submit </button>
    
 
</form>

<?php
include '../shared/footer.php';
?>