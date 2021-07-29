<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay Shop || Cart List</title>

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
  <?php
    include $_SERVER["DOCUMENT_ROOT"]."/zay/include/header.php";
  ?>

  <section class="pro_search">
    <div class="center">
      <div class="tit_box">
        <h2>Cart List</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>
      <div class="search_lists">

        <?php
        if(isset($_SESSION['cart'])){
          foreach($_SESSION['cart'] as $key => $value){
            $cart_img = $value['cart_img'];
            $cart_name = $value['cart_name'];
            $cart_desc = $value['cart_desc'];
            $cart_pri = $value['cart_pri'];
            $cart_quan = $value['cart_quan'];
        ?>
        <!-- loop search item --> 
        <div class="search_item">
          <span class="search_img">
            <a href="#"><img src="/zay/data/product_img/<?=$cart_img?>" alt=""></a>
          </span>
          <span class="search_txt">
            <h2><?=$cart_name?></h2>
            <p><?=$cart_desc?></p>
          </span>
          <span class="search_pri">
            <h3><i class="fa fa-krw"></i> <?=$cart_pri?></h3>
          </span>
          <span>
            <span class="search_btns">
              <button>REMOVE ITEM</button>
              <button>BUY NOW</button>
            </span>
          </span>
        </div><!--End of Search item-->
        <?php } } ?>
      </div><!--End of Search lists-->
    </div>
   
    
  </section>

  <?php
    include $_SERVER["DOCUMENT_ROOT"]."/zay/include/footer.php";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script> 
</body>