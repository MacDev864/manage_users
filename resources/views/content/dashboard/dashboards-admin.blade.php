@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

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

  <!--/ Congratulations card -->

  <!-- Transactions -->

  <!-- Deposit / Withdraw -->

  <!-- Data Tables -->
  <div class="col-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table">
          <thead class="table-light">
            <tr>
              <th class="text-truncate">User</th>
              <th class="text-truncate">Email</th>
              <th class="text-truncate">Role</th>
              <!-- <th class="text-truncate">Age</th>
              <th class="text-truncate">Salary</th> -->
              <th class="text-truncate">Status</th>
              <th class="text-truncate">tool</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($users as $key => $value)
            <tr>
              <td>
              <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <img src="{{asset('assets/img/avatars/1.png')}}" alt="Avatar" class="rounded-circle">
                  </div>
                  <div>
                    <h6 class="mb-0 text-truncate">{{ $value->username }}</h6>
                    <!-- <small class="text-truncate">{{ $value->username }}</small> -->
                  </div>
                </div>
              </td>
              <td class="text-truncate">{{ $value->email }}</td>
              @if($value->user_level == 0)
              <td class="text-truncate"><i class="mdi mdi-cog-outline text-warning mdi-24px me-1"></i> Author</td>
              @elseif($value->user_level == 1)
              <td class="text-truncate"><i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin</td>
              @elseif($value->user_level > 1)
              <td class="text-truncate"><i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i> User</td>
              @endif
              <!-- <td class="text-truncate">24</td>
              <td class="text-truncate">34500$</td> -->
              @if($value->is_active == 1)
              <td><span class="badge bg-label-success rounded-pill">online</span></td>
              @else
              <td><span class="badge bg-label-secondary rounded-pill">offline</span></td>
              @endif

              <td>
                <button type="button" class="btn btn-sm btn-view btn-outline-info" data-id="{{ $value->id }}" ><i class="mdi mdi-eye-circle"></i></button>
                <button type="button" class="btn btn-sm btn-edit btn-outline-warning" data-id="{{ $value->id }}"   ><i class="mdi mdi-pencil"></i></button>
                <button type="button" class="btn btn-sm btn-delete btn-outline-danger" data-id="{{ $value->id }}" ><i class="mdi mdi-delete"></i></button>
              </td>

            </tr>
            @endforeach

          </tbody>

        </table>
      </div>
    </div>
  </div>
  <!--/ Data Tables -->
</div>
<script>
  $(document).ready(function () {

    $('.btn-view').off().on('click', function (event) {
      let id = $(this).data("id");
      console.log(id);
      window.location = '/profile/'+id;
    });
  //   $('.btn-edit').on('click', function (event) {

  //   });
  // $('.btn-delete').on('click', function (event) {

  // });
  });
</script>
@endsection
