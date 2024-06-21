$(document).ready(function () {
  $('#profile').on('click', function (event) {
    $('#tab-2').addClass('d-none');
    $('#tab-1').removeClass('d-none');
    $('#history').removeClass('active');
    $('#profile').addClass('active');
  });
  $('#history').on('click', function (event) {
    $('#tab-1').addClass('d-none');
    $('#tab-2').removeClass('d-none');
    $('#history').addClass('active');
    $('#profile').removeClass('active');
  });
});
