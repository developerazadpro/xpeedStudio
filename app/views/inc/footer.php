  </div>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="<?php echo URLROOT; ?>/js/main.js"></script>
<script src="<?php echo URLROOT; ?>/js/fontawesome.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/form.js"></script>
<!--custom script-->
<script>
    // add more item
    function addItem() {
        var index = $('#item_index').val();
        index = parseInt(index);
        
        var data = '<div class="form-group" id="item_div_'+index+'">'+
                        '<div class="row">'+
                            '<div class="col-md-10">'+    
                                '<input type="text" name="items[]" class="form-control form-control-lg  value="">'+
                            '</div>'+
                            '<div class="col-md-2">'+
                                '<a href="javascript:removeItem('+index+');" class="btn btn-icon btn-lg btn-danger" title="Remove"><i class="icon-minus">-</i></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>';        
        $('#item_more').append(data);        
        index++;
        $('#item_index').val(index);
    }

    function removeItem(index) {
        $('#item_div_'+index).remove();
    }

    
    $('#phone').keyup(function(){
        var phone = $(this).val();
        console.log(phone);
        if(phone == '0'){
            $(this).val('');
        }
    });
    
    // number validation
    function validateNumber(div_id) {
        var data, len, new_value="";
        data = document.getElementById(div_id);
        data.value.toString();
        len = data.value.length;
        for( var i = 0; i < len; i++ ) {
            if( isNaN( data.value[i] ) && data.value[i] != "+" && data.value[i] != "(" && data.value[i] != ")" && data.value[i] != "-" ) {
                continue;
            }
            new_value += data.value[i];
        }
        data.value = new_value;

    }

    //Text validation
    function validateText(div_id){
        var data, len, new_value="";
        data = document.getElementById(div_id);
        data.value.toString();
        len = data.value.length;
        for( var i = 0; i < len; i++ ) {
            if( !isNaN( data.value[i] ) ) {
                continue;
            }
            new_value += data.value[i];
        }
        data.value = new_value;
      
    }
    // only letter space and number
    function validateAlphaNumeric(inputtxt){
        var letterNumber = /^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
        if(inputtxt.match(letterNumber)){
          return true;
        }else{ 
          alert("message"); 
          return false; 
        }
    }

    
</script>

<!--/.custom script-->
</body>
</html>