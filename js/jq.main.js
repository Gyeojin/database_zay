$(function(){
  //const tbHeight = $(".top_bar").outerHeight(); //height(); : 패딩 사이즈를 못 읽음.
  //console.log(tbHeight);

  //header stick to top and animate style when scrolling down
  const headerStick = function(){
    const hdTop = $("header").offset().top;
    $(window).scroll(function(){
      const scroll = $(window).scrollTop(); //scrollTop (): 스크롤값이 계속 바뀜
      //console.log(scroll);
      if(scroll >= hdTop){
        $("header").css({position:"fixed", top:0, width:"100%"});
        $("header").addClass("stick");
      } else {
        $("header").css({position:"relative"});
        $("header").removeClass("stick");
      }
    });
  }
  headerStick();
  // const abc = function(){ //식별자 함수 : 호이스팅 막아주고 안정된 함수라고 알려져있음.

  // }
  // abc();

  //Navigation Slide Down and Up When Mobile Menu Click
  const barsClick = function(){
    $(".mobile_menu").click(function(){
      $(this).toggleClass("on");
      if($(this).hasClass("on")){
        $(".menu_items").slideDown(250);
      } else {
        $(".menu_items").slideUp(250);
      }
    });
  }
  barsClick();

  //index page description text cut
  const cuttingText = function(){
    //console.log($(".featured_item").length);
    for(let i=0; i < $(".featured_item").length; i++){
      const textLength = $(".featured_item").eq(i).find("p.desc").text();
      //console.log(textLength);

      $(".featured_item").eq(i).find("p.desc").text(textLength.substr(0,60)+"...");
    }
  }
  cuttingText();

  //index page items load more
  const loadMore = function(){
    $(".featured_item").hide();
    $(".featured_item").slice(0,3).show();

    $(".load_more button").click(function(){
      $(".featured_item:hidden").slice(0,3).show();
    });
  }
  loadMore();
});