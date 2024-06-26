<?php
require "_dbconnect.php";
$error = false;
$show_msg = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = strtolower($_POST['username']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password != $cpassword) {
        $error = "Passwords din't matched!";
    } else {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $row_num = mysqli_num_rows($result);

        if ($row_num > 0) {
            $error = "Username Already Exists!";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

            $create_table = "CREATE TABLE $username (
                notes_id INT PRIMARY KEY AUTO_INCREMENT, 
                title VARCHAR(50), 
                description TEXT, 
                time TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

            $result = mysqli_query($conn, $sql);
            $result_table = mysqli_query($conn, $create_table);

            if ($result && $result_table) {
                $show_msg = "Account created!";
                session_start();
                $_SESSION["username"] = $username;
                header("location:notes.php");
            }
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
    <?php require "components/_navbar.php"; ?>
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

    if ($show_msg) {
        echo "
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Congratulation </strong>" . $show_msg . "
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>
    ";
    }
    ?>
    <div class="container">
        <h1 class="text-center mt-5">SIGN UP</h1>

        <form action="signup.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input required type="text" class="form-control" name="username" id="username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" name="password" id="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input required type="password" class="form-control" name="cpassword" id="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Create Account</button>
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