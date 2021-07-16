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

            $detail_img_1 = $detail_row['ZAY_pro_img_01'];
            $detail_img_2 = $detail_row['ZAY_pro_img_02'];
            $detail_tit = $detail_row['ZAY_pro_name'];
            $detail_pri = $detail_row['ZAY_pro_pri'];
            $detail_desc = $detail_row['ZAY_pro_desc'];
            $detail_color = $detail_row['ZAY_pro_color'];
            $detail_brand = $detail_row['ZAY_pro_brand'];
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
                    <span>좋아요 | <b>20</b></span>
                    <span>싫어요 | <b>11</b></span>
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
                  <p>Size : 
                    <span>S</span>
                    <span>M</span>
                    <span>L</span>
                    <span>XL</span>
                  </p>
                  <p>Quantity
                    <span>-</span>
                    <b>1</b>
                    <span>+</span>
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
          <span><em>15</em> Comments</span>
        </div>
        <div class="comment_insert">
          <form action="#" method="post" name="comment_form">
            <textarea placeholder="상품평을 입력해 주세요." name="comment_txt"></textarea>
            <button type="button">입력</button>
          </form>
        </div>
        <!-- Loop Comments -->
        <div class="comment_contents">
          <div class="loop_contents">
            <div class="comments_tit">
              <span>koyeo5725 </span> | 
              <span>2021-07-16 14:36:15</span>
            </div>
            <div class="comments_text">
              <span class="txt"><em>상품 좋아요. 배송도 빨랐습니다.</em></span>
              <span class="comment_btns">
                <button type="button">수정</button>
                <button type="button">삭제</button>
              </span>
            </div>
          </div>
        </div>
        <!-- End of Loop Comments -->
        <!-- Loop Comments -->
        <div class="comment_contents">
          <div class="loop_contents">
            <div class="comments_tit">
              <span>koyeo5725 </span> | 
              <span>2021-07-16 14:36:15</span>
            </div>
            <div class="comments_text">
              <span class="txt"><em>Not bad!</em></span>
            </div>
          </div>
        </div>
        <!-- End of Loop Comments -->
      </div>
    </section>

    <?php
      include $_SERVER["DOCUMENT_ROOT"]."/zay/include/footer.php";
    ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>

</body>



