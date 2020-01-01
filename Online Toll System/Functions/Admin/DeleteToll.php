<?php
include_once "../../Class/Crud.php";
$crud = new Crud();

$id = $_POST['param_id'];

if($crud->delete($id,'admin')){
    echo "success";
}
?>
