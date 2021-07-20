$(function(){

  $(".like, .unlike").click(function(){
    //클릭 시 해당 아이디를 분리하여 like, unlike 와 상품번호로 저장
    const selectId = $(this).attr("id");
    //alert(selectId); like_상품인덱스 or unlike_상품인덱스
    const splitId = selectId.split("_"); //언더바(_)를 기준으로 문자열을 나눠줌->배열로 저장
    const likeUnlike = splitId[0];//문자열 나눈 것 중 0번째 인덱스의 문자열을 저장
    const postId = splitId[1];//문자열 나눈 것 중 1번째 인덱스의 문자열을 저장
    
    let type = 0;
    if(likeUnlike == "like"){
      type=1;
    } else {
      type=0;
    }

    $.ajax({
      url : '/zay/php/like_unlike.php',
      type : 'post',
      data : {postId : postId, type : type},
      dataType:'json',
      success : function(data){
        //console.log(data);
        const likes = data.likes;
        const unlikes = data.unlikes;

        $("#likes_" + postId).text(likes); //UI 즉각적으로 바꾸기 위한 로직
        $("#unlikes_" + postId).text(unlikes);

        if(type == 1){
          $("#like_" + postId).css({
            'color': '#fff', 'background': '#59ab6e'
          });
          $("#unlike_" + postId).css({
            'color': '#555', 'background': '#fff'
          });
        } else {
          $("#like_" + postId).css({
            'color': '#555', 'background': '#fff'
          });
          $("#unlike_" + postId).css({
            'color': '#fff', 'background': '#d84646'
          });
        }

        // console.log(likes);
        // console.log(unlikes);
      } 
    });

    //console.log(likeUnlike);
    //console.log(postId);
  });

});