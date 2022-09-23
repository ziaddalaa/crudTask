<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

auth();

    $id = $_GET['show'];
    $select = "SELECT * FROM adminrole WHERE adminID = $id ";
    $s = mysqli_query($connection,$select);
    $row = mysqli_fetch_assoc($s);

?>
<br>

<h1 class="text-center">Admin ID : <?php echo $row['adminID']  ?></h1>

<div class="container col-md-3 mt-5">
    <div class="card">
        <img src="/crudTask/admin<?php echo $row['adminImage'] ?>" class="img-card-top" alt="">
        <div class="card-body">
            <h6>Name : <?php echo $row['name'] ?></h6>
            <h6>Role : <?php echo $row['description'] ?></h6>
        </div>
    </div>
</div>

<?php
include '../shared/footer.php';
?>