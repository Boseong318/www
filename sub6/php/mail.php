
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?
     
  $name_01=$_POST['uname'];
  $mail_02=$_POST['email'];
  $phone_03=$_POST['phone'];
  $msg_04=$_POST['message'];

  
  $to='rnjsqhtjd97@naver.com';        //관리자 메일 주소
  $subject='동아제약에서 관리자에게 보낸 메일';    //문의 사항 제목
  $msg="보낸사람:$name_01\n".
       "보낸사람메일주소:$mail_02\n".
       "보낸사람전화번호:$phone_03\n".
       "내용:$msg_04\n";        //변수 데이터 넣어주기
  
  mail($to,$subject,$msg,'보낸사람메일주소:'.$mail_02);   

    echo "<script>
            alert('성공적으로 메일이 전송되었습니다.');
            //history.go(-1);
            location.href='index.html' ;
         </script>
         "
  

  /*
  echo '이름:'.$name_01.'<br />';
  echo '메일:'.$mail_02.'<br />';
  echo '메일:'.$phone_03.'<br />';
  echo '내용:'.$msg_04.'<br />';
  echo '메일이 성공적으로 전송되었습니다<br />';
  */



?>



