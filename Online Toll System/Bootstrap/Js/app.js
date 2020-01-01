$(document).ready(function(){

    $('#add_toll').hide();
    $.get('ShowToll.php',function(data){
        $('#show_toll').html(data);
    })

    $('#addData').click(function(){

        var toll_id = $('#toll_ID').val();
        var toll_location = $('#toll_Location').val();
        var vehicle_type = $('#vhType').val();
        var toll_fee = $('#toll_Fee').val();
       /* console.log(toll_id);*/
        $.ajax({
            url:"AddToll.php",
            type:"POST",
            data:{t_id:toll_id,t_location:toll_location,vh_type:vehicle_type,t_fee:toll_fee},
            success: function(response){
                console.log(response);
                if(response == "success"){
                    $('#toll_ID').val('');
                    $('#toll_Location').val('');
                    $('#vhType').val('');
                    $('#toll_Fee').val('');
                    $('#add_toll').slideUp();
                    $.get('ShowToll.php',function(data){
                        $('#show_toll').html(data);
                    })

                }

            }
        })
    })

})