$(document).ready(function () {
     //슬라이드 메뉴 클릭시 해당 콘텐츠로 스스륵~~~ 이동


     //sub1_2 연혁
     $('.tap_menu a').click(function(e){
      e.preventDefault(); //href="#" 속성을 막아주는..메소드
 
       var value3=0; //이동할 스크롤의 거리

        if($(this).hasClass('link1')){     //첫번째 메뉴를 클릭했냐?   if($(this).is('#link1')){
         value3= $('.history_2020').offset().top;      // 해당 콘테츠의 상단의 거리~~
       }else if($(this).hasClass('link2')){
         value3= $('.history_2010').offset().top; 
       }else if($(this).hasClass('link3')){
         value3= $('.history_2000').offset().top; 
       }else if($(this).hasClass('link4')){
         value3= $('.history_1990').offset().top; 
       }else if($(this).hasClass('link5')){
         value3= $('.history_1980').offset().top; 
       }else if($(this).hasClass('link6')){
         value3= $('.history_1970').offset().top; 
       }
       
       value3 -=118;

       $("html,body").stop().animate({"scrollTop":value3},1000);
      });
});