<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php'; 

auth();

if(isset($_GET['show']))
{
    $id = $_GET['show'];
    $select = "SELECT * FROM empdep WHERE empID = $id";
    $s = mysqli_query($connection,$select);
    $row = mysqli_fetch_assoc($s);
}
?>
<br>

<h1 class="text-center">Employee ID : <?php echo $row['empID']  ?></h1>

<div class="container col-md-3 mt-5">
    <div class="card">
        <img src="/crudTask/employees<?php echo $row['img_location'] ?>" class="img-card-top" alt="">
        <div class="card-body">
            <h6>Name : <?php echo $row['empName'] ?></h6>
            <h6>Email : <?php echo $row['email'] ?></h6>
            <h6>Phone : <?php echo $row['phone'] ?></h6>
            <h6>Salary : <?php echo $row['salary'] ?></h6>
            <h6>Department : <?php echo $row['deptName'] ?></h6>
        </div>
    </div>
</div>

<?php
include '../shared/footer.php';
?>