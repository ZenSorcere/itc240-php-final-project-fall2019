<?php
// header for LOGIN/REGISTER pages

define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

    switch(THIS_PAGE) {
        case 'login.php':
            $title = 'Login Page';
            break;
        case 'register.php':
            $title = 'Register';
            break;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link href="css/week9.css" type="text/css" rel="stylesheet">
</head>
<div>
<main>