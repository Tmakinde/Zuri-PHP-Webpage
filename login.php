<?php
    include 'session.php';
    include 'storecredential.php';

    $error = [];

    if ($_SESSION['token'] != null) {
        header('Location: dashboard.php');
        exit;
    }
    
    if (isset($_SESSION['success'])) {
        echo $_SESSION['success'];
        $_SESSION['success'] = null;
    }
    if (isset($_POST['submit'])) {
        if (empty($_POST['username'])) {
            $error['username'] = "username field is required";
        }

        if (empty($_POST['password'])) {
            $error['password'] = "password field is required";
        }

        if (empty($error)) {
            // check if credential is valid
            if(checkCredential()){
                
                // login in user
                setSession();
                header('Location: dashboard.php');
                exit;
            }else {
                echo "<h3>Password and Username does not match</h3>";
            }
        }

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
    <h2>Login Here</h2>
    <form id = "loginForm" action = "login.php" method = "post">
        <div>
            <label>Username</label>
            <br>
            <input type="text" name='username'><br>
            <span><?php if(isset($error['username'])){echo $error['username'];}  ?></span>
        </div>
        <div>
            <label>Password</label>
            <br>
            <input type="password" name='password'><br>
            <span><?php if(isset($error['password'])){echo $error['password'];}   ?></span>
        </div>
        <div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Login'>
            <a href="forgotpassword.php">forgot password</a>
        </div>
         
    </form>

</body>

</html>

