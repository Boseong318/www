<?
   function latest_article($table, $loop, $char_limit) //테이블 명, (출력할) 리스트 개수, 제목 글 제한 수(byte)
   {
	   //latest_article("greet", 5, 30);
	   //latest_article("concert", 5, 30); concer 가져오는데 5줄씩 30글자!
		include "dbconn.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		echo "<ul class='news_list'>";


		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num];
			$len_subject = mb_strlen($row[subject], 'utf-8');	//한글도 1byte로 처리, 제목의 총 글자 수 40
			$subject = $row[subject];
			$len_content = mb_strlen($row[content], 'utf-8');
			$content = $row[content];

			if ($len_subject > $char_limit)	//제한 글자수 (30)보다 크면
			{
				// $subject = str_replace( "&#039;", "'", $subject);               
               	$subject = mb_substr($subject, 0, $char_limit, 'utf-8');
				$subject = $subject."...";
			}

			if ($len_content > 30)	//제한 글자수 (30)보다 크면
			{
				// $subject = str_replace( "&#039;", "'", $subject);               
               	$content = mb_substr($content, 0, 30, 'utf-8');
				$content = $content."...";
			}

			$regist_day = substr($row[regist_day], 0, 10); //2022-02-21

            
            if($table=='concert'){
               
                if($row[file_copied_0]){		//첨부된 이미지가 있으면..
                 $concertimg='./concert/data/'.$row[file_copied_0];	//'./concert/data/2022_02_22_10_43_20_0.jpg'
                }else{
                 $concertimg= './concert/data/default.jpg';
                }
            }
            
            
            
        if($table=='concert'){
             
             echo "      
				<li>
					<a href='./$table/view.php?table=$table&num=$num'>
						<div class='newscon'>
							<img src='$concertimg' alt='$subject'>
							<div class='news_txt'>
								<dl>
									<dt>$subject</dt>
									<dd>$content</dd>
									<dd class='date'>$regist_day</dd>
								</dl>
							</div>
						</div>
					</a>
				</li>
			";  
               
           }
               
               
		}

		echo "</ul>";


		mysql_close();
   }
?>