$(document).ready(function () {
     //슬라이드 메뉴 클릭시 해당 콘텐츠로 스스륵~~~ 이동
     //sub1_1 연혁/ci logo
     $('.tap_menu a').click(function(e){
        e.preventDefault(); //href="#" 속성을 막아주는..메소드
   
         var value1=0; //이동할 스크롤의 거리

         if($(this).hasClass('link1')){   //첫번째 메뉴를 클릭했냐?   if($(this).is('#link1')){
            value1= $('#content .intro_box').offset().top;  // 해당 콘테츠의 상단의 거리~~
         }else if($(this).hasClass('link2')){
            value1= $('#content .ci_logo').offset().top; 
         }
         
         value1 -= 118;

       $("html,body").stop().animate({"scrollTop":value1},1000);
     });

     //sub1_1 피닉스 로고/ci logo 타입
     $('.logo_tap1 a').click(function(e){
        e.preventDefault(); //href="#" 속성을 막아주는..메소드
   
         var value2=0; //이동할 스크롤의 거리

         if($(this).hasClass('link1')){   //첫번째 메뉴를 클릭했냐?   if($(this).is('#link1')){
            value2= $('.logo_inner').offset().top;  // 해당 콘테츠의 상단의 거리~~
         }else if($(this).hasClass('link2')){
            value2= $('.img_box').offset().top; 
         }
         
         value2 -= 118;

       $("html,body").stop().animate({"scrollTop":value2},1000);
     });
});