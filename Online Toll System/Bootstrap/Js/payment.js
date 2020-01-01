$(document).ready(function(){

//For Card Number formatted input
    var cardNum = document.getElementById('cr_no');
    cardNum.onkeyup = function (e) {
        if (this.value == this.lastValue) return;
        var caretPosition = this.selectionStart;
        var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
        var parts = [];

        for (var i = 0, len = sanitizedValue.length; i < len; i +=4) { parts.push(sanitizedValue.substring(i, i + 4)); } for (var i=caretPosition - 1; i>= 0; i--) {
            var c = this.value[i];
            if (c < '0' || c> '9') {
                caretPosition--;
            }
        }
        caretPosition += Math.floor(caretPosition / 4);

        this.value = this.lastValue = parts.join('-');
        this.selectionStart = this.selectionEnd = caretPosition;
    }

    //For Date formatted input
    var expDate = document.getElementById('exp');
    expDate.onkeyup = function (e) {
        if (this.value == this.lastValue) return;
        var caretPosition = this.selectionStart;
        var sanitizedValue = this.value.replace(/[^0-9]/gi, '');
        var parts = [];

        for (var i = 0, len = sanitizedValue.length; i < len; i +=2) { parts.push(sanitizedValue.substring(i, i + 2)); } for (var i=caretPosition - 1; i>= 0; i--) {
            var c = this.value[i];
            if (c < '0' || c> '9') {
                caretPosition--;
            }
        }
        caretPosition += Math.floor(caretPosition / 2);

        this.value = this.lastValue = parts.join('/');
        this.selectionStart = this.selectionEnd = caretPosition;
    }

    // Radio button
    $('.radio-group .radio').click(function(){
        $(this).parent().parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });
    $('#submit').click(function(){

        var name = $('#name').val();
        var amo = $('#amount').val();
        var cardNo = $('#cr_no').val();
        var expDate = $('#exp').val();
        var cv = $('#cvv').val();
        /* console.log(toll_id);*/
        $.ajax({
            url:"PaymentToll.php",
            type:"POST",
            data:{name:name,amount:amo,card_no:cardNo,expdate:expDate, cvv:cv},
            success: function(response){
                console.log(response);
                if(response == "success"){
                    $('#name').val('');
                    $('#amount').val('');
                    $('#cr_no').val('');
                    $('#exp').val('');
                    $('#cv').val('');
                    window.alert("Payment Successfull!")
                    window.location("UserInfo.php");
                }

            }
        })
    })
})