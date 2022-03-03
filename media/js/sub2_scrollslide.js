window.addEventListener('scroll', function () {
    //console.log(window.scrollY)
  });
  $(document).ready(function () {
  
    $(window).on('scroll', function () {
      var scroll = $(window).scrollTop();
      console.log(scroll);
      if (scroll > 3800 && scroll < 3900) {
        // console.log(scroll);
        // console.log($('.right_icon').offset())
        $('.icon').css('left', 0);
      }
      if (scroll > 3900 && scroll < 4000) {
        $('.icon').css('left', '20%');
      }
      if (scroll > 4000 && scroll < 4100) {
        $('.icon').css('left', '40%');
      }
      if (scroll > 4100 && scroll < 4200) {
        $('.icon').css('left', '60%');
      }
      if (scroll > 4200 && scroll < 4300) {
        $('.icon').css('left', '74%');
      }
    });
  
  });

     //스크롤의 좌표가 변하면.. 스크롤 이벤트,   오른쪽 위에 나타나는 스크롤 값!
     $(window).on('scroll',function(){
        var scroll = $(window).scrollTop();
        //스크롤top의 좌표를 담는다
       
        $('.text').text(scroll);
        //스크롤 좌표의 값을 찍는다.
     });