<?php
    include 'storecredential.php';

    $error = [];
    if (isset($_POST['submit'])) {
        if (empty(trim($_POST['username']))) {
            $error['username'] = "username field is required";
        }

        if (empty(trim($_POST['password']))) {
            $error['password'] = "password field is required";
        }

        if (empty($error)) {
            print(saveData());
        }
    }
?>
<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register Page</title>
</head>
<body>
    <h2>Register Here</h2>
    <form id = "registerForm" action = "register.php" method = "post">
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
        <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Submit'>
        <small>already have an account ?</small>
        <a href="login.php">Login here</a>
        
    </form>

</body>

</html>

