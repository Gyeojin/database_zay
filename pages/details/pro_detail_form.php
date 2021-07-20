<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay Shop || Detail</title>

  <!-- Favicon Link -->
  <link rel="shortcut icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/zay/img/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="/zay/img/favicon.ico">

  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Reset CSS Link -->
  <link rel="stylesheet" href="/zay/css/reset.css">

  <!-- Main Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/style.css">

  <!-- Media Style CSS Link -->
  <link rel="stylesheet" href="/zay/css/media.css">

</head>

<body>

  <div class="wrap">
    <?php
      include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php";
    ?>

    <section class="pro_insert">
      <div class="center">
        <div class="detail_contents">

          <?php
            $pro_idx = $_GET['pro_idx'];
            include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
            $sql = "SELECT * FROM ZAY_pro WHERE ZAY_pro_idx='{$pro_idx}'";

            $detail_result = mysqli_query($dbConn, $sql);
            $detail_row = mysqli_fetch_array($detail_result);

            $detail_idx = $detail_row['ZAY_pro_idx'];
            $detail_img_1 = $detail_row['ZAY_pro_img_01'];
            $detail_img_2 = $detail_row['ZAY_pro_img_02'];
            $detail_tit = $detail_row['ZAY_pro_name'];
            $detail_pri = $detail_row['ZAY_pro_pri'];
            $detail_desc = $detail_row['ZAY_pro_desc'];
            $detail_color = $detail_row['ZAY_pro_color'];
            $detail_brand = $detail_row['ZAY_pro_brand'];
            $like_unlike_type=-1;

            //like unlike 기능 구현 시작
            $status_query = "SELECT COUNT(*) AS cntStatus, ZAY_like_unlike_type FROM zay_like_unlike WHERE 	ZAY_like_unlike_userid='{$useridx}' AND ZAY_like_unlike_postid='{$detail_idx}'";

            $status_result = mysqli_query($dbConn, $status_query);
            $status_row = mysqli_fetch_array($status_result);
            $count_status = $status_row['cntStatus'];

            //$type = $status_row['ZAY_like_unlike_type'];

            //echo $type;

            if($count_status > 0) {
              $like_unlike_type = $status_row['ZAY_like_unlike_type'];
            }
            $like_query = "SELECT COUNT(*) cntLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=1 AND ZAY_like_unlike_postid='{$detail_idx}'";
            $like_result=mysqli_query($dbConn,$like_query);
            $like_row=mysqli_fetch_array($like_result);
            $total_likes=$like_row['cntLikes'];

            //echo $total_likes;

            $unlike_query = "SELECT COUNT(*) cntUnLikes FROM zay_like_unlike WHERE ZAY_like_unlike_type=0 AND ZAY_like_unlike_postid='{$detail_idx}'";
            $unlike_result=mysqli_query($dbConn,$unlike_query);
            $unlike_row=mysqli_fetch_array($unlike_result);
            $total_unlikes=$unlike_row['cntUnLikes'];

            //echo $total_unlikes;
          ?>

          <div class="detail_img">
            <img src="/zay/data/product_img/<?=$detail_img_1?>" alt="">
            <img src="/zay/data/product_img/<?=$detail_img_2?>" alt="">
            <div class="detail_tab_btns">
              <span><img src="/zay/data/product_img/<?=$detail_img_1?>" alt=""></span>
              <span><img src="/zay/data/product_img/<?=$detail_img_2?>" alt=""></span>
            </div>
          </div>
          <div class="detail_txt">
            <div class="detail_wrap">
              <div class="detail_top">
                <h2><?=$detail_tit?></h2>
                <p><span><i class="fa fa-krw"></i><?=$detail_pri?></span></p>
                <!-- detail_like -->
                <div class="detail_like">
                  <div class="like_unlike">
                    <span id="like_<?=$detail_idx?>" class="like" style="<?php if($like_unlike_type == 1){ echo "background:#59ab6e; color:#fff;";}?>">Like | 
                      <b id="likes_<?=$detail_idx?>"><?=$total_likes?></b>
                    </span>
                    <span id="unlike_<?=$detail_idx?>" class="unlike" style="<?php if($like_unlike_type == 0){ echo "background: #d84646; color: #fff;";}?>">Unlike | 
                      <b id="unlikes_<?=$detail_idx?>"><?=$total_unlikes?></b>
                    </span>
                  </div>
                  <p class="gray">Brand : <?=$detail_brand?></p>
                  <div class="detail_desc">
                    <h3>상품설명</h3>
                    <p><?=$detail_desc?></p>
                  </div>
                  <p class="gray">Available Color : <?=$detail_color?></p>
                </div>
                <!-- end of detail_like -->
              </div>
              <div class="size_quan">
                <div class="size">
                  <p class="size_choice">Size : 
                    <span>S</span>
                    <span>M</span>
                    <span>L</span>
                    <span>XL</span>
                  </p>
                  <p>Quantity
                    <span class="minus">-</span>
                    <b>1</b>
                    <span class="plus">+</span>
                  </p>
                </div>
                <div class="detail_btns">
                  <button type="button">BUY NOW</button>
                  <button type="button">ADD TO CART</button>
                </div>
              </div>
              <!-- end of size quantity -->
            </div>
          </div>
        </div>
        <!-- End of detail-contents -->
      </div>
    </section>

    <section class="comments">
      <div class="center">
        <div class="comments_tit">
          <span>REVIEW </span> | 
          <?php
            include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
            $sql_rev = "SELECT * FROM zay_review WHERE ZAY_pro_rev_con_idx='{$pro_idx}' ORDER BY ZAY_pro_rev_idx DESC";//zay_review 테이블에서 
            $rev_result = mysqli_query($dbConn, $sql_rev);
            //한 페이지에 답글이 여러개 있을 수 있으므로 반복문 설정
            $rev_total = mysqli_num_rows($rev_result); //num_rows : 갯수만 세는 함수
          ?>
          <span><em><?=$rev_total?></em> Comments</span>
        </div>
        <div class="comment_insert">
          <form action="/zay/php/comment_insert.php?pro_idx=<?=$pro_idx?>&pro_writer=<?=$userid?>" method="post" name="comment_form">
            <textarea placeholder="상품평을 입력해 주세요." name="comment_txt"></textarea>
            <?php
              if(!$userid){
            ?>
            <button type="button" onclick="plzLogin()">입력</button>
            <?php } else { ?>
            <button type="button" onclick="insertTxt()">입력</button>
            <?php } ?> <!--로그인여부 판별하여 코멘트 다는 로직 -->
          </form>
        </div>
        <!-- Loop Comments -->
        <div class="comment_contents">
        <?php
          while($rev_row = mysqli_fetch_array($rev_result)){
            $rev_idx = $rev_row['ZAY_pro_rev_idx'];
            $rev_writer = $rev_row['ZAY_pro_rev_id'];
            $rev_reg = $rev_row['ZAY_pro_rev_reg'];
            $rev_txt = $rev_row['ZAY_pro_rev_txt'];
            $rev_pro_idx = $rev_row['ZAY_pro_rev_con_idx'];
        ?>
          <div class="loop_contents">
            <div class="comments_tit">
              <span><?=$rev_writer?></span> | 
              <span><?=$rev_reg?></span>
            </div>
            <form action="/zay/php/comment_update.php?pro_idx=<?=$rev_idx?>&pro_writer=<?=$rev_writer?>" method="post">
              <div class="comments_text">
                <em class="rev_txt"><?=$rev_txt?></em>
                <textarea class="rev_update_txt" name="rev_update_txt"><?=$rev_txt?></textarea>
                <?php if(!$userid){ ?>
                <input type="hidden">
                <?php } else { if($userid != $rev_writer){ ?>
                <input type="hidden">
                <?php } else { ?>
                <span class="comment_btns">
                  <button type="submit" class="rev_send">보내기</button>
                  <button type="button" class="rev_update">수정</button>
                  <button type="button" class="rev_delete" value="<?=$rev_idx?>">삭제</button>
                  <input type="hidden" value="<?=$rev_writer?>">
                </span>
                <?php
                    }
                  }
                ?>
              </div>
            </form>
          </div>
        <!-- End of Loop Comments -->
        <?php
          }
        ?>
      </div>
    </section>

    <?php
      include $_SERVER["DOCUMENT_ROOT"]."/zay/include/footer.php";
    ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script src="/zay/js/jq.like.unlike.js"></script>

  <script>
    $(function(){
      $(".rev_update").click(function(){
        $(this).toggleClass("on");

        if($(this).hasClass("on")){
          $(this).text('수정취소');
          $(this).prev(".rev_send").show(); //prev : 내가 클릭한 것의 바로 앞의 것을 선택
          $(this).parent(".comment_btns").siblings(".rev_txt").hide();
          $(this).parent(".comment_btns").siblings(".rev_update_txt").show();
        } else {
          $(this).text('수정');
          $(this).prev(".rev_send").hide();
          $(this).parent(".comment_btns").siblings(".rev_txt").show();
          $(this).parent(".comment_btns").siblings(".rev_update_txt").hide();
        }
      });
    });

    $(".rev_delete").click(function(){

      const confirmCheck = confirm('정말 삭제하시겠습니까?');
      //console.log(confirmCheck);

      if(!confirmCheck){
        return false;
      } else {
        const del_val = $(this).val();
        const pro_writer = $(this).next("input").val();
        location.href=`/zay/php/comment_delete.php?del_key=${del_val}&pro_writer=${pro_writer}`;
      }
      
    });

  </script>
  <script>
    function plzLogin(){
      alert('로그인 후 이용해 주세요.');
      return false;
    }

    function insertTxt(){
      if(!document.comment_form.comment_txt.value){
        alert ('상품평을 입력해 주세요.');
        return;
      }
      document.comment_form.submit();
    }
  </script>

</body>



