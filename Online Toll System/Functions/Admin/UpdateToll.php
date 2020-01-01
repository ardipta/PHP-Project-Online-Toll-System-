<?php
    include_once "../../Class/Crud.php";
    $crud = new Crud();

    $toll_id = $_POST['t_id'];
    $toll_location = $_POST['t_location'];
    $vehicle_type = $_POST['vh_type'];
    $toll_fee =  $_POST['t_fee'];
    $id = $_POST['param_id'];
    $sql = "Update admin SET Toll_ID ='$toll_id',Toll_Location ='$toll_location', Vehicle_Type ='$vehicle_type', Toll_Fee ='$toll_fee' WHERE id = $id";

    $result = $crud->execute($sql);
    if($result){
        echo "success";
    }
    else{
        echo "Update problem";
    }

?>