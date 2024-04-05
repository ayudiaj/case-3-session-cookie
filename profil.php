<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}
if (isset($_GET["logout"])) {
    session_destroy();

    setcookie("remembered_email", "", time() - 3600);

    header("Location: login.php");
    exit;
}

$remembered_email = isset($_COOKIE["remembered_email"]) ? $_COOKIE["remembered_email"] : "";
include "headerr.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>

<body>
    <h1>Welcome to your profile page</h1>
    <p>Email:
        <?php echo $_SESSION["email"]; ?>
    </p>
    <p>Remembered Email:
        <?php echo $remembered_email; ?>
    </p>
    <a href="profil.php?logout=true">
        <button class="btn btn-primary" >
            Logout
        </button>
    </a>
    
</body>

</html>