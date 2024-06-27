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
<style>
  .set-input {
    width: 100px;
    height: 100px;
    font-size: 40px;
  }
</style>

<div class="row gy-4 mb-4">
  <div class="col-xl-12">
    <div class="card h-100">
      <div class="card-body row g-2">
        <div class="col-md-4">
          <span>{{ $page_name }}</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row gy-4 mb-4">
  <div class="col-xl-12">
    <div class="card h-100">
      <div class="card-body row g-2">
        <form method="GET" action="{{ route('submit-game-settings') }}">
          @csrf
          <div class="row">
            <div class="col-md-3 mt-2">
              <div class="form-floating form-floating-outline">
                <input type="text" name="row" id="row" value="{{ $row }}" class="form-control" placeholder="Enter Row">
                <label for="row">Row</label>
              </div>
            </div>
            <div class="col-md-3 mt-2">
              <div class="form-floating form-floating-outline">
                <input type="text" name="col" id="col" value="{{ $col }}" class="form-control" placeholder="Enter Col">
                <label for="col">Col</label>
              </div>
            </div>
            <div class="col-md-3 mt-2">
              <button type="submit" class="btn btn-primary btn-outline-primary"><i class="mdi mdi-plus mr-1"></i>สร้าง</button>
             
            </div>
        
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row gy-4">
<div class="d-flex justify-content-between mb-3">
              <div class="">
                <span class="a-pointer font-size-12 btn-refresh" >
                  <i class="mdi mdi-sync pr-1"></i>รีเฟรชข้อมูล
                </span>
              </div>

        </div>
  <div class="col-xl-12">
    <div class="card h-100">
      <div class="card-body row g-2">
        <div class="col-md-12">
        
        

          @foreach($arr_row as $key => $value)
            @foreach($arr_col as $index => $item)
            <input type="button" value="" id="{{ $value.$item.$key.$index }}" data-id="{{ $value.$item.$key.$index }}" class="set-input mb-2 " >
           
            @endforeach
            <br>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function checkWinner(value, id) {
  let rowCount = parseInt($('#row').val());
  let colCount = parseInt($('#col').val());

  let grid = createGrid(rowCount, colCount);
   // Parse the ID to get the row and column
   let [row, col] = id.split("xo").map(Number);
  grid[row][col] = value;
 let winner =  isWinner(grid, row, col, value);
// Check for winner
 if (winner) {
    toastr.success(value.toUpperCase() + "'s Winners");
    explodeWinner(grid, value);
    disableAllInputs();
    return winner;
 }

return winner;
}
function disableAllInputs() {
  $('.set-input').prop('disabled', true);
}

function createGrid(rowCount, colCount) {
  let grid = [];
  let num = 1;
  for (let i = 0; i < rowCount; i++) {
    grid[i] = [];
    for (let j = 0; j < colCount; j++) {
      let cellValue = $('#'+ 'xo' + i  + j).val();
      grid[i][j] = cellValue ? cellValue : num;
      num++;
    }
  }
  return grid;
}

function isWinner(grid, row, col, player) {
  let num = 1;
  let maxRow = 0;
  let maxCol = 0;
  for (let indexRow = 0; indexRow < grid.length; indexRow++) {
    if (maxRow < indexRow) {
      maxRow = indexRow
    }
    for (let indexCol = 0; indexCol < grid[indexRow].length; indexCol++) {
      if (maxCol < indexCol) {
      maxCol = indexCol
      }
      const element = grid[indexRow][indexCol];
     
      num++
    }


  }



}

function explodeWinner(grid, player) {
  for (let i = 0; i < grid.length; i++) {
    for (let j = 0; j < grid[i].length; j++) {
      if (grid[i][j] === player) {
        $('#' + i + 'xo' + j).addClass('explosion');
      }
    }
  }
}

$(document).ready(function () {
  let currentPlayer = 'X';

  $('.btn-refresh').on('click', function () {
    window.location = '/game/xo';
  });

  $('.set-input').on('click', function () {
    let id = $(this).data('id');
    // console.log(!this.value);
    if (!this.value) {
      this.value = currentPlayer;
      checkWinner(currentPlayer, id)
      currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
    }
  });
});

</script>
@endsection
