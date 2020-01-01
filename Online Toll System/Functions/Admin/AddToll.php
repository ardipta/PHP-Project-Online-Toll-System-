<?php
    include_once "../../Class/Crud.php";
    $crud = new Crud();
    $toll_id = $_POST['t_id'];
    $toll_location = $_POST['t_location'];
    $vehicle_type = $_POST['vh_type'];
    $toll_fee =  $_POST['t_fee'];
    $sql = "INSERT into admin(Toll_ID,Toll_Location, Vehicle_Type,Toll_Fee)
            VALUES('$toll_id','$toll_location','$vehicle_type','$toll_fee')";

    $result = $crud->execute($sql);

    if($result){
        echo "success";
    }else{
        echo "Insertion problem";
    }
?>
