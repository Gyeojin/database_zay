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
            'cart_idx' => $_POST['cart_idx'],
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
          'cart_idx' => $_POST['cart_idx'],
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
    } //End of Add_to_cart post data

    //start check remove_cart post data
    if(isset($_POST['cart_remove'])){
      foreach($_SESSION['cart'] as $key => $value){ //cart session에서 key가 value인 값을 뽑아낸다
        if($value['cart_name'] == $_POST['cart_remove']){ //추가된 카트 상품 정보 중 상품 이름이 cart_remove 버튼 클릭 시 넘어오는 cart_remove의 post value와 같은 경우
          unset($_SESSION['cart'][$key]); //cart 세션에 있는 모든 key들을 전부 지워줌
          $_SESSION['cart'] = array_values($_SESSION['cart']); //써도 안 써도 상관없음 : 단순히 남아있는 배열을 array_values라는 함수에 담아 카트 세션에 다시 저장하는 과정.

          echo "
            <script>
              alert('장바구니에서 상품이 삭제되었습니다.');
              history.go(-1);
            </script>
          ";
        }
      }
    }
  }

?>