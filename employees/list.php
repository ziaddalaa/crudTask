<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';


auth();

$select = "SELECT * FROM `empdep` ORDER BY empID ASC ";
$s = mysqli_query($connection, $select);

//delete row

if (isset($_GET['delete'])) {
  if ($_SESSION['admin']['adminRole'] != 0) {
    path('404.php');
  }
  else {
  $id = $_GET['delete'];
  $selectOne = "SELECT * FROM employees WHERE id = $id";
  $ss = mysqli_query($connection, $selectOne);
  $row = mysqli_fetch_assoc($ss);
  $image = $row['img_location'];
  unlink($image);
  $delete = "DELETE FROM `employees` WHERE id= $id";
  mysqli_query($connection, $delete);
 
  path('employees/list.php');
}
}


?>
<br>
<h1 class="text-center">Employees Data : </h1>
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <table class="table table-dark">
        <tr>
          <th> id </th>
          <th> Name </th>
          <TH> action</TH>
        </tr>
        <?php foreach ($s as $data) { ?>
          <tr id="return">
            <td><?= $data['empID'] ?> </td>
            <td><?= $data['empName'] ?> </td>
            <td>
              <div class="dropdown">
                <button class="btn text-light " type="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-info" href="/crudTask/employees/update.php?edit=<?= $data['empID'] ?>"> <i class="fa-solid fa-pen-to-square"></i> </a>
                  <a class="dropdown-item text-danger" onclick="return confirm('are u sure !!')" href="/crudTask/employees/list.php?delete=<?= $data['empID'] ?>"> <i class="fa-solid fa-trash-can"></i> </a>
                  <a class="dropdown-item text-dark" href="/crudTask/employees/show.php?show=<?= $data['empID'] ?>"> <i class="fa-solid fa-eye"></i></a>
                </div>
              </div>
            </td>


          </tr>
        <?php  } ?>
      </table>
    </div>
  </div>
</div>



<?php
include '../shared/footer.php';
?>