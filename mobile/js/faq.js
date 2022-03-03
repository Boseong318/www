// JavaScript Document
$(document).ready(function () {
	var article = $('.contlist .article');		//faq에 있는 article이라는 변수에 담아 놓는다, 이제 article= 모든 li(질문답변)들
	//article.find('.a').slideUp(100); 		//이거 있으면 새로고침 할 때마다 껄떡거림, css에, a에 display: blcok;주기
	
	$('.contlist .article .trigger').click(function(e){  //각각의 질문을 클릭할 때
		e.preventDefault();
		var myArticle = $(this).parents('.article'); 	//클릭한 해당 메뉴에 li(리스트), trigger의 할아버지 바로 찾아가기, myArticle=내가 클릭한 그 li
	
	if(myArticle.hasClass('hide')){   //니가 클릭한 li가 hide라는 클래스를 갖고 있냐?, 해당 리스트가 닫혀 있냐(hide)?
	    article.find('.answer').slideUp(100);	//모든 list의 답변을 닫아라,
        article.removeClass('show').addClass('hide'); //닫았으니까 모든 list 클래스의 상태도 hide로 갈아치워라

	    myArticle.removeClass('hide').addClass('show');  //클래스 바꿔치기 아래myArticle.find('.a').slideDown(100);랑 한 쌍,
	    myArticle.find('.answer').slideDown(100);  //답변을 실제로 열리는 코드, 해당 리스트의 답변을 열어라~ fadein/out, show 사용가능
	 } else {  						//니가 클릭한 li가 hide라는 클래스를 갖고 있냐?, 해당 리스트가 열려 있냐(show)?
	   myArticle.removeClass('show').addClass('hide');  //클래스 바꿔치기
	   myArticle.find('.answer').slideUp(100);  //해당 리스트의 답변을 닫아라~
	}  
  });      
  
  //모두여닫기
  $('.all').toggle(function(e){ 
    e.preventDefault();
	article.find('.answer').slideDown(100);		
    article.removeClass('hide').addClass('show'); 	
	//$(this).text('모두닫기');
	$(this).html('<span class="hidden">모두닫기</span><i class="fas fa-sort-up"></i>');

},function(e){ 
	e.preventDefault();
    article.find('.answer').slideUp(100);
    article.removeClass('show').addClass('hide');
	//$(this).text('모두열기');
	$(this).html('<span class="hidden">모두열기</span><i class="fas fa-sort-down"></i>');
});

}); 

