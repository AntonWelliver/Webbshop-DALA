$(document).ready(function() {
    /* Login validation */
    $('.login-form')
    .form({
      fields: {
        username: {
          identifier  : 'username',
          rules: [
            {
              type   : 'empty',
              prompt : 'Please enter your username'
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
  