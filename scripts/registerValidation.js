$(document).ready(function() {

     /* Register validation */

    $('.register-form')
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
              },
              {
                type   : 'length[6]',
                prompt : 'Your password must be at least 6 characters'
              }
            ]
          },
          registerPasswordVerify: {
            identifier  : 'registerPasswordVerify',
            rules: [{
                type   : 'match[password]',
                prompt : 'Your passwords do not match.'
            }]
          },
          terms: {
            identifier: 'terms',
            rules: [
              {
                type   : 'checked',
                prompt : 'You must agree to the terms and conditions'
              }
            ]
          }
        },
        onSuccess: registerUser
      });

    });