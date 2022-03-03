$(document).ready(function () {
    //$('#content .content_box .mission_box .mission_heading').addClass('boxMove');
    //첫번째 내용글 애니메이션 처리
    //var smh= $('.visual').height();       //메인 비주얼의 높이

    var h1= $('#content .content_bot').offset().top-350 ;
    var h2= $('#content .news').offset().top-30  ;

     //스크롤의 좌표가 변하면.. 스크롤 이벤트,   오른쪽 위에 나타나는 스크롤 값!
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다
    /*   
        $('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.
    */
    
        
        
         //스크롤의 거리의 범위를 처리(0에서부터 어디까지는 뭐다 이걸 잡음!)
        if(scroll>=0 && scroll<h1){
            $('#content .content_bot').addClass('boxMove');
            //첫번째 내용 콘텐츠 애니메이

        }else if(scroll>=h1 && scroll<h2){
             $('#content .news').addClass('boxMove');

        }   
        
        
     /*   
        //스크롤의 거리의 범위를 처리 : 값을 추출해서 하는 방법
        if(scroll>=0 && scroll<500){
            $('.subNav li:eq(0)').find('a').addClass('spy');
            //첫번째 서브메뉴 활성화
            
            $('#content div:eq(0)').addClass('boxMove');
            //첫번째 내용 콘텐츠 애니메이
        }else if(scroll>=500 && scroll<1100){
            $('.subNav li:eq(1)').find('a').addClass('spy');
            //두번째 서브메뉴 활성화
            
             $('#content div:eq(1)').addClass('boxMove');
        }else if(scroll>=1100 && scroll<1500){
            $('.subNav li:eq(2)').find('a').addClass('spy');
            //세번째 서브메뉴 활성화
            
             $('#content div:eq(2)').addClass('boxMove');
        }else if(scroll>=1500){
            $('.subNav li:eq(3)').find('a').addClass('spy');
            //네번째 서브메뉴 활성화
            
             $('#content div:eq(3)').addClass('boxMove');
        }
        
    */    
        
    });
});


