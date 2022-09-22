<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

    $select = "SELECT * FROM `empdep` ";  
    $s = mysqli_query($connection,$select);

     //delete row

     if(isset($_GET['delete']))
     {
       $id = $_GET['delete'];
       $delete = "DELETE FROM `employees` WHERE id= $id";
       mysqli_query($connection,$delete);
       path('employees/list.php');

     } 
?>

<br>
<br>

<table class="table table-dark container">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Salary</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($s as $data)
      { ?>
      <tr>
        <td><?php echo $data['empID'] ?></td>
        <td><?php echo $data['empName'] ?></td>
        <td><?php echo $data['email'] ?></td>
        <td><?php echo $data['salary'] ?></td>
        <td><?php echo $data['deptName'] ?></td>
        <td>
        <a href="/ziad/employees/update.php?edit=<?php echo $data['empID'] ?>" class="btn btn-info">Edit</a>
        <a onclick="return confirm('Are you sure ?')" href="/ziad/employees/list.php?delete=<?php echo $data['empID'] ?>" class="btn btn-danger">Delete</a>
        </td>
      </tr>
      <?php } ?>
  </tbody>
</table>

<?php 
include '../shared/footer.php';
?>