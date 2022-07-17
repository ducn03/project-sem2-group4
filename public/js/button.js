

$("#sc-button").click(function (event) {

  showSuccessToast();
  
});

$("#er-button").click(function (event) {

  showErrorToast();
  
});


function showSuccessToast() {
  toast({
    title: "Thành công!",
    message: "Bạn đã đăng nhập thành công !.",
    type: "success",
    duration: 5000
  });

}

function showErrorToast() {
  toast({
    title: "Thất bại!",
    message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
    type: "error",
    duration: 5000
  });
}