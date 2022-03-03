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
	<title>공지사항</title>
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="./css/greet.css" rel="stylesheet">


	<?
	include "../lib/dbconn.php";

	
  if (!$scale)		
    $scale=10;			// 한 화면에 표시되는 글 수

    if ($mode=="search")	//검색 버튼 통한 리스트 출력
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}

		$sql = "select * from greet where $find like '%$search%' order by num desc";
	}
	else		//일반 리스트 출력(페이지 번호)
	{
		$sql = "select * from greet order by num desc";
	}

	$result = mysql_query($sql, $connect);

	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      

	$number = $total_record - $start;
?>

</head>
<body>
<? include "../common/sub_header.html" ?>
	<div class="visual">
            <img src="./images/visual2.jpg" alt="비주얼이미지">
            <h3>기업홍보</h3>
    </div>
	<div class="sub_menu">
		<ul>
			<li><a href="../concert/list.php">뉴스</a></li>
			<li><a href="../event/list.php">제품소식</a></li>
			<li class="current"><a href="../greet/list.php">공지사항</a></li>
		</ul>
    </div>
	<article id="content">
		<div class="title_area">
			<div class="line_map">home &gt; 기업홍보 &gt; <strong>공지사항</strong></div>
			<h2>공지사항</h2>
			<p>notice</p>
		</div>

		<div class="content_area">
			<form  name="board_form" method="post" action="list.php?mode=search"> 
				<div id="list_search">
					<div id="list_search1">TOTAL : <?= $total_record ?> </div>
					<div class="search_group">
						<div id="list_search3">
							<select name="find">
								<option value='subject'>제목</option>
								<option value='content'>내용</option>
								<option value='nick'>별명</option>
								<option value='name'>이름</option>
							</select></div>
						<div id="list_search4"><input type="text" name="search"></div>
						<div id="list_search5"><input type="submit" value="검색"></div>
					</div>
				</div>
			</form>
			
			<select class="scale" name="scale" onchange="location.href='list.php?scale='+this.value">
				<option value=''>보기</option>
				<option value='5'>5</option>
				<option value='10'>10</option>
				<option value='15'>15</option>
				<option value='20'>20</option>
			</select>
			
			

			<div class="clear"></div>

			<div id="list_top_title">
				<ul>
					<li id="list_title1">번호</li>
					<li id="list_title2">제목</li>
					<li id="list_title3">글쓴이</li>
					<li id="list_title4">등록일</li>
					<li id="list_title5">조회</li>
				</ul>			
			</div>

			<div id="list_content">
				<?		
				for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
				{
					mysql_data_seek($result, $i);       
					// 가져올 레코드로 위치(포인터) 이동  
					$row = mysql_fetch_array($result);       
					// 하나의 레코드 가져오기
					
					$item_num     = $row[num];	//실제 num 필드에 있는 게시번호를 가져온다
					$item_id      = $row[id];
					$item_name    = $row[name];
					$item_nick    = $row[nick];
					$item_hit     = $row[hit];

					$item_date    = $row[regist_day];
					$item_date = substr($item_date, 0, 10);  	//2022-02-21(년-월-일)까지만 찍는다

					$item_subject = str_replace(" ", "&nbsp;", $row[subject]);	//str_replace : 문자 교체, 이 안에 띄워쓰기가 있으면 -> &nbsp; 태그로 바꿔서 찍어~

				?>

				<div id="list_item">
					<div id="list_item1"><?= $number ?></div>
					<div id="list_item2"><a href="view.php?num=<?=$item_num?>&page=<?=$page?>"><?= $item_subject ?></a></div>
					<div id="list_item3"><?= $item_nick ?></div>
					<div id="list_item4"><?= $item_date ?></div>
					<div id="list_item5"><?= $item_hit ?></div>
				</div>

				<?
					$number--;
				}
				?>

				<div id="page_button">
					<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
						<?
						// 게시판 목록 하단에 페이지 링크 번호 출력
						for ($i=1; $i<=$total_page; $i++)
						{
							if ($page == $i)     // 현재 페이지 번호 링크 안함
							{
								echo "<b> $i </b>";
							}
							else
							{ 
							if($mode=="search"){		//mode가 search 일 때(검색됐을 때)
								echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
													//page=$i : 페이지  scale=$scale : 보기 개수, find=$find : 검색된 그 값
								}else{    				//검색이 아닐 때
								
								echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
							}
						}      
						}
						?>			
						&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
					</div>
					<div id="button">
						<a href="list.php?page=<?=$page?>">목록</a>&nbsp;
							<? 
								if($userid)		//로그인이 되었으면 
								{
							?>
						<a href="write_form.php">글쓰기</a>
							<?
								}
							?>
					</div>
				</div> <!-- end of page_button -->
			
        	</div> <!-- end of list_content-->

		</div><!-- end of list content-->
	</article>

<? include "../common/sub_footer.html" ?>
</body>
</html>
