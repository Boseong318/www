// JavaScript Document

$(document).ready(function(){
    var cnt=2;  //탭메뉴 개수 ***
    $('.product .con:eq(0)').show(); // 첫번째 탭 내용만 열어라
    $('.product .m1').css('background','#01abce'); //첫번째 탭메뉴 활성화
               //자바스크립트의 상대 경로의 기준은 => 스크립트 파일을 불러들인 html파일이 저장된 경로 기준***
    
    $('.product .button').each(function (index) {  // index=0 1 2
      $(this).click(function(e){
          e.preventDefault();   // <a> href="#" 값을 강제로 막는다    

          $(".product .con").hide(); //모든 탭내용을 안보이게...
          $(".product .con:eq("+index+")").show(); //클릭한 해당 탭내용만 보여라
          $('.button').css('border','1px solid #01abce').css('background','transparent'); //모든 탭메뉴를 비활성화
          $(this).css('background','#01abce'); // 클릭한 해당 탭메뉴만 활성화

     });
    });

  });

