$(document).ready(function () {
  checkbtnDisabled();
  $('.btn-register').on('click', function (event) {
    event.preventDefault(); // Prevent form submission

    let data = dataSet();

    // Send AJAX request
    $.ajax({
      type: 'POST',
      url: '/backend/auth/register', // Adjust URL as per your route
      data: data,
      dataType: 'json',
      success: function (response) {
        if (response.success == false) {
          toastr.warning(response.message); // Show success message with Toastr
        }
        toastr.success(response.message); // Show success message with Toastr
        // window.location = '/auth/login';
        // Optionally redirect to another page or perform other actions
      }
    });
  });
});
function checkbtnDisabled() {
  $('#terms-conditions').on('click', function (event) {
    let check_terms = document.getElementById('terms-conditions').checked == true ? true : false;
    if (check_terms) {
      $('.btn-register').prop('disabled', false);
    } else {
      $('.btn-register').prop('disabled', true);
    }
  });
  //
}
function dataSet() {
  let data = {
    username: $('#username').val(),
    email: $('#email').val(),
    password: $('#password').val(),
    name: $('#name').val(),
    lastname: $('#lastname').val()
  };
  return data;
}
