@extends('layouts/contentNavbarLayout')

@section('title', $page_name )

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}">
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/dashboards-analytics.js')}}"></script>
@endsection

@section('content')
<div class="row">

  <div class="col-12">
    <div class="card mb-6">
        <div class="user-profile-header-banner">
          <img src="{{ asset('assets/img/banner/profile-banner.png') }}" width="1393"  alt="Banner image"  class="rounded-top">
        </div>
      <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-4">
        <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
          <img src="{{ asset('assets/img/avatars/1.png') }}" alt="user image" class="d-block h-auto ms-0 ms-sm-5 rounded user-profile-img">
        </div>
        <div class="flex-grow-1 mt-3 mt-lg-5">
          <div class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
            <div class="user-profile-info">
              <h4 class="mb-2 mt-lg-6">{{ $full_name  }}</h4>
              <small> ใช้งานล่าสุด {{ $date }}</small>
              <!-- <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4">
                <li class="list-inline-item">
                  <i class="ri-palette-line me-2 ri-24px"></i><span class="fw-medium">UX Designer</span>
                </li>
                <li class="list-inline-item">
                  <i class="ri-map-pin-line me-2 ri-24px"></i><span class="fw-medium">Vatican City</span>
                </li>
                <li class="list-inline-item">
                  <i class="ri-calendar-line me-2 ri-24px"></i><span class="fw-medium"> Joined April 2021</span></li>
              </ul> -->
            </div>
            <!-- <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light">
              <i class="ri-user-follow-line ri-16px me-1_5"></i>Connected
            </a> -->
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top" style="margin-top: 30px;">
    <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0" >
      <li class="nav-item"><a class="nav-link active" id="profile" href="javascript:void(0);"><i class="mdi mdi-account-outline mdi-20px me-1"></i>Profile</a></li>
      <li class="nav-item"><a class="nav-link" id="history" href="javascript:void(0);"><i class="mdi mdi-history mdi-20px me-1"></i>History</a></li>
      <!-- <li class="nav-item"><a class="nav-link" href="javascript:void(0);"><i class="mdi mdi-link mdi-20px me-1"></i>Connections</a></li> -->
    </ul>
    </div>
  </div>
</div>
<div class="row" id="tab-1">
  <div class="col-xl-12 col-lg-5 col-md-5">
    <div class="card mb-6">
      <div class="card-body">
        <small class="card-text text-uppercase text-muted small">About</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-4"><i class="ri-user-3-line ri-24px"></i><span class="fw-medium mx-2">Full Name:</span> <span>{{ $full_name }}</span></li>
          <li class="d-flex align-items-center mb-4"><i class="ri-check-line ri-24px"></i><span class="fw-medium mx-2">Status:</span> <span  class="{{ $class_status }}">{{   $status }}</span></li>
          <li class="d-flex align-items-center mb-4"><i class="ri-star-smile-line ri-24px"></i><span class="fw-medium mx-2">Role:</span> <span>{{ $page_name == "Userprofile" ?$users->role  : $role}}</span></li>
        </ul>
        <small class="card-text text-uppercase text-muted small">Contacts</small>
        <ul class="list-unstyled my-3 py-1">
          <li class="d-flex align-items-center mb-2"><i class="ri-mail-open-line ri-24px"></i><span class="fw-medium mx-2">Email:</span> <span>{{  $page_name == "Userprofile" ?  $users->email: $user_data->email }}</span></li>
        </ul>

        </ul>
      </div>
    </div>

  </div>

</div>
<div class="row d-none" id="tab-2">
  <div class="col-xl-12 col-lg-5 col-md-5">
    <div class="card mb-6">
    <div class="card card-action mb-6">
      <div class="card-header align-items-center">
        <h5 class="card-action-title mb-0"><i class="ri-bar-chart-2-line ri-24px text-body me-4"></i>Activity Timeline</h5>
      </div>
      <div class="card-body pt-3">
        <ul class="timeline card-timeline mb-0">
          <li class="timeline-item timeline-item-transparent">
            <span class="timeline-point timeline-point-primary"></span>
            <div class="timeline-event">
              <div class="timeline-header mb-3">
                <h6 class="mb-0">12 Invoices have been paid</h6>
                <small class="text-muted">12 min ago</small>
              </div>
              <p class="mb-2">
                Invoices have been paid to the company
              </p>
              <div class="d-flex align-items-center mb-1">
                <div class="badge bg-lightest">
                  <!-- <img src="./User Profile - Profile _ Materio - Bootstrap 5 HTML + Laravel Admin Template_files/pdf.png" alt="img" width="15" class="me-2"> -->
                  <span class="h6 mb-0">invoices.pdf</span>
                </div>
              </div>
            </div>
          </li>


        </ul>
      </div>
    </div>
    </div>

  </div>

  <script src="{{ asset('assets/js-external/dashboard-user.js') }}"></script>

@endsection
