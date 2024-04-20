<?php
session_start();
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
    <title>Notes Bana Lo - SanSoft.</title>
    <style>
        .container {
            font-family: consolas;
            height: 92vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container span:nth-child(1) {
            color: red;
        }

        .container h1:nth-child(1) {
            margin: 25px 0;
        }

        .container .sign-btn button {
            margin: 0 5px;
        }
    </style>
</head>

<body>
    <?php require "./components/_navbar.php" ?>
    <div class="container">
        <h1 class="text-center mt-5">Make Your <span>Notes</span> NOW</h1>
        <div class="sign-btn">
            <a href="login.php">
                <button class="btn btn-success">LOGIN</button>
            </a>
            <a href="signup.php">
                <button class="btn btn-outline-success">SIGN UP</button>
            </a>
        </div>
    </div>
    <?php require "./components/_blockBtn.php"?>
</body>

</html>