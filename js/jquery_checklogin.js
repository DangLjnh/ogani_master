$("#form_login").validate({
  rules: {
    username: {
      required: true,
    },
    password: {
      required: true,
    },
  },
  messages: {
    username: {
      required: "Vui lòng nhập tài khoản! ",
    },
    password: {
      required: "Vui lòng  nhập mật khẩu ",
    },
  },
});
