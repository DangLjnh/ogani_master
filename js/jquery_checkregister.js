$("#form_register").validate({
  rules: {
    name: {
      required: true,
    },
    email: {
      required: true,
      email: true,
    },
    password: {
      required: true,
      minlength: 8,
    },
    conf_password: {
      required: true,
      minlength: 8,
      equalTo: "#pass",
    },
    username: {
      required: true,
      minlength: 6,
    },
    phone: {
      required: true,
      minlength: 10,
      maxlength: 11,
    },
    address: {
      required: true,
    },
  },
  messages: {
    name: {
      required: "vui lòng nhập tên!",
    },
    email: {
      required: "Vui lòng nhập vào email",
      email: "Nhập đúng định dạng email",
    },
    password: {
      required: "vui lòng nhập mật khẩu",
      minlength: " cần tối thiểu 8 kí tự",
    },
    conf_password: {
      required: "vui lòng nhập lại mật khẩu",
      minlength: "cần tối thiểu 8 kí tự",
      equalTo: "mật khẩu không khớp",
    },
    username: {
      required: "vui lòng nhập tài khoản",
      minlength: " cần tối thiểu 6 kí tự",
    },
    phone: {
      required: "vui lòng nhập số điện thoại",
      minlength: " cần tối thiểu 10 kí tự",
      maxlength: " tối đa 11 kí tự ",
    },
    address: {
      required: "vui lòng nhập địa chỉ!",
    },
  },
});
