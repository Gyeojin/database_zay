$(function () {
  let fileTarget = $(".upload_hidden");

  fileTarget.on("change", function () {
    //입력창에 문자 입력 시 변하는 값을 계속 읽어줌
    let filename;
    if (window.FileReader) {
      filename = $(this)[0].files[0].name;
    } else {
      filename = $(this).val().split("/").pop().split("\\").pop();
    }

    $(this).siblings(".upload_name").val(filename);
  });

  $("#pro_img_1").on("change", imgFileSelect1);
  $("#pro_img_2").on("change", imgFileSelect2);
});

const imgFileSelect1 = function (e) {
  const input = e.target; //어떤 이벤트를 실행시켰을 때 동작이 실행된 해당 객체를 타겟팅
  const reader = new FileReader(); //FileReader 생성자 함수를 호출하여 읽은 값을 저장

  reader.onload = function () {
    const dataURL = reader.result;
    const output = document.querySelector("#img1");
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};

const imgFileSelect2 = function (e) {
  const input = e.target; //어떤 이벤트를 실행시켰을 때 동작이 실행된 해당 객체를 타겟팅
  const reader = new FileReader(); //FileReader 생성자 함수를 호출하여 읽은 값을 저장

  reader.onload = function () {
    const dataURL = reader.result;
    const output = document.querySelector("#img2");
    output.src = dataURL;
  };
  reader.readAsDataURL(input.files[0]);
};
