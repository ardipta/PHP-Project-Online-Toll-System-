<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:Login.php');
}
else{
    $userType = $_SESSION['user_type'];
}
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <link rel="stylesheet" href="../../Bootstrap/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../../Bootstrap/CSS/AdminUserStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Serif|Poppins&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <h4><strong style="color: black">Online Toll System</strong></h4>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $userType; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../Auth/Login.php">Log out</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!--<nav>
    <div class="logo"><h5>Online Toll</br>System</h5></div>
    <div class="menu">
        <h6><?php /*echo $userType; */?></h6>
        <a href="#">Log Out</a>
    </div>
</nav>-->
<h2 style="text-align: center; color: #0062cc"><strong>Admin Panel</strong></h2>
<button class="col-lg-12 container btn btn-outline-secondary form-control" id="add_show" onclick="$('#add_toll').slideToggle();">Add New Toll</button>
<div class="container">
    <div class="row">
        <div id="add_toll" class="col-lg-12">
            <div class="form-group">
                <label>Toll ID</label>
                <input type="text" id="toll_ID" name="toll_ID" class="form-control">
            </div>
            <div class="form-group">
                <label>Toll Location</label>
                <input type="text" id="toll_Location" name="toll_Location" class="form-control">
            </div>
            <div class="form-group">
                <label>Vehicle Type</label>
                <select id="vhType" name="vhType" class="form-control">
                    <option>--Select One--</option>
                    <option value="Small">Small</option>
                    <option value="Medium">Medium</option>
                    <option value="Heavy">Heavy</option>
                    <option value="Extra Heavy">Extra Heavy</option>
                </select>
            </div>
            <div class="form-group">
                <label>Toll fee</label>
                <input type="number" id="toll_Fee" name="toll_Fee" class="form-control">
            </div>
            <div class="form-group">
                <input type="button" id="addData" name="addData" value="Save Information" class="form-control btn btn-outline-warning">
            </div>
            <div class="form-group">
                <input type="button" onclick="$('#add_toll').slideUp();" value="Cancel" class="form-control btn btn-outline-primary">
            </div>
        </div>
    </div>
</div>

<div id="edit_toll">

</div></br>
<div id="show_toll"></div>



<script type="text/javascript" src="../../Bootstrap/Js/jquery.min.js"></script>
<script type="text/javascript" src="../../Bootstrap/Js/app.js"></script>
</body>
</html>