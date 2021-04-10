<?php
    include 'session.php';
    include 'storecredential.php';
    
    $error = [];
    if ($_SESSION['token'] != null) {
        header('Location: dashboard.php');
        exit;
    }

    if (isset($_POST['submit'])) {
        if (empty($_POST['username'])) {
            $error['username'] = "username field is required";
        }

        if (empty($error)) {
            if (checkUsername()) {
                $_SESSION['username'] = $_POST['username'];
                header('Location: resetpassword.php');
                exit;
            }else {
                $error['username'] = "username does not exist in our database";
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
    <h2>Forgot Password</h2>
    <form id = "forgotpasswordForm" action = "forgotpassword.php" method = "post">
        <div>
            <label>Enter your Username here</label>
            <br>
            <input type="text" name='username'><br>
            <span><?php if(isset($error['username'])){echo $error['username'];}  ?></span>
        </div>
        <div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'submit'>
        </div>
         
    </form>

</body>

</html>

