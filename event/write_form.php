<? 
	session_start(); 
    @extract($_POST);
    @extract($_GET);
    @extract($_SESSION);
    //새글쓰기 =>  $table = concert
	//수정글쓰기 =>  $table, $num, $page, $mode 세션변수

	include "../lib/dbconn.php";

	if ($mode=="modify") //수정 글쓰기면
	{
		$sql = "select * from $table where num=$num";
		$result = mysql_query($sql, $connect);

		$row = mysql_fetch_array($result);       
	
		$item_subject     = $row[subject];
		$item_content     = $row[content];

		$item_file_0 = $row[file_name_0];
		$item_file_1 = $row[file_name_1];
		$item_file_2 = $row[file_name_2];

		$copied_file_0 = $row[file_copied_0];
		$copied_file_1 = $row[file_copied_1];
		$copied_file_2 = $row[file_copied_2];
	}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>제품소식</title>
	<link href="../common/css/common.css" rel="stylesheet">
	<link href="./css/concert.css" rel="stylesheet">
	<script>
  function check_input()
   {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");    
          document.board_form.subject.focus();
          return;
      }

      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
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
			<?
				if($mode=="modify")		//수정 글 쓰기
				{

			?>
			<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>&page=<?=$page?>&table=<?=$table?>" enctype="multipart/form-data"> 
				<?
					}
					else	//새 글 쓰기
					{
				?>
		<form  name="board_form" method="post" action="insert.php?table=<?=$table?>" enctype="multipart/form-data"> 
		<!-- enctype="multipart/form-data" : 파일 첨부 될 때 필요한 속성 -->
		<?
			}
		?>
		<div id="write_form">
			<div class="write_line"></div>
			<div id="write_row1"><div class="col1"> 별명 </div><div class="col2"><?=$usernick?></div>
			<?
				if( $userid && ($mode != "modify") )
				{   //새글쓰기 에서만 HTML 쓰기가 보인다
			?>
				<div class="col3"><input type="checkbox" name="html_ok" value="y"> HTML 쓰기</div>
			<?
				}
			?>						
			</div>
			<div class="write_line"></div>
			<div id="write_row2"><div class="col1"> 제목   </div>
			                     <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" ></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row3"><div class="col1"> 내용   </div>
			                     <div class="col2"><textarea rows="15" cols="79" name="content"><?=$item_content?></textarea></div>
			</div>
			<div class="write_line"></div>
			<div id="write_row4">
				<div class="col1"> 이미지파일1   </div>
			    <div class="col2"><input type="file" name="upfile[]"></div>		
					 <!-- name="upfile[]" : 배열로 쓰겠다는 의미 -->
			</div>
			<div class="clear"></div>
			<? 	if ($mode=="modify" && $item_file_0)		//파일 수정일 때, 수정 삭제 추가
				{
			?>
			<div class="delete_ok"><?=$item_file_0?> 파일이 등록되어 있습니다. 
			<input type="checkbox" name="del_file[]" value="0"> 삭제</div>
			<div class="clear"></div>
			<?
				}
			?>
			<div class="write_line"></div>
			<div id="write_row5">
				<div class="col1"> 이미지파일2  </div>
			    <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<? 	if ($mode=="modify" && $item_file_1)
				{
			?>
			<div class="delete_ok"><?=$item_file_1?> 파일이 등록되어 있습니다. 
			<input type="checkbox" name="del_file[]" value="1"> 삭제</div>
			<div class="clear"></div>
			<?
				}
			?>
			<div class="write_line"></div>
			<div class="clear"></div>
			<div id="write_row6"><div class="col1"> 이미지파일3   </div>
			                     <div class="col2"><input type="file" name="upfile[]"></div>
			</div>
			<? 	if ($mode=="modify" && $item_file_2)
				{
			?>
			<div class="delete_ok"><?=$item_file_2?> 파일이 등록되어 있습니다. <input type="checkbox" name="del_file[]" value="2"> 삭제</div>
			<div class="clear"></div>
			<?
				}
			?>
			<div class="write_line"></div>

			<div class="clear"></div>
		</div>

		<div id="write_button">
			<input type="submit" value="완료" onclick="check_input()">&nbsp;
			<a href="list.php?table=<?=$table?>&page=<?=$page?>">목록</a>
		</div>
           
		</form>


		
		</div><!-- end of content_area-->
	</article>

<? include "../common/sub_footer.html" ?>
</body>
</html>