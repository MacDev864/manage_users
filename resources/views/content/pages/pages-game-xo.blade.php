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
      <span class="a-pointer font-size-12 btn-refresh">
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
          <input type="button" value="" id="{{ $value.$item }}" data-id="{{ $value.$item }}" class="set-input mb-2 ">

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
    if (typeof id === "number") {
      id = id.toString()
    }
    // Parse the ID to get the row and column
    let [row, col] = id;
    grid[row][col] = value;
    let winner = isWinner(grid, row, col, value);
    // // Check for winner
    if (winner) {
      toastr.success(value.toUpperCase() + "'s Winners");
      explodeWinner(grid, value);
      disableAllInputs();
      return winner;
    }

    return winner;
  }

  function isWinner(grid, row, col, value) {
    let rowCount = grid.length;
    let colCount = grid[0].length;

    // Check the row
    let rowWin = true;
    for (let c = 0; c < colCount; c++) {
      if (grid[row][c] !== value) {
        rowWin = false;
        break;
      }
    }

    // Check the column
    let colWin = true;
    for (let r = 0; r < rowCount; r++) {
      if (grid[r][col] !== value) {
        colWin = false;
        break;
      }
    }

    // Check the main diagonal
    let mainDiagWin = true;
    if (row === col) { // only check if the move is on the main diagonal
      for (let i = 0; i < Math.min(rowCount, colCount); i++) {
        if (grid[i][i] !== value) {
          mainDiagWin = false;
          break;
        }
      }
    } else {
      mainDiagWin = false;
    }

    // Check the anti-diagonal
    let antiDiagWin = true;
    if (row + col === colCount - 1) { // only check if the move is on the anti-diagonal
      for (let i = 0; i < Math.min(rowCount, colCount); i++) {
        if (grid[i][colCount - 1 - i] !== value) {
          antiDiagWin = false;
          break;
        }
      }
    } else {
      antiDiagWin = false;
    }

    return rowWin || colWin || mainDiagWin || antiDiagWin;
  }

  function createGrid(rowCount, colCount) {
    let grid = [];
    let num = 1;
    for (let i = 0; i < rowCount; i++) {
      grid[i] = [];
      for (let j = 0; j < colCount; j++) {
        let cellValue = $('#' + i + j).val();
        grid[i][j] = cellValue ? cellValue : num;
        num++;
      }
    }
    return grid;
  }

  function disableAllInputs() {
    $('.set-input').prop('disabled', true);
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

  $(document).ready(function() {
    let currentPlayer = 'X';

    $('.btn-refresh').on('click', function() {
      window.location = '/game/xo';
    });

    $('.set-input').on('click', function() {
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