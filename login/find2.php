<?
   session_start();
?>
    <meta charset="UTF-8">
<?
  @extract($_GET); 
  @extract($_POST); 
  @extract($_SESSION); 

  /*
  $id='green2'
  $name='홍길동'
  $hp1='010'
  $hp2='1111'
  $hp3='2222'
  */


   if(!$id) {  /* !='없으면'*/
     echo("
           <script>
             window.alert('아이디를 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!$name) {  /* !='없으면'*/
     echo("
           <script>
             window.alert('이름을 입력하세요');
             history.go(-1);
           </script>
         ");
         exit;
   }

   if(!($hp2 && $hp3)) {
     echo("
           <script>
             window.alert('연락처를 입력하세요');
             history.go(-1);
           </script>
         ");
         
   }


   include "../lib/dbconn.php";   //db connect

   $sql = "select * from member where id='$id'";  //$id : 프라이머리 키로 검색
   $result = mysql_query($sql, $connect); //있으면 1, 없으면 null

   $num_match = mysql_num_rows($result);  //1 null

   if(!$num_match) //검색 레코드가 없으면
   {
     echo(" 
           <script>
             window.alert('등록되지 않은 아이디 입니다');
             history.go(-1);
           </script>
         ");
         exit;
  }
  else     //검색 레코드가 있으면
  {
         $hp = $hp1."-".$hp2."-".$hp3;
        
		     $row = mysql_fetch_array($result); 
          //$row[id] ,.... $row[level]
         $sql ="select * from member where id='$id' and name='$name' and hp='$hp'";
         $result = mysql_query($sql, $connect);
         $num_match = mysql_num_rows($result); //있으면 1, 없으면 null
     
  /* db에 이미 암호화 된 pass를 다시 암호화해서 기존의 pass로 알아낼수 없다,
  암호화된 pass가 입력된 pass의 암호화와 일치하는가를 확인해야함*/

        if(!$num_match) //null이면=입력된 pass가 암호화된 패스와 맞지 않다면
        {
           echo("
              <script>
                window.alert('등록된 정보가 없습니다');
                history.go(-1);
              </script>
           ");

           exit;
        }
        else  //1이면=아이디와 이름 전화번호가 모두 일치 한다면
        {
          //비밀번호 찾기인데 비밀전호 안 담아 놓은 이유는? 
          //-> 비밀번호는 암호화 저장 돼 있기 때문에! 갖고 와도 아~~무 의미가 없어요
          //암호화된 비번을 푸는 함수는 없어요, 그래서 다들 임시 비번을 알려준다
           $userid = $row[id];
           $username = $row[name];
           $userhp = $row[hp];
           $date = $row[regist_day];

        //PHP 랜덤 비밀번호/패스워드 생성
        function generateRandomPassword($length=8, $strength=0) {
                                        //$length : 8자리
            $vowels = 'aeuy!@#$';   //aeuy : 마음대로 조합할 문자
            $consonants = 'bdghjmnpqrstvz';  //랜덤으로 뽑아낼 기본 문자 ,마음대로 조합할 문자
            if ($strength & 1) {    //$strength & 1 (동일) $strength == 1 
                $consonants .= 'BDGHJLMNPQRSTVWXZ';  //추가할 문자 ,마음대로 조합할 문자
            }

            $password = '';
            $alt = time() % 2;    //time() % 2 : 시간 나누기 2, => 나오는 값: 0,1
            //
            for ($i = 0; $i < $length; $i++) {  //$i < $length(8) : 0~7까지 8회 반복
                if ($alt == 1) {
                    $password .= $consonants[(rand() % strlen($consonants))];
                    //rand 에서 빠지는 0~7 , $consonants 중에서 해당 인덱스 번호 무작위로 하나 뺴라
                    $alt = 0;
                } else {
                    $password .= $vowels[(rand() % strlen($vowels))];
                    $alt = 1;
                }
            }
            
            return $password;   //임시 패스워드  예)'neWy'
        }

        $ranpass = generateRandomPassword(8,1);  //랜덤으로 뽑은 8자의 문자
            
        echo " <strong>[ 가입정보 ]</strong><br>
           임시비밀번호는 <strong> $ranpass </strong> 입니다<br>
           아이디 : $userid <br>
           이름 : $username <br>
           연락처: $userhp <br>
           가입일자 : $date <br>
           <strong>* 로그인 후 비밀번호를 변경해주세요.</strong>";
            
        //바뀐 비밀번호 db에 저장해주기
        $sql = "update member set pass=password('$ranpass') where id='$id' and name='$name' and hp='$hp'";
        $result = mysql_query($sql, $connect);
        }
        
        
   }          
?>
