$(document).ready(function () {
  //

  $('.btn-view')
    .off()
    .on('click', function (event) {
      let id = $(this).data('id');
      window.location = '/profile/' + id;
    });
  $('.btn-add')
    .off()
    .on('click', function (event) {
      $('#modal-title').text('เพิ่มผู้ใช้งาน');
      $('#basicModal').data('frmStatus', 'create');

      clearInput();
    });
  $('.btn-refresh')
    .off()
    .on('click', function (event) {
      window.location = '/';
    });
  //
  $('.btn-edit').on('click', function (event) {
    $('#modal-title').text('แก้ไขผู้ใช้งาน');
    let id = $(this).data('id');
    $('#basicModal').data('frmStatus', 'edit');
    fecthDataByid(id);
  });
  $('.btn-delete').on('click', function (event) {
    $('#basicModal').data('frmStatus', 'destory');
    let id = $(this).data('id');

    let frmValue = {
      id: id
    };
    let url = '/backend/user/delete';
    let type = 'POST';

    deleted(frmValue, url, type);
  });
  $('.btn-submit').on('click', function (event) {
    let frmStatus = $('#basicModal').data('frmStatus');
    let frmValue = getFormValue();
    let url = '/backend';
    let type = 'POST';

    switch (frmStatus) {
      case 'create':
        url += '/user/create';
        create(frmValue, url, type);
        break;
      case 'edit':
        url += '/user/update';
        update(frmValue, url, type);
        break;

      default:
        break;
    }
  });
  function create(frmValue, url, type) {
    $.ajax({
      type: type,
      url: url,
      data: frmValue,
      dataType: 'json',
      success: function (response) {
        if (response.success == false) {
          toastr.warning(response.message); // Show su
        }
        if (response.success == true) {
          toastr.success(response.message); // Show su
          window.location = '/';
        }
      }
    });
  }
  function deleted(frmValue, url, type) {
    $.ajax({
      type: type,
      url: url,
      data: frmValue,
      dataType: 'json',
      success: function (response) {
        if (response.success == false) {
          toastr.warning(response.message); // Show su
        }
        if (response.success == true) {
          toastr.success(response.message); // Show su
          window.location = '/';
        }
      }
    });
  }
  function update(frmValue, url, type) {
    $.ajax({
      type: type,
      url: url,
      data: frmValue,
      dataType: 'json',
      success: function (response) {
        if (response.success == false) {
          toastr.warning(response.message); // Show su
        }
        if (response.success == true) {
          toastr.success(response.message); // Show su
          window.location = '/';
        }
      }
    });
  }

  function getFormValue() {
    let datafrm = {
      id: $('#id').val(),
      name: $('#name').val(),
      lastname: $('#lastname').val(),
      username: $('#username').val(),
      email: $('#email').val(),
      user_level: $('#user_level').val()
      // Email
      //gobal valiable
    };
    return datafrm;
  }
  function clearInput() {
    $('#name').val('');
    $('#lastname').val('');
    $('#username').val('');
    $('#email').val('');
    $('#user_level').val('').select2().trigger('change');
  }
  function addInput(data) {
    $('#name').val(data.name);
    $('#lastname').val(data.lastname);
    $('#username').val(data.username);
    $('#email').val(data.email);
    $('#id').val(data.id);
  }
  function fecthDataByid(id, type) {
    $.ajax({
      type: 'GET',
      url: '/backend/user/' + id,
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          let data = response.data;
          addInput(data);
          $('#user_level').val(data.user_level).select2().trigger('change');
        }
      }
    });
  }
});
