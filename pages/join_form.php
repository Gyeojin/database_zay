<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
  <title>Zay Shop || Join</title>

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

  <form action="/zay/php/insert_mem.php" method="post" name="mem_form" enctype="multipart/form-data"> <!-- submit을 하면 데이터를 받아줄 파일에 인서트 -->
    <!-- multipart/form-data : <form> 요소가 파일이나 이미지를 서버로 전송할 때 주로 사용함. -->
    <p>아이디 : <input type="text" name="mem_id"></p>
    <p>비밀번호 : <input type="password" name="mem_pass"></p>
    <p>비밀번호 확인: <input type="password" name="mem_pass_check"></p>
    <p>프로필 사진 : <input type="file" name="mem_pf"></p>
    <p>이름 : <input type="text" name="mem_name"></p>
    <p>이메일 : <input type="text" name="mem_email"></p>

    <button type="button" id="submit_btn">제출</button>
    <!-- 바로 데이터 제출이 아닌 필터링을 해줘야 하기때문에 button으로 씀 -->
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="/zay/js/jq.main.js"></script>

  <script>
    //아이디, 비밀번호 필터링 (작성 안됐을때 알림창 뜨게하는법)
    const submitBtn = document.querySelector("#submit_btn");
    
    
    submitBtn.addEventListener('click',function(){
      if(!document.mem_form.mem_id.value){
        alert('아이디를 입력해 주세요.');
        document.mem_form.mem_id.focus();
        return;
      }
      if(!document.mem_form.mem_pass.value){
        alert('비밀번호를 입력해 주세요.');
        document.mem_form.mem_pass.focus();
        return;
      }
      if(!document.mem_form.mem_pass_check.value){
        alert('비밀번호 확인을 입력해 주세요.');
        document.mem_form.mem_pass_check.focus();
        return;
      }
      if(document.mem_form.mem_pass.value != document.mem_form.mem_pass_check.value){
        alert('비밀번호와 비밀번호 확인이 다릅니다.');
        document.mem_form.mem_pass_check.focus();
        return;
      }
      const extensions = ['jpg', 'png', 'jpeg'];
      const imgValue = document.mem_form.mem_pf.value;
      const imgExt = imgValue.split('.');
      console.log(imgExt[1]);

      if(!extensions.includes(imgExt[1])){
        alert('jpg, png, jpeg 형식의 이미지를 올려주세요.');
        return;
      }

      if(!document.mem_form.mem_name.value){
        alert('이름을 입력해 주세요.');
        document.mem_form.mem_name.focus();
        return;
      }

      if(!document.mem_form.mem_email.value){
        alert('이메일을 입력해 주세요.');
        document.mem_form.mem_email.focus();
        return;
      }
      document.mem_form.submit();
    });
  </script>
</body>
</html>