<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

auth();

$select = "SELECT * FROM `adminrole` ORDER BY adminID ASC ";
$s = mysqli_query($connection, $select);

//delete row

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $selectOne = "SELECT * FROM admins WHERE id = $id";
  $ss = mysqli_query($connection, $selectOne);
  $row = mysqli_fetch_assoc($ss);
  $image = $row['img_location'];
  unlink($image);
  $delete = "DELETE FROM `admins` WHERE id= $id";
  mysqli_query($connection, $delete);
  path('/admin/list.php');
}


?>
<br>
<h1 class="text-center">Admin Data : </h1>
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <table class="table table-dark">
        <tr>
          <th> id </th>
          <th> Name </th>
          <th> Role </th>
          <TH> action</TH>
        </tr>
        <?php foreach ($s as $data) { ?>
          <tr id="return">
            <td><?= $data['adminID'] ?> </td>
            <td><?= $data['name'] ?> </td>
            <td><?= $data['description'] ?> </td>
            <td>
              <div class="dropdown">
                <button class="btn text-light " type="button" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-ellipsis-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item text-info" href="/crudTask/admin/update.php?edit=<?= $data['adminID'] ?>"> <i class="fa-solid fa-pen-to-square"></i> </a>
                  <a class="dropdown-item text-danger" onclick="return confirm('are u sure !!')" href="/crudTask/admin/list.php?delete=<?= $data['adminID'] ?>"> <i class="fa-solid fa-trash-can"></i> </a>
                  <a class="dropdown-item text-dark" href="/crudTask/admin/show.php?show=<?= $data['adminID'] ?>"> <i class="fa-solid fa-eye"></i></a>
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