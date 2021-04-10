<?php
    include 'session.php';
    include 'storecredential.php';
    
    if ($_SESSION['token'] == null) {
        header('Location: login.php');
        exit;
    }

?>
<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
</head>
<body>
    <h2>Dashboard Page</h2>
    <a href="logout.php">Logout Here</a>
</body>

</html>

