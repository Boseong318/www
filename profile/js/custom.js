$(document).ready(function(){

	
	var ht = $(window).height();	//변수 ht에 브라우저의 높이값을 저장
	
	$("section").height(ht);		//브라우저의 높이값을 section의 높이값으로 지정
    //$("section").css('height',ht);
	
	
	$(window).on("resize",function(){	//브라우저가 리사이즈 될 때마다 브라우저와 section의 높이값을 갱신
		ht = $(window).height();	
		$("section").height(ht);
	});	

    /*마우스의 움직임에 반응하는 서브 이미지 설정하기*/
	$("section").on("mousemove",function(e){		//각각의 section에서 마우스를 움직이면
	
		//변수 posX에 마우스 커서의 x축 위치 저장
		var posX= e.pageX;
		//변수 posY에 마우스 커서의 y축 위치 저장
		var posY= e.pageY;

        //console.log(posX , posY );
		
	});

    	
	/*주 메뉴 클릭시 자동으로 상하 스크롤 시키기 */
	$("#menu li").on("click",function(e){		//메뉴 버튼 클릭시
		e.preventDefault();
		
		var ht = $(window).height();	//변수 ht에 브라우저의 높이값 저장
		var i = $(this).index(); 	//변수 i에 현재 클릭한 li의 순서값을 저장 0 1 2 3
		var nowTop = i*ht;	//브라우저의 높이값*박스의 순서값은 현재 박스의 스크롤 위치값과 동일
	
		
		$("html,body").stop().animate({"scrollTop":nowTop},1400);	//해당 스크롤 위치값으로 문서를 이동
	});
	
	/*화면이 스크롤 될때마다 현재 영역에 해당하는 메뉴 활성화하기 */
    $(window).on("scroll",function(){	
		
		var ht = $(window).height(); 	//변수 ht에 현재 브라우저의 넓이값 저장
		var scroll = $(window).scrollTop();	//변수 scroll에 현재 문서가 스크롤된 거리 저장
		
		for(var i=0; i<7; i++){
			if(scroll>=ht*i && scroll< ht*(i+1)){
				$("#menu li").removeClass();
				$("#menu li").eq(i).addClass("on");
			};
		}
	});


	    /*마우스 휠의 움직임에 따라 화면 스크롤 시키기 */
		$("section").on("mousewheel",function(event,delta){    	//section위에서 마우스 휠을 움직이면
		
            //마우스 휠을 올렸을때	
              if (delta > 0) {   //변수 prev에 현재 휠을 움직인 section에서 이전 section의 offset().top위치 저장
                 var prev = $(this).prev().offset().top;	 //문서 전체를 prev에 저장된 위치로 이동
                 $("html,body").stop().animate({"scrollTop":prev}, 700);
                 return false;

            //마우스 휠을 내렸을때	 
              }else if (delta < 0) {  //변수 next에 현재 휠을 움직인 section에서 다음 section의 offset().top위치 저장
                
                 var next = $(this).next().offset().top;	//문서 전체를 next에 저장된 위치로 이동
                 
                 $("html,body").stop().animate({"scrollTop":next}, 700);   
                 return false;                                      
              }
              
         });
    
  
		 $('.topMove').click(function(e){
			e.preventDefault();
			 //상단으로 스르륵 이동합니다.
			$("html,body").stop().animate({"scrollTop":0},1000); 
		 });    

});









