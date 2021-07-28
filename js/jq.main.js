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
      if($(".featured_item:hidden").length == 0){
        $(".load_more").html(`<input type="hidden>"`);
      }
    });
  }
  loadMore();

  //featured item images height fit to responsive width

  const imgHeightFit = function(){
    const featuredImgWidth = $(".featured_img").outerWidth(); //outerWidth : 가장 바깥쪽의 가로값 읽어줌
    $(".featured_img").outerHeight(featuredImgWidth);
    //console.log(featuredImgWidth);
    //console.log(featuredImgHeight);
    $(window).resize(function(){
      const featuredImgWidth = $(".featured_img").outerWidth(); //outerWidth : 가장 바깥쪽의 가로값 읽어줌
      $(".featured_img").outerHeight(featuredImgWidth);
    });
  }
  imgHeightFit();

  // detail page image tabs function
  const detailTab = function(){
    $(".detail_tab_btns span").click(function(){
      const index = $(this).index();
  
      $(".detail_img>img").hide();
      $(".detail_img>img").eq(index).show();
    });
  
    $(".detail_tab_btns span").eq(0).trigger("click"); //처음 갱신 시 무조건 0번을 강제클릭
  }
  detailTab();

  const buttonBgcolor = function(){
    $(".size_choice span").click(function(){
      $(".size_choice span").css({background:"#59ab6e"});
      for(let j=0; j < $(".size_choice span").length; j++){
        $(this).eq(j).css({background:"#6c757d"});
      }
    });
  }
  buttonBgcolor();

  let count=1;
  
  function add(){
    count++;
  }

  $(".size .plus").click(function(){
    add();
    $(".size b").text(count);
  });

  function detailFit(){ //디테일 페이지 이미지 높이 맞춤
    const imgHeight = $(".detail_img_item").outerHeight();
    const btnsHeight = $(".detail_tab_btns").outerHeight();
    $(".detail_img").height(imgHeight + btnsHeight);
  }
  
  $(window).resize(function(){ //창 리사이즈 할 때 로직
    setTimeout(function(){ //리사이즈, 스크롤 이벤트 시 쓰로틀링 (컴퓨터 부하 막기 위함)
      detailFit();
    }, 150);
  });

  detailFit();

  $("#price").click(function(){
    $(this).toggleClass("on");
    if($(this).hasClass("on")){
      $(this).html('높은가격순 <i class="fa fa-chevron-up"></i>')
      location.href='/zay/pages/menu_page/shop.php?key=up_price';
    } else {
      $(this).html('낮은가격순 <i class="fa fa-chevron-down"></i>')
      location.href='/zay/pages/menu_page/shop.php?key=down_price';
    }
  });
});