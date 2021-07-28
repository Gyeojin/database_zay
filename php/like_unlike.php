<?php
  session_start();
  if(isset($_SESSION['useridx'])){
    $useridx=$_SESSION['useridx'];
  } else{
    $useridx="";
  }

  $post_id = $_POST['postId'];
  $type = $_POST['type'];

  // echo $useridx.'<br>';
  // echo $post_id.'<br>';
  // echo $type.'<br>';

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  //기존에 있던 좋아요, 싫어요 수를 읽어서 초기화
  $sql = "SELECT COUNT(*) AS cntpost FROM zay_like_unlike WHERE ZAY_like_unlike_postid='{$post_id}' AND ZAY_like_unlike_userid='{$useridx}'";

  $result = mysqli_query($dbConn, $sql);
  $fetch_data = mysqli_fetch_array($result);
  $count = $fetch_data['cntpost'];

  //echo $count;

  if($count == 0){ //테이블에 나의 아이디로 해당 상품에 like/unlike 누른 데이터가 없다면 '데이터 삽입(INSERT)'
    $insert_query = "INSERT INTO zay_like_unlike(ZAY_like_unlike_userid,ZAY_like_unlike_postid,ZAY_like_unlike_type) VALUES ('{$useridx}','{$post_id}','{$type}')";
    mysqli_query($dbConn, $insert_query);
  } else { //누른 데이터가 있다면 데이터 업데이트'UPDATE'
    $update_query = "UPDATE zay_like_unlike SET ZAY_like_unlike_type=$type WHERE ZAY_like_unlike_userid=$useridx AND ZAY_like_unlike_postid=$post_id";
    mysqli_query($dbConn, $update_query);
  }

  $sql1 = "SELECT COUNT(*) AS totalLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid=$post_id"; //like 총 개수
  $result1 = mysqli_query($dbConn, $sql1);
  $fetch_likes = mysqli_fetch_array($result1);
  $total_likes = $fetch_likes['totalLikes'];

  $total_sql = "UPDATE zay_pro SET ZAY_pro_like=$total_likes WHERE ZAY_pro_idx=$post_id";
  mysqli_query($dbConn, $total_sql);

  $sql2 = "SELECT COUNT(*) AS totalUnlikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid=$post_id"; //unlike 총 개수
  $result2 = mysqli_query($dbConn, $sql2);
  $fetch_unlikes = mysqli_fetch_array($result2);
  $total_unlikes = $fetch_unlikes['totalUnlikes'];

  //echo $total_likes, $total_unlikes;

  $total_arr = array("likes" => $total_likes, "unlikes" => $total_unlikes);

  echo json_encode($total_arr);

?>