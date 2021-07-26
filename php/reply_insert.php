<?php

  session_start();
  if(isset($_SESSION['userid'])){ //isset 셋팅이 되어있냐 아니냐
    $userid=$_SESSION['userid'];
  } else{
    $userid="";
  }

  $reply_idx = $_GET['detail_idx'];
  $reply_txt = addslashes($_POST['reply_txt']);
  $reply_reg = date("Y-m-d H:i:s");

  //echo $userid." ".$reply_idx." ".$reply_txt." ".$reply_reg;

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql = "INSERT INTO zay_reply(ZAY_reply_id,ZAY_comm_reply_idx,ZAY_reply_con,ZAY_reply_reg) VALUES ('{$userid}','{$reply_idx}','{$reply_txt}','{$reply_reg}')";

  mysqli_query($dbConn, $sql);

  header("Location:/zay/pages/menu_page/community_details.php?detail_idx=$reply_idx"); //submit 후 원래 입력했던 창으로 자동 넘기는 코드

?>