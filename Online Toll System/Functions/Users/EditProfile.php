<?php
    session_start();
    if(!isset($_SESSION['email'])){
        header('location:Login.php');
    }
    else{
        $email =$_SESSION['email'];
    }
    include '../../Class/Crud.php';
    $crud = new Crud();
    $id = $_GET['id'];
    $result = $crud->getData("SELECT * from users where id=$id");
    foreach($result as $res){
        $Name = $res['Name'];
        $Mobile = $res['Mobile'];
        $Email = $res['Email'];
}
?>
<html>
    <head>
        <link rel="stylesheet" href="../../Bootstrap/CSS/bootstrap.min.css">
        <link rel="stylesheet" href="../../Bootstrap/CSS/AdminUserStyle.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Serif|Poppins&display=swap" rel="stylesheet">
    </head>
    <body>
    <form action="UpdateProfile.php <?php echo $id; ?>" method="POST">
        <div class="container">
            <div class="row">
                <div class="offset-2 col-lg-8">
                    <h2 style="text-align: center">Update Information for <?php echo $Email; ?></h2>
                    <hr>
                    <div class="form-group">
                        <input type="text" name="Ename"  value="<?php echo $Name; ?>" class="form-control col-lg-6">
                    </div>
                    <div class="form-group">
                        <input type="number" name="Emobile"  value="<?php echo $Mobile; ?>" class="form-control col-lg-6">
                    </div>
                    <div class="form-group">
                        <input type="email" name="Eemail" value="<?php echo $Email; ?>" class="form-control col-lg-6">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Enter Address Here" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" placeholder="Enter NID Number Here" class="form-control col-lg-6" name="nid">
                    </div>
                    <div class="form-group">
                        <select class="form-control col-lg-6" name="gender">
                            <option>--Select Gender--</option>
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="date" placeholder="Enter Date of Birth Here" class="form-control col-lg-6">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Enter Vehicle Number Here" name="vhnumber" class="form-control col-lg-6">
                    </div>
                    <div class="form-group">
                        <input type="button"  class="form-control btn btn-outline-info col-lg-3" value="Update Info" id="submit" name="submit">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>

    </body>
</html>

