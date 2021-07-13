<?php

  //세션 삭제하기 전에 먼저 불러와야 함.
  session_start();
  
  //세션 삭제 코드
  unset($_SESSION['userid']);
  unset($_SESSION['userprofile']);

  echo "
    <script>
      location.href='/zay/index.php';
    </script>
  ";

?>