<?php
session_start();

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/crudTask/auth/login.php');
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <?php if (isset($_SESSION['admin'])) : ?>
      <li class="nav-item active">
        <a class="nav-link" href="/crudTask/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Admins
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/crudTask/admin/list.php">View All</a>
          <a class="dropdown-item" href="/crudTask/admin/create.php">Add New</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Employees
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/crudTask/employees/list.php">View All</a>
          <a class="dropdown-item" href="/crudTask/employees/create.php">Add New</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Departments
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/crudTask/departments/list.php">View All</a>
          <a class="dropdown-item" href="/crudTask/departments/create.php">Add New</a>
      </li>
      <?php endif; ?>
    </ul>
    <?php if (isset($_SESSION['admin'])) : ?>
            <form action="">
                <button name="logout" class="btn btn-danger"> Logout </button>
            </form>
        <?php else : ?>
            <a href="/crudTask/auth/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">login</a>
        <?php endif; ?>
  </div>
</nav>