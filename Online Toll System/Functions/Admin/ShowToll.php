<?php
header('Access-Control-Allow-Origin: *');
include_once "../../Class/Crud.php";
$crud = new Crud();
$result = $crud->getData("SELECT * from admin order by id DESC");

if($result){
    echo "<table border='1' class='table table-hover text-center'>
        <thead class='thead-light'>
            <tr>
                <th>Toll ID</th>
                <th>Toll Location</th>
                <th>Vehicle Type</th>
                <th style='text-align: center'>Toll Fee</th>
                <th style='text-align: center'>Action</th>
            </tr>
		</thead>";
    foreach($result as $row){
        echo "<tr><td >".$row['Toll_ID']."</td>";
        echo "<td>".$row['Toll_Location']."</td>";
        echo "<td>".$row['Vehicle_Type']."</td>";
        echo "<td>".$row['Toll_Fee']."</td>";
        echo "<td><button id='".$row['id']."' class='editView btn btn-outline-primary'>Edit</button> <button id='".$row['id']."' class='delete btn btn-outline-warning'>Delete</button></td></tr> ";
    }
    echo "</table>";
}else{
    echo "No Data Found! Please Add Data.";
}
?>
<script type="text/javascript">
    $(document).ready(function(){

        $('.editView').on('click',function(){
            var id = $(this).attr('id');
            //alert(id);
            $.ajax({
                url:"EditToll.php",
                type:"POST",
                data:{param_id:id},
                success: function(response){
                    $('#edit_toll').slideDown();
                    $('#edit_toll').html(response);
                }
            })
        })

        $('.delete').on('click',function(){
            var id = $(this).attr('id');
            //alert(id);
            $.ajax({
                url:"DeleteToll.php",
                type:"POST",
                data:{param_id:id},
                success: function(response){

                    if(response == "success"){
                        $.get('ShowToll.php',function(data){
                            $('#show_toll').html(data);
                        })
                    }
                }
            })
        })


    })

</script>