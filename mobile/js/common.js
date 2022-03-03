// 네비게이션, 탑무브 공통 js

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
 $(document).ready(function() {
    var op = false;  //네비가 열려있으면(true) , 닫혀있으면(false)
      
    $(".menu_open").click(function(e) { //메뉴버튼 클릭시
       e. preventDefault();   
 
        var documentHeight =  $(document).height();
        $("#gnb").css('height',documentHeight); //전체 body의 높이를 네비에 높이로 반환한다
 
       if(op==false){  //네비가 닫혀있는 상태에서 클릭했니?
         $("#gnb").animate({right:0,opacity:1}, 'fast');
         $('#headerArea').addClass('mn_open');
         op=true;
         $('.modal_box').fadeIn('slow');
       }else{    //네비가 열려있는 상태에서 클릭했니?
         $("#gnb").animate({right:'-100%',opacity:0}, 'fast');
         $('#headerArea').removeClass('mn_open');
         op=false;
         $('.modal_box').fadeOut('slow');
       }
 
    });
    
    
     //2depth 메뉴 교대로 열기 처리 
     var onoff=[false,false,false,false];   //각각의 메뉴가 열려있으면(true) , 닫혀있으면(false)
     var arrcount=onoff.length;  //메뉴의 개수 6
     
     console.log(arrcount);
     
     $('#gnb .depth1 h3 a').click(function(){    //1depth 메뉴를 각각 클릭하면
         var ind=$(this).parents('.depth1').index();   //인덱스가 0~5까지 빠진다
         
         console.log(ind);
         
        if(onoff[ind]==false){
         //$('#gnb .depth1 ul').hide();
         $(this).parents('.depth1').find('ul').slideDown('slow');    //클릭한 해당 메뉴의 2depth를 열어라
         $(this).parents('.depth1').siblings('li').find('ul').slideUp('fast');   //나머지 메뉴의 서브를 다 닫아라
          for(var i=0; i<arrcount; i++)  {
            onoff[i]=false;  //모든 메뉴의 상태를 false로 바꿔라
           } 
          onoff[ind]=true; //자신의 상태만 true
            
          $('.depth1 span').text('+');   
          $(this).find('span').text('-');   
             
        }else{   //클릭한 해당 메뉴가 열려있는가, 열려있는 상태에서 클릭했는가!
          $(this).parents('.depth1').find('ul').slideUp('fast');   //자신의 서브메뉴만 닫아라
          onoff[ind]=false;   
            
          $(this).find('span').text('+');     
        }
     });    
   
   });
 
 
 