<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php'; 

auth();

if(isset($_GET['edit']))
        {
          $id = $_GET['edit'];
          $selectEdit= "SELECT * FROM empdep WHERE empID =$id";
          $employee = mysqli_query($connection,$selectEdit);
          $row = mysqli_fetch_assoc($employee);

          if(isset($_POST['update']))
          {
            $name = $_POST['empName'];
            $email = $_POST['empEmail'];
            $phone = $_POST['empPhone'];
            $salary = $_POST['empSalary'];
            $deptID = $_POST['depID'];

            //image
            if(empty($_FILES['image']['name']))
            {
              $image_name = $row['img_location'];
            }
            else
            {
              $image_name = time() . $_FILES['image']['name'];
              $tmp_name = $_FILES['image']['tmp_name'];
              $img_location = "./upload/$image_name";
              move_uploaded_file($tmp_name,$img_location);
            }
            $updateStatement = "UPDATE `employees` SET `name`='$name',`email`='$email',`phone`='$phone',`deptID`=$deptID , `salary`='$salary' , `img_location` = '$image_name' WHERE id = $id" ;
            mysqli_query($connection,$updateStatement);
            path('/employees/list.php');
          }
          $selectDep = "SELECT * FROM dept";
          $departments = mysqli_query($connection,  $selectDep); 
        }
        

          
       
?>

<form class="container" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" name="empName" value ="<?php echo $row['empName'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Email</label>
    <input type="email" class="form-control" name="empEmail" value ="<?php echo $row['email'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPhone">Phone</label>
    <input type="text" class="form-control" name="empPhone" value ="<?php echo $row['phone'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputSalary">Salary</label>
    <input type="text" class="form-control" name="empSalary" value ="<?php echo $row['salary'] ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPicture">Employee Picture</label>
    <input type="file" class="form-control" name="image" value ="<?php echo $row['img_location'] ?>">
  </div>
  <div class="form-group">
    <label>Department</label>
  <select class="form-control" name="depID">
      
      <option value="<?php echo $row['deptID'] ?>" selected> <?php echo $row['deptName'] ?></option>
      
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