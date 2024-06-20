@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Account Settings / </span> Connections
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-account')}}"><i class="mdi mdi-account-outline mdi-20px me-1"></i> Account</a></li>
      <li class="nav-item"><a class="nav-link" href="{{url('pages/account-settings-notifications')}}"><i class="mdi mdi-bell-outline mdi-20px me-1"></i> Notifications</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="mdi mdi-link mdi-20px me-1"></i> Connections</a></li>
    </ul>
    <div class="card">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="card-header">
            <h5 class="mb-2">Connected Accounts</h5>
            <p class="mb-0 text-body">Display content from your connected accounts on your site</p>
          </div>
          <div class="card-body">
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/google.png')}}" alt="google" class="me-3" height="36">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9 mb-sm-0 mb-2">
                  <h6 class="mb-0">Google</h6>
                  <small>Calendar and contacts</small>
                </div>
                <div class="col-3 text-end">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" type="checkbox" role="switch">
                  </div>
                </div>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="flex-shrink-0">
                <img src="{{asset('assets/img/icons/brands/logo-page.png')}}" alt="google" class="me-3" height="36">
              </div>
              <div class="flex-grow-1 row">
                <div class="col-9 mb-sm-0 mb-2">
                  <h6 class="mb-0">status</h6>
                  <small>online or offline</small>
                </div>
                <div class="col-3 text-end">
                  <div class="form-check form-switch">
                    <input class="form-check-input float-end" id="status" type="checkbox" role="switch"  {{ $user_data->is_active ? "checked":"" }}>
                  </div>
                </div>
              </div>
            </div>
        



          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<script>
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
</script>
@endsection
