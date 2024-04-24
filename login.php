<?php
require "_dbconnect.php";

$login = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 0) {
        $error = "No such user found!!";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                // If login succesfull!!
                $login = true;
                session_start();
                $_SESSION['username'] = $username;
                header("location:notes.php");
            }
        }
        if (!$login) {
            $error = "Invalid Password";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php require "components/_head.php";?>
</head>

<body>
    <?php require "./components/_navbar.php" ?>
    <?php
    if ($error) {
        echo "
    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error </strong>" . $error . "
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>
    ";
    }
    ?>

    <div class="container">
        <h1 class="text-center mt-5">LOGIN</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input required type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.3/js/dataTables.min.js"></script>
</body>

</html>