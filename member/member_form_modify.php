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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보수정</title>

    <link href="../common/css/common.css" rel="stylesheet">
    <link href="./css/member_form.css" rel="stylesheet"> 
    <link href="./css/member_form_modify.css" rel="stylesheet"> 

    <script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../commons/js/jquery-migrate-1.4.1.min.js"></script>

    <script>
    $(document).ready(function() {

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
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("../member/check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
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

<?
    //$userid='green'; -> session 변수 아이디
    
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);
    //$row[id]....$row[level]

    $hp = explode("-", $row[hp]);  //000-0000-0000, explode : 합쳐진 함수를 어떤 기준( 예: "-")에 맞춰서 쪼개준다
    $hp1 = $hp[0];
    $hp2 = $hp[1];
    $hp3 = $hp[2];

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>

</head>
<body>
    <div class="wrap">
    <header>
       <h1><a href="../index.html">로고</a></h1>
   </header>
        <article id="content">
        <h2>회원정보 수정</h2>
        <p class="note">*모든 항목은 필수입니다.</p>
            <form  name="member_form" method="post" action="modify.php"> 
                <div id="form_join">
                    <div id="join2">
                        <ul>
                            <li>
                                <label for="pass">비밀번호</label>
                                <input type="password" name="pass" id="pass" placeholder="비밀번호를 입력하세요." required>
                            </li>
                            <li>
                                <label for="pass_confirm">비밀번호 확인</label>
                                <input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호를 입력하세요." required>
                            </li>
                            <li>
                                <label for="name">이름</label>
                                <input type="text" name="name" id="name" value=" <?= $row[name] ?>">
                            </li>
                            <li>
                                <label for="nick">닉네임</label>
                                <input type="text" name="nick" id="nick" value=" <?= $row[nick] ?>">
                                <div id="loadtext2"></div>
                            </li>
                            <li>
                                <label for="hp1">휴대전화</label>
                                <select class="hp" name="hp1" id="hp1"> 
                                    <option value='010'>010</option>
                                    <option value='011'>011</option>
                                    <option value='016'>016</option>
                                    <option value='017'>017</option>
                                    <option value='018'>018</option>
                                    <option value='019'>019</option>
                                </select>
                                - <label class="hidden" for="hp2">전화번호중간4자리</label>
                                <input type="text" class="hp" name="hp2" id="hp2" value="1111" required>
                                - <label class="hidden" for="hp3">전화번호끝4자리</label>
                                <input type="text" class="hp" name="hp3" id="hp3" value="1111" required>    
                            </li>
                            <li>
                                <label for="email1">이메일</label>
                                <input type="text" id="email1" name="email1" value="<?= $email1 ?>"> 
                                @  <select  class="email" name="email2" id="email2"> 
                                    <option value='naver.com'>naver.com</option>
                                    <option value='nate.com'>nate.com</option>
                                    <option value='gamil.com'>gmail.com</option>
                                    <option value='hanmail.net'>hanmail.net</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="btn">
                    <a href="#" onclick="check_input()">저장하기</a>&nbsp;&nbsp;
                    <a href="#" onclick="reset_form()">취소하기</a>
                </div>
            </form>
        </article>
    </div>



</body>
</html>
