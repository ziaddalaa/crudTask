<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

$error = "";


if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    // $newpass = sha1($password);
    $select = "SELECT * FROM adminrole WHERE `name` = '$name' and `pass` = '$password' ";
    
    $s = mysqli_query($connection,$select);
    $numRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    $adminId = $row['adminID'];
    if($numRows)
    {
        echo "Login Successfully";
        $_SESSION['admin'] = [
            'adminName' => $name,
            'adminRole' => $row['roleFunction'],
            'adminID' => $row['adminID']
        ];
        path('admin/loginCard.php');

        
    }
    else
    {
        $error = 'Wrong Credentials';
    }
}

?>
<br>
<h1 class="text-center">Admin Login</h1>
<br>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="">Admin Name : <span class="text-danger"><?= $error ?></span> </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div>
                    <label for="">Admin Password : <span class="text-danger"><?= $error ?></span> </label>
                    <input type="password" class="form-control" name="password">
                </div>
                <br>
                <button name="login" type="submit" class="btn btn-info"> Login </button>
            </form>
        </div>
    </div>

</div>

<?php
include '../shared/footer.php';
?>

