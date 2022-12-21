$("#form-product").validate({
  rules: {
    name: {
      required: true,
    },
    price: {
      required: true,
    },
    weight: {
      required: true,
    },
    vote: {
      required: true,
    },
    desc: {
      required: true,
    },
  },
  messages: {
    name: {
      required: "Vui lòng nhập tên sản phẩm",
    },
    price: {
      required: "Vui lòng nhập giá sản phẩm",
    },
    weight: {
      required: "Vui lòng nhập cân nặng sản phẩm",
    },
    vote: {
      required: "Vui lòng  đánh giá sản phẩm 1-5",
    },
    desc: {
      required: "Vui lòng nhập mô tả sản phẩm",
    },
  },
});
