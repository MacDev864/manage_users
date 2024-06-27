@extends('layouts/contentNavbarLayout')

@section('title', $page_name)

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


<div class="row gy-4">
  <div class="col-xl-12">
    <div class="card h-100">
      <div class="card-body row g-2">
        <div class="d-flex justify-content-between mb-3">
          <button type="button" class="btn btn-outline-danger btn-add" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="mdi mdi-plus mr-1"></i> เพิ่มข้อมูล</button>
          <div class="">
            <span class="a-pointer font-size-12 btn-refresh">
              <i class="mdi mdi-sync pr-1"></i>รีเฟรชข้อมูล
            </span>
          </div>

        </div>
        <div class="col-12">
          <div class="card">
            <div class="table-responsive">
              <table class="table">
                <thead class="table-light">
                  <tr>
                    <th class="text-truncate">Vehicle Name</th>
                    <th class="text-truncate">Vehicle Plate</th>
                    <th class="text-truncate">Vehicle Color</th>
                    <th class="text-truncate">Vehicle Model</th>
                    <th class="text-truncate">Vehicle Brand</th>
                    <!-- <th class="text-truncate">Email</th>
              <th class="text-truncate">Role</th>
              <th class="text-truncate">Status</th>
              <th class="text-truncate">tool</th> -->
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>

                    </td>
                  </tr>


                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

</script>
<!-- <script src="{{ asset('assets/js-external/dashboard-admin.js') }}"></script> -->


@endsection