<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

    <!-- My style -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php require "components/_navbar.php"; ?>

    <div class="container">
        <h1 class="text-center mt-5">SIGN UP</h1>

        <form action = "signup.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input required type="text" class="form-control" name = "username" id="username" aria-describedby="emailHelp" >
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input required type="password" class="form-control" name = "password" id="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input required type="password" class="form-control" name = "cpassword" id="cpassword">
            </div>
            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>
    </div>
</body>

</html>