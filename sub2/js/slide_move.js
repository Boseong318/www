$(document).ready(function () {

   //sub2_1 베스트 제품
   $('.tap_menu a').click(function(e){
      e.preventDefault(); //href="#" 속성을 막아주는..메소드
   
      var value=0; //이동할 스크롤의 거리

      if($(this).hasClass('link1')){   //첫번째 메뉴를 클릭했냐?   if($(this).is('#link1')){
         value= $('#content .slogan_box').offset().top;  // 해당 콘테츠의 상단의 거리~~
      }else if($(this).hasClass('link2')){
         value= $('#content .introduce_box').offset().top; 
      }

      value -= 118;
      
    $("html,body").stop().animate({"scrollTop":value},1000);
   });


});
