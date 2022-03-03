$(document).ready(function(){
  
    $('#contactForm,.row input,.row textarea,#content .send button').addClass('blocked');
    $('.row input,.row textarea,#content .send button').attr('disabled','disabled');
    
    
    $("#check01").change(function(){
        if($("#check01").is(":checked")){
            $('#contactForm,.row input,.row textarea,#content .send button').removeClass('blocked');
            $('.row input,.row textarea,#content .send button').removeAttr('disabled');
        }else{
            $('#contactForm,.row input,.row textarea,#content .send button').addClass('blocked');
            $('.row input,.row textarea,#content .send button').attr('disabled','disabled');
        }
    });
});