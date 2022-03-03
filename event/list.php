<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);

	$table = "event";		//테이블 명 처리
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>제품소식</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="./css/concert.css" rel="stylesheet">
</head>
<?
	include "../lib/dbconn.php";

    
   if (!$scale)
    $scale=10;			// 한 화면에 표시되는 글 수

    
    if ($mode=="search")
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

		$sql = "select * from $table where $find like '%$search%' order by num desc";
	}
	else
	{
		$sql = "select * from $table order by num desc";
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
<body>
<? include "../common/sub_header.html" ?>
	<div class="visual">
            <img src="./images/visual2.jpg" alt="비주얼이미지">
            <h3>기업홍보</h3>
    </div>
	<div class="sub_menu">
		<ul>
			<li><a href="../concert/list.php">뉴스</a></li>
			<li class="current"><a href="../event/list.php">제품소식</a></li>
			<li><a href="../greet/list.php">공지사항</a></li>
		</ul>
    </div>
	<article id="content">
		<div class="title_area">
			<div class="line_map">home &gt; 기업홍보 &gt; <strong>제품소식</strong></div>
			<h2>제품소식</h2>
			<p>product news</p>
		</div>

		<div class="content_area">
			<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
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

			<div id="list_content">
				<?		
				for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)                    
				{
					mysql_data_seek($result, $i);       
					// 가져올 레코드로 위치(포인터) 이동  
					$row = mysql_fetch_array($result);       
					// 하나의 레코드 가져오기
					
					$item_num     = $row[num];
					$item_id      = $row[id];
					$item_name    = $row[name];
					$item_nick    = $row[nick];
					$item_hit     = $row[hit];
					$item_date    = $row[regist_day];
					$item_date = substr($item_date, 0, 10);  
					$item_subject = str_replace(" ", "&nbsp;", $row[subject]);
						
					if($row[file_copied_0]){ 		//첨부된 첫번째 이미지가 있냐? 검색된 레코드에 업로드된 파일이 있다면
						$item_img = './data/'.$row[file_copied_0];  	//./data/2022_02_22_10_43_06_0.jpg
					}else{						//첨부된 첫번째 이미지가 없다면
						$item_img = './data/default.jpg'  ;
					}
					
				?>
				<div id="list_item">
					<div id="list_item2">
						<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
						<img src="<?=$item_img?>" alt="" width="50" height="50">
						<p><?= $item_subject ?></p>
						</a>
					</div>
					<div class="list_item_wrap">
						<div id="list_item3"><i class="fas fa-user"></i><?= $item_nick ?></div>
						<div id="list_item4"><?= $item_date ?></div>
						<div id="list_item5"><i class="fas fa-eye"></i>조회수 :  <?= $item_hit ?></div>
					</div>
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
									
								if($mode=="search"){
									echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search'> $i </a>"; 
								}else{    
									
									echo "<a href='list.php?page=$i&scale=$scale'> $i </a>";
								}
									
								
								}      
						}
						?>			
						&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
					</div>
					<div id="button">
						<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>&nbsp;
						<? 
							if($userid)
							{
						?>
						<a href="write_form.php?table=<?=$table?>">글쓰기</a>
						<?
							}
						?>
					</div>
				</div> <!-- end of page_button -->	

			</div> <!-- end of list content -->

			<div class="clear"></div>

		</div><!-- end of content_area-->
	</article>

<? include "../common/sub_footer.html" ?>
</body>
</html>