<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

if ($_SESSION['admin']['adminRole'] != 0) {
  path('404.php');
}

if(isset($_POST['add']))
{
$user = $_POST['adminUser'];
$pass = $_POST['adminPass'];
//encrypt pass
// $encryptedPass = sha1($pass);

$role = $_POST['adminRole'];

$image_name = time() . $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$img_admin_location = "./upload/$image_name";
move_uploaded_file($tmp_name,$img_admin_location);

$insertAdmin = "INSERT INTO admins VALUES(null, '$user' , '$pass', '$img_admin_location' , $role)";
mysqli_query($connection,$insertAdmin);

path('admin/list.php');
}

$selectRole = "SELECT * FROM roles";
$ss_roles = mysqli_query($connection,$selectRole);
?>


<br>
<br>
<h1 class="text-center">Add admin </h1>
<form class="container" action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputName">Username</label>
    <input type="text" class="form-control" name="adminUser">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail">Password</label>
    <input type="password" class="form-control" name="adminPass">
  </div>
  <div class="form-group">
    <label for="exampleInputSalary">Role</label>
    <select class="form-control" name="adminRole">
    <?php foreach($ss_roles as $data){
      ?>
     <option value="<?php echo $data['id']?>"><?php echo $data['roleNo']?></option>
  <?php } ?>
  </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPicture">Admin Picture</label>
    <input type="file" class="form-control" name="image">
  </div>
  
  

 <button type="submit" class="btn btn-primary" name="add">Add</button>
</form>

<?php
include '../shared/footer.php';
?>
