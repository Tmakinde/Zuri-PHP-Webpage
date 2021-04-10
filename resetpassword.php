<?php
    include 'session.php';
    include 'storecredential.php';
    
    $error = [];
    if ($_SESSION['token'] != null) {
        header('Location: dashboard.php');
        exit;
    }else{
        header('Location: forgotpassword.php');
        exit;
    }

    if ($_SESSION['username'] != null) {
        header('Location: forgotpassword.php');
        exit;
    }

    if (isset($_POST['submit'])) {

        if (empty($_POST['password']) and empty($_POST['password_comfirm'])) {
            $error['password'] = "password and confirm field are required";
        }

        if (empty($error)) {
            if ($_POST['password'] == $_POST['password_confirm']) {
                resetpassword();
                $_SESSION['success'] = "password successfully reset";
                header('Location: login.php');
                exit;
            }else {
                $error['password'] = "password does not match";
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
    <h2>Reset Password</h2>
    <form id = "resetpasswordForm" action = "resetpassword.php" method = "post">
        <label>Enter your  new password here</label>
        <div>
            <br>
            <input type="password" name='password'><br>
        </div>
        <div>
            <br>
            <input type="password" name='password_confirm'><br>
            <span><?php if(isset($error['password'])){echo $error['password'];}  ?></span>
        </div>
        <div>
            <input type="submit" style='margin-top:10px' id = 'submit' name = 'submit' value = 'Reset Password'>
        </div>
         
    </form>

</body>

</html>

