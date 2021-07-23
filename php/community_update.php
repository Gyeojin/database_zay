<?php
  //로그인 판별 로직
  session_start();
  if(isset($_SESSION['userid'])){ //isset 셋팅이 되어있냐 아니냐
    $userid=$_SESSION['userid'];
  } else{
    $userid="";
  }

  if(isset($_SESSION['userprofile'])){
    $userprofile=$_SESSION['userprofile'];
  } else{
    $userprofile="";
  }

  $detail_idx = $_GET['detail_idx'];
  $detail_writer = $_GET['detail_writer'];
  $write_input = $_POST['write_input'];
  $write_con = addslashes($_POST['write_con']);

  //echo $userprofile;

  if(!$userid || $userid != $detail_writer){ //or : ||
    echo "
      <script>
        alert('잘못된 접근입니다.');
        location.href='/zay/index.php';
      </script>
    ";
  } else {
    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "UPDATE zay_comm SET ZAY_comm_tit='{$write_input}', ZAY_comm_con='{$write_con}' WHERE ZAY_comm_idx=$detail_idx";

    mysqli_query($dbConn, $sql);

    echo"
      <script>
        alert('수정이 완료되었습니다.');
        history.go(-1);
      </script>
    ";
  }


?>