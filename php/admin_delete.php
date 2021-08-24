<?php
  //echo $_POST['item'][0];
  if(!isset($_POST['item'])){
    echo "
      <script>
        alert('삭제할 회원 정보를 선택해 주세요.');
        history.go(-1);
      </script>
    ";
  } else {
    
  }
?>