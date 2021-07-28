<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay Shop || shop</title>

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

  <section class="shop">
    <div class="center">
      <div class="tit_box">
        <h2>Our Products</h2>
        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt<br>mollit anim id est laborum.</p>
      </div>

      <div class="shop_btns">
        <div class="tabs">
          <a href="?key=all" class="active">All</a>
          <a href="?key=Watches">Watches</a>
          <a href="?key=Shoes">Shoes</a>
          <a href="?key=Accessories">Accessories</a>
        </div>
        <div class="filters">
          <div class="filter_tabs">
            <select onchange="location.href=this.value">
            <option selected disabled value="">검색조건</option>
              <option value="?key=new">신상품</option>
              <option value="?key=like">좋아요</option>
              <option value="?key=price">가격순</option>
            </select>
          </div>
          <div class="search" style="border:1px solid;">
            <input type="text">
            <i class="fa fa-search"></i>
          </div>
        </div>
      </div>
      <!-- End of Show btns -->

      <div class="featured_box">

      <?php
        include $_SERVER['DOCUMENT_ROOT']."/zay/data/sort/category_sort.php";
      ?>
        
      </div>
      <div class="load_more">
        <button type="button">View More</button>
      </div>
    </div>
  </section>

  <?php
    include $_SERVER["DOCUMENT_ROOT"]."/zay/include/footer.php";
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>
  <script src="/zay/js/jq.like.unlike.js"></script>

  <!--상품 리스트 탭 UI active 기능-->
  <script>
    const pathName = window.location.href; //현재 주소 찍히는 코드.
    //console.log(pathName);
    const btns = document.querySelectorAll('.shop_btns .tabs a');
    //console.log(btns);
    const btnsArr = ['all','Watches','Shoes','Accessories'];
    for(let i = 0; i < btnsArr.length; i++){
      btns[i].classList.remove('active');
      if(pathName.includes(btnsArr[i])){
        btns[i].classList.add('active');
      }
    }

    function plzLogin(){
      alert('로그인 후 이용해 주세요.');
      return false;
    }

  </script>
</body>
