$(document).ready(function () {
    
    $('#content con:eq(0)').addClass('boxMove');
    //첫번째 내용글 애니메이션 처리
    var smh= $('.visual').height();       //메인 비주얼의 높이
    var h1= $('#content con:eq(1)').offset().top-350 ;
    var h2= $('#content con:eq(2)').offset().top-350 ;
    var h3= $('#content con:eq(3)').offset().top-350 ;

     //스크롤의 좌표가 변하면.. 스크롤 이벤트,   오른쪽 위에 나타나는 스크롤 값!
    $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다
       
        //$('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.
        /*
        //sticky menu 처리
        if(scroll>smh){         //메인 비주얼의 높이보다 스크롤 값이 크면 스티키 메뉴가 나타난다!
            $('.navBox').addClass('navOn');     //코드 순서 상, 아래에 있는 navOn이 붙으면서 가서 붙어라!
            //스크롤의 거리가 350px 이상이면 서브메뉴 고정
            $('header').hide();                 //원래 있던 헤더 보이지 마라!
        }else{
            $('.navBox').removeClass('navOn');      //navOn 버리고 원래 상태로 돌아간다.
            //스크롤의 거리가 350px 보다 작으면 서브메뉴 원래 상태로
            $('header').show();     //fadeIn('slow' 'fast') 등 마음대로!
        }*/
        
        
        
        //$('.subNav li').find('a').removeClass('spy');       
        //모든 서브메뉴 비활성화~ 불꺼!!!
        
        
         //스크롤의 거리의 범위를 처리(0에서부터 어디까지는 뭐다 이걸 잡음!)
        if(scroll>=0 && scroll<h1){
            $('#content con:eq(0)').addClass('boxMove');
            //첫번째 내용 콘텐츠 애니메이

        }else if(scroll>=h1 && scroll<h2){
             $('#content con:eq(1)').addClass('boxMove');

        }else if(scroll>=h2 && scroll<h3){
             $('#content con:eq(2)').addClass('boxMove');

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