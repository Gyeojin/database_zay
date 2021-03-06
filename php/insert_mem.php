<?php

  //사용자가 데이터를 입력해 제출하면 데이터를 받아주는 파일

  //데이터베이스에 넘길 데이터들을 프로그램이 읽을 수 있게 변수처리하는 과정.
  $mem_id = $_POST['mem_id'];

  include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
  $sql_check = "SELECT * FROM zay_mem WHERE ZAY_mem_id='{$mem_id}'";

  $check_result = mysqli_query($dbConn, $sql_check);
  $is_check = mysqli_num_rows($check_result);

  //echo $is_check;

  if($is_check > 0){
    echo "
      <script>
        alert('이미 가입된 회원입니다.');
        history.go(-1);
      </script>
    ";
  } else {

    $password = $_POST['mem_pass'];
    $mem_pass = password_hash($password, PASSWORD_DEFAULT);
      //패스워드 암호화 참고 : https://zetawiki.com/wiki/PHP_password_verify()
    $mem_name = $_POST['mem_name'];
    $mem_email = $_POST['mem_email'];
    $mem_regi = date('Y-m-d'); //대문자 Y : 네자리 년도
    $mem_level = 9;

    //파일 변수가 전달되면, 각 파일의 정보가 함께 전달된다. 그 정보에는 파일 이름['name'], 임시 이름, 에러 정보 등이 있다.
    $mem_pf_name = $_FILES['mem_pf']['name']; //FILES ['내가 정한 네임']['사용할 key값']
    $mem_pf_tmp = $_FILES['mem_pf']['tmp_name'];
    $mem_pf_err = $_FILES['mem_pf']['error'];

    //사진 업로드 파일 경로
    $pf_upload_dir = $_SERVER["DOCUMENT_ROOT"]."/zay/data/profile/";

    //사진 업로드
    if($mem_pf_name && !$mem_pf_err){
      $uploaded_url = $pf_upload_dir.$mem_pf_name;
      if(!move_uploaded_file($mem_pf_tmp,$uploaded_url)){
        die("파일을 지정한 디렉토리에 업로드를 실패했습니다.");
      }
    } else {
      $mem_pf_name = "";
    }

    include $_SERVER["DOCUMENT_ROOT"]."/connect/db_conn.php";
    $sql = "INSERT INTO zay_mem (
      ZAY_mem_id,
      ZAY_mem_pass,
      ZAY_mem_pf,
      ZAY_mem_name,
      ZAY_mem_email,
      ZAY_mem_regi_day,
      ZAY_mem_level
    ) VALUES (
      '{$mem_id}',
      '{$mem_pass}',
      '{$mem_pf_name}',
      '{$mem_name}',
      '{$mem_email}',
      '{$mem_regi}',
      '{$mem_level}'
    )";

    mysqli_query($dbConn,$sql);

    echo "
      <script>
        alert('회원가입이 완료되었습니다.');
        location.href='/zay/index.php';
      </script>
    ";
  }
  //echo $mem_id, $mem_pass, $mem_pf, $mem_name, $mem_email;
?>