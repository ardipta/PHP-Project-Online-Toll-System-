<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="../../Bootstrap/CSS/regStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Alatsi|Playfair+Display&display=swap" rel="stylesheet">
</head>
<body>
<div class="form-area" id="reg">
    <h3>Registration Form</h3>
    <form action="Registration.php" method="POST">
        <p>Name</p>
        <input type="text" name="Name" required placeholder="Your name here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your name here'" autocomplete="off">
        <p>Mobile</p>
        <input type="number" name="Mobile" required placeholder="Your mobile number here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your mobile number here'" autocomplete="off">
        <p>Email</p>
        <input type="email" name="Email" required placeholder="Your email here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your email here'" autocomplete="off">
        <p>Password</p>
        <input type="password" name="Password" required placeholder="Your password here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your password here'" autocomplete="off">
        <p>Re-type Password</p>
        <input type="password" name="rePassword" required placeholder="Re-type your password here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Re-type your password here'" autocomplete="off">
        <input type="submit" value="Register" name="submit">
    </form>
</div>
<script type="text/javascript" src="../../Bootstrap/Js/jquery.min.js"></script>
<script type="text/javascript" src="../../Bootstrap/Js/app.js"></script>
</body>
</html>

<?php
include '../../Class/Crud.php';
$crud = new Crud();
if (isset($_POST['submit'])){
    $Name = $_POST['Name'];
    $Mobile = $_POST['Mobile'];
    $Email = $_POST['Email'];
    $Password = md5($_POST['Password']);
    $sql = "INSERT into users(Name, Mobile, Email, Password) VALUES 
            ('$Name', '$Mobile', '$Email', '$Password')";
    $sql1 = "INSERT into login(email, password) VALUES 
            ('$Email', '$Password')";
    $result = $crud->execute($sql);
    $result1 = $crud->execute($sql1);
    if($_POST['Password']!==$_POST['rePassword']) {

        echo "<script>window.alert('Password did not Matched')</script>";
        exit;
    }
    else {

        if($result){
            echo "<script>window.alert('Submitted Successfully!')</script>";
            echo'<script> window.location="Login.php"; </script> ';
            /*header('location:Login.php');*/
        }
        else{
            echo "<script>window.alert('failed!')</script>";
            echo'<script> window.location="Registration.php"; </script> ';
        }

    }

}
?>
