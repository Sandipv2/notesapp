<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "notes";


$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    echo "
    <div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> Could not connect to the database.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>
  ";
}
?>
