$("#form_category").validate({
  rules: {
    name: {
      required: true,
    },
    aaa: {
      required: true,
      extension: "jpe?g,png",
      uploadFile: true,
    },
  },
  messages: {
    name: {
      required: "Vui lòng nhập tên loại ",
    },
    aaa: {
      required: "Vui lòng  chọn ảnh upload ",
      extension: "vui lòng nhập đúng định dạng",
      uploadFile: "aaa",
    },
  },
});
