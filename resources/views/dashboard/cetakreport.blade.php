<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
      .custom1 {
        margin-left: auto !important;
        margin-right: auto !important;
        margin: 20px;
        padding: 20px;
      }
 
    </style>
    <title>Income</title>
  </head>
  <body>

    {{-- <center><img class="mt-4" src="{{ asset('images/text-thom.png') }}" width="500" alt=""></center> --}}
    <div class="custom1">
      <center> <h2 class="mb-2">THOM BARBERSHOP</h2></center>
        <h5 class="mt-3">{{ auth()->user()->username }}</h5>
        <h6 class="mb-4">{{ auth()->user()->email }}</h6>
         <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>No. Booking</th>
                <th>Service</th>
                <th>Customer</th>
                <th>Booking Date</th>
                <th>Schedule</th>
                <th>Employee</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($sql as $item)
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $item->no_book }}</td>
                <td>{{ $item->namalyn }}</td>
                <td>{{ $item->user->nama }}</td>
                <td>{{ date('d-m-Y',strtotime($item->tgl_pesan)) }}</td>
                <td>{{  date('d-m-Y',strtotime($item->jadwal)) }}&nbsp;{{ $item->jam }}</td>
                <td>{{ $item->namakywn }}</td>
                <td>{{ $item->hargalyn  }}</td>
            </tr>
            @endforeach
            @if (count($sql)==0)
            <tr>
              <td scope="row" colspan="8" ><center>No Report Data</center></td>
            </tr>
            @endif
            <tr>
                <td scope="row" colspan="7" ><center><strong>Total</strong></center></td>
                <td><strong>{{ $total }}</strong></td>
            </tr>
            </tbody>
        </table>
        <h6>Print Date : {{  date('d-m-Y',strtotime($date)) }}</h6>
      </div>
  </body>
</html>