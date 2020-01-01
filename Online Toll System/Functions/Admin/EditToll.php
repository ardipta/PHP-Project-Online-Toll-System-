<?php
include_once "../../Class/Crud.php";
$crud = new Crud();

$id = $_POST['param_id'];

$result = $crud->getData("SELECT * from admin where id=$id");
foreach($result as $res){
    $toll_id = $res['Toll_ID'];
    $toll_location = $res['Toll_Location'];
    $vehicle_type = $res['Vehicle_Type'];
    $toll_fee = $res['Toll_Fee'];
}
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label>Toll ID</label>
                <input type="text" id="e_toll_ID" name="e_toll_ID" value="<?php echo $toll_id; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Toll Location</label>
                <input type="text" id="e_toll_Location" value="<?php echo $toll_location; ?>" name="e_toll_Location" class="form-control">
            </div>
            <div class="form-group">
                <label>Vehicle Type</label>
                <select id="e_vhType" name="e_vhType" class="form-control">
                    <option><?php echo $vehicle_type; ?></option>
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="heavy">Heavy</option>
                    <option value="extra_heavy">Extra Heavy</option>
                </select>
            </div>
            <div class="form-group">
                <label>Toll fee</label>
                <input type="number" id="e_toll_Fee" name="e_toll_Fee" value="<?php echo $toll_fee; ?>" class="form-control">
            </div>
            <div class="form-group">
                <input type="button" id="update" name="addData" value="Update Info" class="update form-control btn btn-outline-warning">
            </div>
            <div class="form-group">
                <input type="button" onclick="$('#edit_toll').slideUp();" value="Cancel" class="form-control btn btn-outline-primary">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('.update').on('click',function(){
            var id = "<?php echo $id; ?>";
            var toll_id = $('#e_toll_ID').val();
            var toll_location = $('#e_toll_Location').val();
            var vehicle_type = $('#e_vhType').val();
            var toll_fee = $('#e_toll_Fee').val();
            $.ajax({
                url:"UpdateToll.php",
                type:"POST",
                //{param : value}
                data:{param_id:id, t_id:toll_id, t_location:toll_location, vh_type:vehicle_type, t_fee:toll_fee},
                success: function(response){
                    console.log(response);
                    if(response == "success"){
                        $('#toll_ID').val('');
                        $('#toll_Location').val('');
                        $('#vhType').val('');
                        $('#toll_Fee').val('');
                        $('#edit_toll').slideUp();
                        $.get('ShowToll.php',function(data){
                            $('#show_toll').html(data);
                        })
                    }
                }
            })
        })
    })

</script>