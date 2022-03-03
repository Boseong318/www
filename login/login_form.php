<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>


<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>로그인</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="./css/login.css">
</head>
<body>
	<div class="wrap">
		<div class="container">
			<header>
				<h1>
					<a href="../index.html">동아제약</a>
				</h1>
			</header>
			<article id="content">
				<form  name="member_form" method="post" action="login.php"> 
					<div id="id_pw_input">
						<ul>
							<li>
								<label for="id">아이디</label>
								<i class="fas fa-user"></i>
								<input type="text" name="id" id="id" class="login_input" placeholder="아이디를 입력하세요">
							</li>
							<li>
								<label for="pass">비밀번호</label>
								<i class="fas fa-lock" aria-hidden="true"></i>
								<input type="password" name="pass" id="pass" class="login_input" placeholder="비밀번호를 입력하세요">
							</li>
						</ul>						
					</div>
					<div id="login_button">
						<button class="login_button" type="submit">로그인</button>
					</div>
					<ul class="find_idpw">
                        <li>
							<i class="fas fa-lock"></i>보안접속
						</li>
                        <li>
                            <span><a href="./id_find.php">아이디 찾기</a></span>
                            <span><a href="./pw_find.php">비밀번호 찾기</a></span>
                        </li>
                    </ul>
                    <div id="join_button">
                        <span>아직 회원이 아니신가요?</span>
                        <a class="joinUs" href="../member/member_check.html">회원가입</a>
					</div>
				</form>
			</article>
		</div>
	</div>
</body>
</html>