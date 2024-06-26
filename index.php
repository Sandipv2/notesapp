<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require "components/_head.php";?>
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
        <?php
            if(!isset($_SESSION["username"])) {
                echo "
                <div class='sign-btn'>
                    <a href='login.php'>
                        <button class='btn btn-success'>LOGIN</button>
                    </a>
                    <a href='signup.php'>
                        <button class='btn btn-outline-success'>SIGN UP</button>
                    </a>
                </div>
                ";
            }
        ?>
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