$(document).ready(function(){

    var screenSize = $(window).width();
    var screenHeight = $(window).height();

    $("#content").css('margin-top',screenHeight);

    if( screenSize > 768){
        $('#imgBG').attr('src','./sub_images/back3.jpg');
    }
    if(screenSize <= 768){
        $('#imgBG').attr('src','./sub_images/back3_768.jpg');
    }
    
    $(window).resize(function(){   
    screenSize = $(window).width(); 
    screenHeight = $(window).height();
        
    $("#content").css('margin-top',screenHeight);
        
    if( screenSize > 768){
        $('#imgBG').attr('src','./sub_images/back3.jpg');
    }
    if(screenSize <= 768){
        $('#imgBG').attr('src','./sub_images/back3_768.jpg');
    }
    }); 

    $('.down').click(function(){
		screenHeight = $(window).height();
		$('html,body').animate({'scrollTop':screenHeight}, 1000);
	});

});