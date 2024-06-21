$(document).ready(function () {

  $('#status').on('click', function (event) {
    let status = document.getElementById('status').checked == true ? true : false;
    $.ajax({
      type: "POST",
      url: "/backend/change_status",
      data: {
        is_active:status
      },
      dataType: "json",
      success: function (response) {
        // /backend/change_status
        if (response.success) {
          window.location = '/pages/account-settings-connections';

        }
      }
    });
  });
 });
