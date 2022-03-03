<? 
	session_start(); 
     @extract($_POST);
     @extract($_GET);
     @extract($_SESSION);
   //세션변수 4
    //num=7&page=1

	include "../lib/dbconn.php";

	$sql = "select * from greet where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);       	
	$item_subject     = $row[subject];
	$item_content     = $row[content];
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항</title>

	<link href="../common/css/common.css" rel="stylesheet">
	<link href="./css/greet.css" rel="stylesheet">
</head>
<body>
<? include "../common/sub_header.html" ?>
	<div class="visual">
            <img src="./images/visual2.jpg" alt="비주얼이미지">
            <h3>기업홍보</h3>
    </div>
	<div class="sub_menu">
		<ul>
			<li><a href="./sub5_1.html">뉴스</a></li>
			<li><a href="./sub5_2.html">제품소식</a></li>
			<li class="current"><a href="./greet/list.php">공지사항</a></li>
		</ul>
    </div>
	<article id="content">
		<div class="title_area">
			<div class="line_map">home &gt; 기업홍보 &gt; <strong>공지사항</strong></div>
			<h2>공지사항</h2>
			<p>notice</p>
		</div>

		<div class="content_area">
		<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>"> 
			<div id="write_form">
				<div class="write_line"></div>
				<div id="write_row1">
					<div class="col1"> 닉네임 </div>
					<div class="col2"><?=$usernick?></div>
				</div>
				<div class="write_line"></div>
				<div id="write_row2"><div class="col1"> 제목   </div>
									<div class="col2">
					<input type="text" name="subject" value="<?=$item_subject?>" ></div>
				</div>
				<div class="write_line"></div>
				<div id="write_row3"><div class="col1"> 내용   </div>
									<div class="col2">
					<textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
				</div>
				<div class="write_line"></div>
			</div>

			<div id="write_button">
				<input type="submit" value="완료">&nbsp;
				<a href="list.php?page=<?=$page?>">목록</a>
			</div>
		</form>
		</div>
	</article>

	<? include "../common/sub_footer.html" ?>
</body>
</html>






<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="utf-8">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/greet.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>
<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 

  <div id="content">
	<div id="col1">
		<div id="left_menu">
<?
			include "../lib/left_menu.php";
?>
		</div>
	</div> <!-- end of col1 -->

	<div id="col2">        
		<div id="title">
			<img src="../img/title_greet.gif">
		</div>

		<div class="clear"></div>

		<div id="write_form_title">
			<img src="../img/write_form_title.gif">
		</div>

		<div class="clear"></div>
		

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>