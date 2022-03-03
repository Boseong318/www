// 네비게이션, 탑무브 공통 js

$(document).ready(function() {
//상단으로 이동, 탑무브
$('.topMove').hide();
           
$(window).on('scroll',function(){ //스크롤 값의 변화가 생기면
     var scroll = $(window).scrollTop(); //스크롤의 거리
    
    
     //$('.text').text(scroll);

     if(scroll>600){ //500이상의 거리가 발생되면
         $('.topMove').fadeIn('slow');  //top보여라~~~~
     }else{
         $('.topMove').fadeOut('fast');//top안보여라~~~~
     }
});

 $('.topMove').click(function(e){
    e.preventDefault();
     //상단으로 스르륵 이동합니다.
    $("html,body").stop().animate({"scrollTop":0},1000); 
 });    


 //네비게이션

    var documentHeight =  $(document).height();
   //  $("#gnb").css('height',documentHeight);

    $(".menu_open").toggle(function(e) {
      e. preventDefault();   
      $("#gnb").css('height',documentHeight);
      $("#gnb").animate({right:0,opacity:1}, 'fast');
      $('#headerArea').addClass('mn_open');
   }, function(e) {
      e. preventDefault();   
      $("#gnb").css('height',80);
      $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
      $('#headerArea').removeClass('mn_open');
   });
   
 
    var current=0;
   $(window).resize(function(){ 
      var screenSize = $(window).width(); 
      if( screenSize > 1024){
        $("#gnb").css({right:0,opacity:1});
        $('#headerArea').addClass('mn_open');
		    current=1;
      }
      if(current==1 && screenSize <= 1024){
        $("#gnb").css({right:'-100%',opacity:0});
        $('#headerArea').removeClass('mn_open');
         current=0;
      }
    }); 


});