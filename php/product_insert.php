<?php

  $pro_cate = $_POST['pro_select'];
  $pro_name = $_POST['pro_insert_name'];
  $pro_pri = $_POST['pro_insert_pri'];
  $pro_brand = $_POST['pro_insert_brand'];
  $pro_desc = $_POST['pro_insert_desc'];
  $pro_color = $_POST['pro_insert_color'];
  $pro_img1 = $_POST['pro_insert_img1'];
  $pro_img2 = $_POST['pro_insert_img2'];
  $pro_reg = date("Y-m-d");

  echo $pro_cate."<br>";
  echo $pro_name."<br>";
  echo $pro_pri."<br>";
  echo $pro_brand."<br>";
  echo $pro_desc."<br>";
  echo $pro_color."<br>";
  echo $pro_img1."<br>";
  echo $pro_img2."<br>";
  echo $pro_reg."<br>";

?>