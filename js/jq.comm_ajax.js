$(function(){
  const url = "/zay/data/ajax/community_ajax.php";
  // $.get(url,{get으로 받는 수},function(comm_data){ <-ajax get 로직
  //   console.log(comm_data);
  // });
  $.get(url,{page : 1},function(comm_data){
    $(".comm_row").append(comm_data);
  });
});

let current = 1;
const pgLength = $(".num").length;
//ajax를 통해 클릭한 넘버링 데이터 불러옴
function getPage(n){
  const url = "/zay/data/ajax/community_ajax.php";
  
  $(".num").removeClass("active");
  $(".num").eq(n - 1).addClass("active");

  $.get(url,{page : n},function(comm_data){
    $(".comm_row").html(comm_data); //html 쓰는 이유:기존에 있던 걸 지워주고 새로 갱신해줌
    current = n; //n을 재할당 해주면 밖에서도 쓸 수 있다!
  });
}

//이전, 다음 버튼 클릭시 기능 로직 (리팩토링)
function prevNext(pageNum, calcPage){
  if(current == pageNum){
    getPage(pageNum);
  } else {
    getPage(current + calcPage);
  }
}

//처음으로 가기, 마지막으로 가기 버튼 클릭시 기능 로직
$(".angle").click(function(){
  if($(this).hasClass("prev")){
    prevNext(1, -1);
  } else {
    prevNext(pgLength, 1);
  }
});

$(".d_angle").click(function(){
  if($(this).hasClass("first")){
    getPage(1);
  } else {
    getPage(pgLength);
  }
});


//이전, 다음 버튼 클릭시 기능 로직 (리팩토링 이전 로직★)
//$(".prev").click(function(){
  //prevNext(1, -1);
  // if(current == 1){
  //   getPage(1); //첫 페이지에 머무름
  // } else {
  // getPage(current - 1);
  // }
//});

//$(".next").click(function(){
  //prevNext(pgLength, 1);
  // if(current == pgLength){
  //   getPage(pgLength); //그냥 마지막 페이지에 머무른다
  // } else {
  //   getPage(current + 1);
  // }
//});

$(".num").eq(0).addClass("active");