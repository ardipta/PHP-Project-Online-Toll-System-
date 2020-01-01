<?php
session_start();
include_once "../../Class/Crud.php";
$crud = new Crud();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM login where email='$email' and password='$password'";
    $sql1 =  "SELECT * FROM users where Email='$email' and Password='$password'";
    $result = $crud->getData($sql);
    $result1 = $crud->getData($sql1);
    if(!empty($result)){
        $_SESSION['email'] = $email;
        foreach ($result as $userType){
            $isAdmin = $userType['isAdmin'];
            $isUser = $userType['isUser'];
        }
        if($isAdmin==1 && $isUser==0){
            $_SESSION['user_type'] = "Login as Local admin";
            echo "<script>window.alert('Redirecting to Admin panel')</script>";
            echo'<script> window.location="../Admin/AdminOption.php"; </script> ';
        }
        elseif ($isUser==1 && $isAdmin==0){
            $_SESSION['user_type'] =  "Login as user";
            echo "<script>window.alert('Redirecting to User panel')</script>";
            echo'<script> window.location="../Users/UserInfo.php"; </script> ';
        }
        elseif($isUser==1 && $isAdmin==1){
            $_SESSION['user_type'] =  "Login as Super Admin";
            echo "<script>window.alert('Redirecting to Admin panel')</script>";
            echo'<script> window.location="UserOption.php"; </script> ';
        }

    }
    else{
        echo "<script>window.alert('Wrong username or password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../Bootstrap/CSS/logStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Alatsi|Playfair+Display&display=swap" rel="stylesheet">
</head>
    <body>
        <div class="form-area">
            <h3>Login Form</h3>
            <form action="Login.php" method="POST">
                <p>Email</p>
                <input type="email" name="email" id="email" placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" autocomplete="off">
                <p>Password</p>
                <input type="password" name="password" id="password" placeholder="Your password here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your password here'">
                <input type="submit" name="login" value="Authorize">
                <a href="Registration.php">Not a account? Create a new...</a>
            </form>
        </div>
    </body>
</html>

