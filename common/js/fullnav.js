
$(document).ready(function() {

   var smh=$('.visual').height();  //비주얼 이미지의 높이를 리턴한다   900px
   var on_off=false;  //false(안오버)  true(오버)  
   
   
       $('#headerArea').mouseenter(function(){
          // var scroll = $(window).scrollTop();
           $(this).css('background','#fff');
           $('.dropdownmenu li a').css('color','#333'); 
          
           on_off=true;
       });
   
      $('#headerArea').mouseleave(function(){
           var scroll = $(window).scrollTop();  //스크롤의 거리
           
           if(scroll>=0 && scroll<smh-117){
               $(this).css('background','#fff').css('border-bottom','1px solid #ccc'); 
               $('.dropdownmenu li a').css('color','#333');
           }else if(scroll>smh-117){
               $(this).css('background','#fff'); 
               $('.dropdownmenu li a').css('color','#333');
           }
          on_off=false;    
      });
   
      $(window).on('scroll',function(){//스크롤의 거리가 발생하면
           var scroll = $(window).scrollTop();  //스크롤의 거리를 리턴하는 함수
           //console.log(scroll);

           if(scroll>smh-125){//스크롤300까지 내리면
               $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
               $('.dropdownmenu li a').css('color','#333');
           }else{//스크롤 내리기 전 디폴트(마우스올리지않음)
              if(on_off==false){
                   $('#headerArea').css('background','#fff').css('border-bottom','1px solid #ccc');
                   $('.dropdownmenu li a').css('color','#333');
              }
           }; 
           
        });

  
    //2depth 열기/닫기
    $('ul.dropdownmenu').hover(
      function() { 
         $('ul.dropdownmenu li.menu ul').fadeIn('normal',function(){$(this).stop();}); //모든 서브를 다 열어라
         $('#headerArea').animate({height:300},'fast').clearQueue();
      },function() {
         $('ul.dropdownmenu li.menu ul').fadeOut('fast'); //모든 서브를 다 닫아라
         $('#headerArea').animate({height:117},'normal').clearQueue();
    });
    
    //1depth 효과
    $('ul.dropdownmenu li.menu').hover(
      function() { 
          $('.depth1',this).css('color','#01abce');
      },function() {
         $('.depth1',this).css('color','#333');
    });

    //tab 처리
    $('ul.dropdownmenu li.menu .depth1').on('focus', function () {        
       $('ul.dropdownmenu li.menu ul').slideDown('normal');
       $('#headerArea').animate({height:300},'fast').clearQueue();
    });

   $('ul.dropdownmenu li.m6 li:last').find('a').on('blur', function () {        
       $('ul.dropdownmenu li.menu ul').slideUp('fast');
       $('#headerArea').animate({height:117},'normal').clearQueue();
   });

    //상단으로 이동
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
});
