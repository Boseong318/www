

var xhr = new XMLHttpRequest();                 // XMLHttpRequest 객체를 생성한다.

xhr.onload = function() {                       // When readystate changes
 
  if(xhr.status === 200) {                      // If server status was ok
    responseObject = JSON.parse(xhr.responseText);  //서버로 부터 전달된 json 데이터를 responseText 속성을 통해 가져올 수 있다. 진짜 js파일로 인식시켜 주는 문자
	                                                 // parse() 메소드를 호출하여 자바스크립트 객체로 변환한다.

    var newContent = '';
    /*
    for (var i = 0; i < responseObject.events.length; i++) { 
      newContent += '<div class="event">';
      newContent += '<img src="' + responseObject.events[i].map + '" ';
      newContent += 'alt="' + responseObject.events[i].location + '" />';
      newContent += '<p><b>' + responseObject.events[i].location + '</b><br>';
      newContent += responseObject.events[i].date + '</p>';
      newContent += '</div>';
    }
    */
   // newContent += '<ul class="pop_menu">';
    for (var i = 0; i < responseObject.events.length; i++) { 
      newContent += '<ul class="pop_menu">'
      newContent += '<li>';
      newContent += '<a href="#">';
      newContent += '<div class="img_box more_btn">';
      newContent += '<img src="'+ responseObject.events[i].img +'" alt="'+ responseObject.events[i].name +'">';
      newContent += '</div>';
      newContent += '<p><span>'+ responseObject.events[i].type +'</span>'+ responseObject.events[i].name +'</p>';
      newContent += '</a>';
      newContent += '</li>';
      newContent += '</ul>';
    }
  //  newContent += '</ul>';


 
    document.getElementById('product_box').innerHTML = newContent;

  }
};

xhr.open('GET', 'data/data.json', true);        // 요청을 준비한다.
xhr.send(null);                                 // 요청을 전송한다

 //제휴카드모달
 $(document).ready(function(){
    
  var newContent='';
  $('.more_btn').click(function(e){
      e.preventDefault();

      var ind = $(this).index('.more_btn');
      //console.log(ind);

      $('.modal_box').fadeIn('fast');
      $('.popup').fadeIn('slow');

      newContent='';
      newContent+='<img src="'+ responseObject.events[ind].modal_img +'" ' + 'alt="">';
      newContent+='<div class= "txt">';
      newContent+='<dl>';
      newContent+='<dt>'+ responseObject.events[ind].modal_name +'</dt>';
      newContent+='<dt> 구분</dt>';
      newContent+='<dd>'+ responseObject.events[ind].modal_type +'</dd>';
      newContent+='<dt> 주요성분</dt>';
      newContent+='<dd>'+ responseObject.events[ind].ingredient +'</dd>';
      newContent+='<dt> 성상</dt>';
      newContent+='<dd>'+ responseObject.events[ind].icon +'</dd>';
      newContent+='</dl>';
      newContent+='</div>';
      newContent+='<div class= "info">';
      newContent+='<dl>';
      newContent+='<dt> 효능</dt>';
      newContent+='<dd>'+ responseObject.events[ind].effect +'</dd>';
      newContent+='<dt> 용법</dt>';
      newContent+='<dd>'+ responseObject.events[ind].usage +'</dd>';
      newContent+='<dt> 보관방법</dt>';
      newContent+='<dd>'+ responseObject.events[ind].storage +'</dd>';
      newContent+='<dt> 포장단위</dt>';
      newContent+='<dd>'+ responseObject.events[ind].package +'</dd>';
      newContent+='</dl>';
      newContent+='</div>';
      newContent+='<a href="#" class="close_btn">닫기</a>';


      $('.popup').html(newContent);
      //console.log(responseObject); 
  });



  $('.close_btn').click(function(e){
      e.preventDefault();
      $('.modal_box').hide();
      $('.popup').hide();

  });
});