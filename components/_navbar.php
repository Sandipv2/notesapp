<?php
$uri = $_SERVER['REQUEST_URI'];
$home = false;
$login = false;
$singup = false;
$notes = false;
$username = false;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];  
}

switch ($uri) {
    case '/notesapp/':
        $home = true;
        break;

    case '/notesapp/login.php':
        $login = true;
        break;

    case '/notesapp/signup.php':
        $signup = true;
        break;

    case '/notesapp/notes.php':
        $notes = true;
        break;
}

echo "
<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
<a class='navbar-brand' href='/notesapp'>Notes</a>
<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
    <span class='navbar-toggler-icon'></span>
</button>

<div class='collapse navbar-collapse' id='navbarSupportedContent'>
    <ul class='navbar-nav mr-auto'>
        
        <li class='nav-item ";if($home){echo "active";}echo"'>
         <a class='nav-link' href='/notesapp'>HOME <span class='sr-only'>(current)</span></a>
        </li>";
        if(!isset($_SESSION['username'])) {
            echo "
            <li class='nav-item'>
                <a class='nav-link ";if($login){echo "active";}echo "' href='/notesapp/login.php'>LOGIN</a>
            </li>
            <li class='nav-item ";if($signup){echo "active";}echo "'>
                <a class='nav-link' href='/notesapp/signup.php'>SIGN UP</a>
            </li>
        ";
        }
        else if(isset($_SESSION['username']) && $_SESSION['username'] != "") {
            echo "<li class='nav-item'>
                <a class='nav-link ";if($notes){echo "active";}echo "' href='/notesapp/notes.php'>NOTES</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='/notesapp/logout.php'>LOG OUT</a>
            </li>";
        }
    echo "
    </ul>
    <div>";
      if($username) {
        echo "<h5 class = 'mr-3 font-weight-light'>$username</h5>";
      }
    echo "
    </div>
</div>
</nav>
";
?>
