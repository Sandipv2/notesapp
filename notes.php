<?php
session_start();
// check if user login
if (!isset($_SESSION["username"])) {
    header("location: login.php");
}

// chekc if blocked;
if (isset($_COOKIE['isBlock'])) {
    die(readfile("blockHome.html"));
}
$insert = false;
$update = false;
$delete = false;

require "_dbconnect.php";

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `id` = $id";
    $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['editId'] != "") {
        $id = $_POST['editId'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "UPDATE notes SET title = '$title' , description = '$description' WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "" . $_POST['editId'];
            echo "Updation failed!";
        }
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO notes (title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo "The data din't inserted! " . mysqli_error($conn);
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

    <!-- My style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Notes App</title>
</head>

<body id="body">

    <?php
    require "./components/_navbar.php";
    ?>

    <?php

    if ($insert) {
        echo "
        <div class='alert alert-success alert-dismissible fade show' id = 'alert' role='alert'>
            <strong>Added</strong> Data added!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }

    if ($update) {
        echo "
        <div class='alert alert-success alert-dismissible fade show' id = 'alert' role='alert'>
            <strong>Updated</strong> Data has been updated!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }

    if ($delete) {
        // echo "<script>window.location = '/notesapp'</script>";
        echo "
        <div class='alert alert-success alert-dismissible fade show' id = 'alert' role='alert'>
            <strong>Delete</strong> Data has been deleted!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }

    ?>

    <div class="container mt-4">
        <form action="notes.php" method="post">
            <input type="hidden" id="editId" name="editId">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="5"></textarea>
            </div>
            <button type="submit" class="submit btn btn-primary" id="submit">Add Note</button>
        </form>

        <!-- Tablesssssss -->

        <table class="table" id="myTable">
            <thead id="thead">
                <tr>
                    <th scope="col">Sr. No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Time</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM notes";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno++;
                    echo "
                    <tr>
                        <th scope='row'>$sno</th>
                        <td>" . $row['title'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>" . $row['time'] . "</td>
                        <td id='action_col'><button class='edit btn btn-outline btn-primary' id=" . $row['id'] . ">Edit</button>
                        <button class='btn btn-outline-danger delete' id = " . $row['id'] . ">Delete</button></td>
                    </tr>
                ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php require "./components/_blockBtn.php"?>
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
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <script>
        setTimeout(function () {
            alert = document.getElementById("alert");
            alert.style.display = "none";
        }, 2500);

        edit = document.getElementsByClassName("edit");
        Array.from(edit).forEach((element) => {
            element.addEventListener("click", (e) => {
                tr = e.target.parentNode.parentNode;
                titl = tr.getElementsByTagName("td")[0].innerText;
                desc = tr.getElementsByTagName("td")[1].innerText;

                title.value = titl;
                description.value = desc;
                editId.value = e.target.id;
            });
        });

        dlt = document.getElementsByClassName("delete");
        Array.from(dlt).forEach((element) => {
            element.addEventListener("click", (e) => {
                id = e.target.id;
                // confirm = alert("Are you sure ?");
                console.log("clicked")
                window.location = `notes.php?delete=${id}`;
            });
        });
    </script>
</body>

</html>