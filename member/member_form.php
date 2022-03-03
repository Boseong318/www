<? 
	session_start();
    
      @extract($_POST);
      @extract($_GET);
      @extract($_SESSION);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<title>회원가입</title>
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/member_form.css">
	
	
	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../commons/js/jquery-migrate-1.4.1.min.js"></script>

	
<script>
    $(document).ready(function() {

    //id 중복검사
    $("#id").keyup(function() {    // id입력 상자에 id값 입력시, keyup : 타이핑 할 때마다 db 가서 체크한다
        var id = $('#id').val();    //a, 키보트 떼는 순간, 입력한 그 값을 함수 :val로 빼내기

        $.ajax({
            type: "POST",               //ajax는
            url: "check_id.php",       //check_id.php로 연결하는데
            data: "id="+ id,           //data가 넘어가는 변수 넘기기 가능
            //순식간에 데이터를 훅! 하고 넘겨주죠, 
            //일반링크와의 차이점: 일반 링크 -> 링크가 걸려 ajax(비동기 언어) -> 링크되는게 아니라 그 페이지에 가만히 있는 상태에서 check_id.php로 접근한다 -> 페이지 안 바뀌고 빠르게 계산 가능
            cache: false, 
            success: function(data)     //success 함수는 위의 처리가 완료/성공되면 success 함수가 동작, check_id/php의 echo문이 (data)로 들어옴
            {
                //data => echo "문자열" 이 저장된
                $("#loadtext").html(data);    //그걸 내가 원하는 곳(#loadtext)에 찍는다
            }
        });
    });
            
    //nick 중복검사		 
    $("#nick").keyup(function() {    // id입력 상자에 id값 입력시
        var nick = $('#nick').val();

        $.ajax({
            type: "POST",
            url: "check_nick.php",
            data: "nick="+ nick,  
            cache: false, 
            success: function(data)
            {
                $("#loadtext2").html(data);
            }
        });
    });		 

});
	
</script>

<script>
   
   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.hp2.value || !document.member_form.hp3.value )
      {
          alert("휴대폰 번호를 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit(); 
		   // insert.php 로 변수 전송
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.hp1.value = "010";
      document.member_form.hp2.value = "";
      document.member_form.hp3.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<body>

   <header>
       <h1><a href="../index.html">로고</a></h1>
   </header>
	 
	<article id="content">  
	  
	  <h2>회원가입</h2>
      <p class="note">*모든 항목은 필수입니다.</p>
	  <form  name="member_form" method="post" action="insert.php"> 
		
     <table>
      <caption class="hidden">회원가입</caption>
      <p>
     	<tr>
     		<th scope="col"><label for="id">아이디</label></th>
     		<td>
     			 <input type="text" name="id" id="id" label="id" placeholder="아이디를 입력해주세요" required>
			     <div id="loadtext"></div>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass">비밀번호</label></th>
     		<td>
     			 <input type="password" name="pass" id="pass" label="pass" placeholder="비밀번호를 입력해주세요" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="pass_confirm">비밀번호확인</label></th>
     		<td>
     			<input type="password" name="pass_confirm" id="pass_confirm" label="pass_confirm" placeholder="비밀번호를 확인해주세요" required>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="name">이름</label></th>
     		<td>
     			<input type="text" name="name" id="name" label="name" placeholder="이름을 입력해주세요" required> 
     		</td>
     	</tr>
     	<tr>
     		<th scope="col"><label for="nick">닉네임</label></th>
     		<td>
     			 <input type="text" name="nick" id="nick" label="nick" placeholder="사용할 닉네임을 입력해주세요"  required>
			     <div id="loadtext2"></div>
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">휴대폰</th>
     		<td>
     			<label class="hidden" for="hp1">전화번호앞3자리</label>
     			<select class="hp" name="hp1" id="hp1" label="hp1"> 
                    <option value='010'>010</option>
                    <option value='011'>011</option>
                    <option value='016'>016</option>
                    <option value='017'>017</option>
                    <option value='018'>018</option>
                    <option value='019'>019</option>
                </select>  - 
                <label class="hidden" for="hp2">전화번호중간4자리</label>
                <input type="text" class="hp" name="hp2" id="hp2" label="hp2" required>
                 - <label class="hidden" for="hp3">전화번호끝4자리</label>
                <input type="text" class="hp" name="hp3" id="hp3" label="hp3" required>
     			
     		</td>
     	</tr>
     	<tr>
     		<th scope="col">이메일</th>
     		<td>
     		  <label class="hidden" for="email1">이메일아이디</label>
     			<input type="text" id="email1" label="email1" class="email" name="email1"  required> @ 
     			<label class="hidden" for="email2">이메일주소</label>
                 <select  class="email" name="hp1" id="hp1"> 
                    <option value='naver.com'>naver.com</option>
                    <option value='nate.com'>nate.com</option>
                    <option value='gamil.com'>gamil.com</option>
                    <option value='hanmail.net'>hanmail.net</option>
                </select>
     		</td>
     	</tr>
     	<tr>
     		<td class="btn" colspan="2">
                <a href="#" onclick="check_input()">가입하기</a>&nbsp;&nbsp;
				<a href="#" onclick="reset_form()">수정하기</a>
     		</td>
     	</tr>
     </table>

	 </form>
	  
	</article>
</body>
</html>


