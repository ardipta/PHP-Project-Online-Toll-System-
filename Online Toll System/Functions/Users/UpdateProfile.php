<?php
include '../../Class/Crud.php';
$crud = new Crud();
if (isset($_POST['submit'])){
    $id = $_POST['id'];
    $Name = $_POST['Ename'];
    $Mobile = $_POST['Emobile'];
    $Email = $_POST['Eemail'];
    $address = $_POST['address'];
    $Gender = $_POST['gender'];
    $DOB = $_POST['date'];
    $nid = $_POST['nid'];
    $vehicleNumber = $_POST['vhnumber'];
    $sql = "Update users SET Name = '$Name', Mobile = '$Mobile', Email = '$Email', Address ='$address',Gender ='$Gender', Date_of_Birth ='$DOB', NID ='$nid', Vehicle_Number = '$vehicleNumber' WHERE id = $id";
    $result = $crud->execute($sql);
    if($result){
        echo "<script>window.alert('Information Updated Successfully!')</script>";
        echo'<script> window.location="UserOption.php"; </script> ';
        /*header('location:Login.php');*/
    }
    else{
        echo "<script>window.alert('failed!')</script>";
        echo'<script> window.location="EditProfile.php"; </script> ';
    }
}
