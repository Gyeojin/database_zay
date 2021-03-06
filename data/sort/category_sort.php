<?php

  $tabIdx = $_GET['key'];
  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";

  if($tabIdx == "all" || $tabIdx == "new"){
    $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_idx DESC";
  } else if($tabIdx == "price"){
    $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_pri ASC"; //가격 낮은 순으로
  } else if($tabIdx == "like"){
    $sql1 = "SELECT * FROM zay_pro ORDER BY ZAY_pro_like DESC";
  } else {
    $sql1 = "SELECT * FROM zay_pro WHERE Zay_pro_cate = '{$tabIdx}' ORDER BY ZAY_pro_idx DESC";
  }

 
  $pro_result = mysqli_query($dbConn, $sql1);

  while($pro_row = mysqli_fetch_array($pro_result)){
    $pro_row_idx = $pro_row['ZAY_pro_idx'];
    $pro_row_img = $pro_row['ZAY_pro_img_01'];
    $pro_row_tit = $pro_row['ZAY_pro_name'];
    $pro_row_desc = $pro_row['ZAY_pro_desc'];
    $pro_row_price = $pro_row['ZAY_pro_pri'];

    //like, unlike 기능 구현(반복 기능 추가)
    $like_unlike_type = -1;
    $status_query = "SELECT COUNT(*) AS cntStatus, ZAY_like_unlike_type FROM zay_like_unlike WHERE ZAY_like_unlike_userid='{$useridx}' AND ZAY_like_unlike_postid='{$pro_row_idx}'";

    $status_result = mysqli_query($dbConn, $status_query);
    $status_row = mysqli_fetch_array($status_result);
    $count_status = $status_row['cntStatus'];

    //echo $count_status;----------------------------------------- //

    if($count_status > 0) {
      $like_unlike_type = $status_row['ZAY_like_unlike_type'];
    }
    $like_query = "SELECT COUNT(*) cntLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid='{$pro_row_idx}'";
    $like_result=mysqli_query($dbConn,$like_query);
    $like_row=mysqli_fetch_array($like_result);
    $total_likes=$like_row['cntLikes'];

    //echo $total_likes;

    $unlike_query = "SELECT COUNT(*) cntUnLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid='{$pro_row_idx}'";
    $unlike_result=mysqli_query($dbConn,$unlike_query);
    $unlike_row=mysqli_fetch_array($unlike_result);
    $total_unlikes=$unlike_row['cntUnLikes'];
    
?>
<!-- Featured Loop Item -->
<div class="featured_item">
  <div class="item_frame">
    <a href="/zay/pages/details/pro_detail_form.php?pro_idx=<?=$pro_row_idx?>">
      <div class="featured_img">
        <img src="/zay/data/product_img/<?=$pro_row_img?>" alt="">
      </div>
    </a>
    <div class="like_unlike">
      <div class="like_icons">

        <?php if(!$userid){ ?>

        <span onclick="plzLogin()">Like | <b><?=$total_likes?></b></span>
        <span onclick="plzLogin()">Unlike | <b><?=$total_unlikes?></b></span>

        <?php } else { ?>

        <span id="like_<?=$pro_row_idx?>" class="like"
          style="<?php if($like_unlike_type == 1){ echo "background:#59ab6e; color:#fff;";}?>">Like |
          <b id="likes_<?=$pro_row_idx?>"><?=$total_likes?></b>
        </span>
        <span id="unlike_<?=$pro_row_idx?>" class="unlike"
          style="<?php if($like_unlike_type == 0){ echo "background: #d84646; color: #fff;";}?>">Unlike |
          <b id="unlikes_<?=$pro_row_idx?>"><?=$total_unlikes?></b>
        </span>

        <?php } ?>

      </div>
      <p><i class="fa fa-krw"><?=$pro_row_price?></i></p>
    </div>
    <div class="featured_txt">
      <h3><?=$pro_row_tit?></h3>
      <p class="desc"><?=$pro_row_desc?></p>
    </div>
    <div class="reviews">
      <?php
        include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
        $sql_rev = "SELECT * FROM zay_review WHERE ZAY_pro_rev_con_idx='{$pro_row_idx}'";
        $rev_result = mysqli_query($dbConn, $sql_rev);
        //한 페이지에 답글이 여러개 있을 수 있으므로 반복문 설정
        $rev_total = mysqli_num_rows($rev_result); //num_rows : 갯수만 세는 함수
      ?>
      <em>Comments(<?=$rev_total?>)</em>
    </div>
  </div>
</div>
<!-- End of Featured Loop Item -->
<?php } ?>