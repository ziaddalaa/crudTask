<?php
include '../general/env.php';
include '../general/functions.php';
include '../shared/header.php';
include '../shared/navbar.php';

$select = "SELECT * FROM dept";
$s = mysqli_query($connection,$select);

if(isset($_GET['delete']))
{
  $id = $_GET['delete'];
  $delete = "DELETE FROM dept WHERE id = $id";
  $ss = mysqli_query($connection,$delete);
  path('/departments/list.php');
}

?>

<br>
<br>
<table class="table table-dark container table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Department</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    foreach($s as $data)
    { ?>
    <tr>
      <th scope="row"><?php echo $data['id'] ?></th>
      <td><?php echo $data['deptName'] ?></td>
      <td>
      <a onclick="return confirm('Are you sure ?')" href="/ziad/departments/list.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
<?php } ?>
  </tbody>
</table>

<?php
include '../shared/footer.php';
?>