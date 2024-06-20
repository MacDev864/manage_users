$(document).ready(function () {
  $('.btn-login').on('click', function (event) {
    event.preventDefault(); // Prevent form submission

    let data = dataSet();

    // Send AJAX request
    $.ajax({
      type: 'POST',
      url: '/backend/auth/login', // Adjust URL as per your route
      data: data,
      dataType: 'json',
      success: function (response) {
        if (response.success == true) {
          toastr.success(response.message); // Show success message with Toastr
          window.location = '/';
        } else {
          toastr.warning(response.message); // Show success message with Toastr
        }

        // Optionally redirect to another page or perform other actions
      }
    });
  });
});

function dataSet() {
  let remember_me = document.getElementById('remember-me').checked == true ? true : false;
  let data = {
    username: $('#username').val(),
    email: $('#email').val(),
    password: $('#password').val(),
    remember_me: remember_me
  };
  return data;
}
