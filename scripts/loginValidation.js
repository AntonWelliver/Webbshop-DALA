$(document).ready(function() {
    /* Login validation */
    $('.login-form')
    .form({
      fields: {
        email: {
          identifier  : 'email',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter your e-mail'
            },
          ]
        },
        password: {
          identifier  : 'password',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter your password'
            }
          ]
        },
      },
      onSuccess: loginUser
    });
  });
  