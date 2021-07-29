<?php

  // $a = $_POST['cart_img'];
  // $b = $_POST['cart_name'];
  // $c = $_POST['cart_desc'];
  // $d = $_POST['cart_price'];

  // echo $a." ".$b." ".$c." ".$d;
  session_start();
  //session_destroy();

  if($_SERVER["REQUEST_METHOD"] == "POST"){//포스트 방식으로 데이터가 넘어올 경우
    if(isset($_POST['add_to_cart'])){//add_to_cart(name값) 변수의 버튼을 눌러 넘어올 경우
      if(isset($_SESSION['cart'])){
        $addedItem = array_column($_SESSION['cart'],'cart_name');
        //array_column() : 주어진 배열(첫번째 파라미터) 에서 특정 컬럼(두번재 파라미터) 값 반환 => https://zetawiki.com/wiki/PHP_array_column()

        if(in_array($_POST['cart_name'],$addedItem)){
          //in_array(a,b) : b배열에서 a요소가 있으면 true
          echo "
            <script>
              alert('이미 추가된 상품입니다.');
              history.go(-1);
            </script>
          ";
        } else {
          $count = count($_SESSION['cart']);
          //echo $count;
          $_SESSION['cart'][$count]=array(
            'cart_img' => $_POST['cart_img'],
            'cart_name' => $_POST['cart_name'],
            'cart_desc' => $_POST['cart_desc'],
            'cart_pri' => $_POST['cart_price'],
            'cart_quan' => 1
          );

          echo "
          <script>
            alert('카트에 상품이 추가되었습니다.');
            history.go(-1);
          </script>
        ";

        }

        
        //var_dump($_SESSION['cart']);
        //var_dump($addedItem);
      } else {
        $_SESSION['cart'][0]=array(
          'cart_img' => $_POST['cart_img'],
          'cart_name' => $_POST['cart_name'],
          'cart_desc' => $_POST['cart_desc'],
          'cart_pri' => $_POST['cart_price'],
          'cart_quan' => 1
        );
        //var_dump($_SESSION['cart']);

        echo "
          <script>
            alert('카트에 상품이 추가되었습니다.');
            history.go(-1);
          </script>
        ";
      }
    }
  }

?>