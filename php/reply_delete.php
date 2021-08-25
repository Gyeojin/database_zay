<?php
  //로그인 판별 로직
  session_start();
  if(isset($_SESSION['userid'])){ //isset 셋팅이 되어있냐 아니냐
    $userid=$_SESSION['userid'];
  } else{
    $userid="";
  }

  //echo $userprofile;  

  $del_key = $_GET['del_key'];
  $reply_id = $_GET['reply_id'];

  if(!$userid || $userid != $reply_id){ //or : ||
    echo "
      <script>
        alert('잘못된 접근입니다.');
        location.href='/zay/index.php';
      </script>
    ";
  } else {
    
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "DELETE FROM zay_reply WHERE ZAY_reply_idx=$del_key"; //ZAY_comm_reply_idx ->답글이 달린 해당 상품 idx ★헷갈리지말기

    mysqli_query($dbConn, $sql);

    echo "
      <script>
        alert('삭제가 완료되었습니다.');
        history.go(-1);
      </script>
    ";
  }


?>