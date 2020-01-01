<?php

header('Access-Control-Allow-Origin: *');
session_start();
if (!isset($_SESSION['email'])) {
    header('location:Login.php');
} else {
    $email = $_SESSION['email'];
}
include_once "../../Class/Crud.php";
$crud = new Crud();
$result = $crud->getData("SELECT * from users WHERE Email = '$email'");
if($result){
    foreach ($result as $row){
        $name = $row['Name'];
        $mobile = $row['Mobile'];
        $email = $row['Email'];
        $id = $row['id'];
        /*echo "<div class='container'>
                <div class='row'>
                <div class='offset-5 col-lg-8''>
                    Full Name: ".$row['Name']."<br>
                    Mobile: ".$row['Mobile']."<br>
                    Email: ".$row['Email']."
                    <!--<label class='form-control'></label>
                    <label class='form-control'><br></label>
                    <label class='form-control'></label>          -->
                </div>
        </div>
    </div>";*/
    }
}
else{
    echo "No Data Found! Please Add Data.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../../Bootstrap/CSS/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../Bootstrap/CSS/user.css" rel="stylesheet">

</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><strong>Online Toll System</strong> </div>
        <div class="list-group list-group-flush">
            <a href="../../index.html" class="list-group-item list-group-item-action bg-light">Home</a>
            <a href="EditProfile.php?id=<?php echo $id;?>" class="list-group-item list-group-item-action bg-light">Edit Profile</a>
            <a href="UserInfo.php" class="list-group-item list-group-item-action bg-light">My Account</a>
            <a href="PaymentToll.php" class="list-group-item list-group-item-action bg-light">Pay Toll</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../Auth/Registration.php">Sign Up</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $email; ?>
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

        <div class="container-fluid">
            <h1 class="mt-4" style="text-align: center">User Information</h1>
        </div>
        <div class="container-fluid">
            <div class="form-group text-center offset-4">
                <label class="form-control col-lg-6">Full Name: <?php echo $name; ?></label>
                <label class="form-control col-lg-6">Email Address: <?php echo $email; ?></label>
                <label class="form-control col-lg-6">Mobile No: <?php echo $mobile; ?></label>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="../../Bootstrap/Js/jquery.min.js"></script>
<script src="../../Bootstrap/Js/bootstrap.bundle.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
<?php

?>


