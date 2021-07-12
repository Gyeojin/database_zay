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

  //Light Slider Function Code
  const slider = function(){
    $(".slider").lightSlider({
      item: 1,
      controls: true,
      prevHtml: '<i class="fa fa-angle-left"></i>',
      nextHtml: '<i class="fa fa-angle-right"></i>',
      speed: 400, //ms'
      auto: true,
      loop: true,
      pause: 4000,
      easing: 'linear'
    });
  }
  slider();

  $(".mobile_menu").click(function(){
    $(this).toggleClass("on");
    if($(this).hasClass("on")){
      $(".menu_items").slideDown(250);
    } else {
      $(".menu_items").slideUp(250);
    }
  });
});