<?php

    include "../libs/load.php";

    // Start a session
    Session::start();

    if (!Session::get('branch_user'))
    {
        header("Location: ../login.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h3>Hello, <?= Session::get('branch_user'); ?></h3>
    <p>Branch is <?= Session::get('branch'); ?></p>
    <a href="logout.php">Logout Now</a>
</body>
</html>