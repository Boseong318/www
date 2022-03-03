$(document).ready(function(){
  //객체배열(jason)
    var memo1 = [
          {title:'박카스디액', sub1:'의약외품', sub2:'이 약 100㎖ 중 타우린 2,000mg, 이노시톨 50mg, 니코틴산아미드 20mg, 티아민질산염 5mg', sub3:'특이한 향이 있는 투명한 황색 액체'},
          {title:'박카스에프액', sub1:'의약외품', sub2:'이 약 100㎖ 중 타우린 2,000mg, 이노시톨 50mg, 니코틴산아미드 20mg, 티아민질산염 5mg', sub3:'특이한 향이 있는 투명한 황색 액체'},
          {title:'박카스 디카페액', sub1:'의약외품',  sub2:'이 약 100㎖ 중 타우린 2,000mg, 이노시톨 50mg, 니코틴산아미드 20mg, 티아민질산염 5mg', sub3:'특이한 향이 있는 투명한 황색 액체'},
        ];
      
   
    $('.pro_list .pop_menu a').click(function(e){
        e.preventDefault();
        var txt ='';
        var ind = $(this).index('.pro_list .pop_menu a');  // 0 1 2 3
  
        $('.pro_list .modal_box').fadeIn('fast');
        $('.pro_list .popup').fadeIn('slow');
  
        $('.pro_list .popup img').attr('src','./images/content2/big'+(ind+1)+'.jpg');
        
        txt+= '<dl>';
        txt+= '<dt> '+memo1[ind].title+'</dt>';
        txt+= '<dt>구분 </dt>';
        txt+= '<dd>'+memo1[ind].sub1+'</dd>';
        txt+= '<dt>주요성분 </dt>';
        txt+= '<dd>'+memo1[ind].sub2+'</dd>';
        txt+= '<dt>성상</dt>';
        txt+= '<dd>'+memo1[ind].sub3+'</dd>';
        txt+= '</dl>';
        
        $('.pro_list .popup .txt').html(txt);
  
    });
  
    $('.close_btn,.pop .modal_box').click(function(e){
        e.preventDefault();
        $('.pro_list .modal_box').hide();
        $('.pro_list .popup').hide();
    });

    var memo = [
      {sub1:'육체피로,병후의 체력저하,식욕부진,영양장애, 발열성,소모성질환등의 경우 영양보급, 자양강장, 허약체질', sub2:'15세 이상 성인 1회 1병(100ml), 1일 1회 15세 미만은 복용하지 않는다.', sub3:'기밀용기에 직사광선을 피해 실온의 건조한 곳에 보관한다.', sub4:'10병/CASE(10CASE/BOX)'},
      {sub1:'자양강장, 허약체질, 육체피로, 병후의 체력저하, 식욕부진, 영양장애', sub2:'15세 이상 성인 : 1일 1회 1병을 복용합니다. 15세 미만은 복용하지 않는다.', sub3:'기밀용기, 실온보관(1~30ºC)', sub4:'10병/CASE(10CASE/BOX)'},
      {sub1:'자양강장, 허약체질, 육체피로, 병중병후, 발열성 소모성질환의 영양보급', sub2:'성인 1일 1회 1병을 복용한다. 만 14세 이하는 복용하지 않는다',  sub3:'기밀용기에 직사광선을 피해 실온의 건조한 곳에 보관한다.', sub4:'1케이스(120㎖ X 10EA)'},
    ];
  

    $('.pro_list .pop_menu a').click(function(e){
        e.preventDefault();
        var txt ='';
        var ind = $(this).index('.pro_list .pop_menu a');  // 0 1 2 3

        $('.pro_list .modal_box').fadeIn('fast');
        $('.pro_list .popup').fadeIn('slow');

        $('.pro_list .popup img').attr('src','./images/content2/big'+(ind+1)+'.jpg');
        
        txt+= '<dl>';
        txt+= '<dt>효능 및 효과 </dt>';
        txt+= '<dd> '+memo[ind].sub1+'</dd>';
        txt+= '<dt>용법 및 용량 '+'</dt>';
        txt+= '<dd> '+memo[ind].sub2+'</dd>';
        txt+= '<dt>보관방법 </dt>';
        txt+= '<dd> '+memo[ind].sub3+'</dd>';
        txt+= '<dt>포장단위</dt>';
        txt+= '<dd> '+memo[ind].sub4+'</dd>';
        txt+= '</dl>';
        
        $('.pro_list .popup .info').html(txt);

    });

    $('.close_btn,.pop .modal_box').click(function(e){
        e.preventDefault();
        $('.pro_list .modal_box').hide();
        $('.pro_list .popup').hide();
    });

    
  });