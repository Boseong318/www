<?
    
    $connect=mysql_connect( "localhost", "www", "1234") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("www_db",$connect);
    

    /* 
    $connect=mysql_connect( "localhost", "bsbo318", "donga2021!") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("bsbo318",$connect);
    */
?>
