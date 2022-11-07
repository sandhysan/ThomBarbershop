@extends('user.layouts')
@section('profil')
@auth
<div class="btn-group pt-3">
  <button type="button" class="ml-auto btn btn-primary p-2 rounded me-shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Hello, {{ auth()->user()->username }}
  </button>
  <div class="dropdown-menu" style="z-index: -1; margin-top: 0.5px" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="profilUser"><span class="icon ion-person"> Account</a>
    <a class="dropdown-item" href="riwayatbook"><span class="icon ion-document-text"> My Booking</a>
    <a class="dropdown-item active" href="jadwal"><span class="icon ion-calendar"> Schedule</a>
    <div class="dropdown-divider"></div>
  <form action="/logout" method="post" class="border-0">
    @csrf
    <button type="submit" class="dropdown-item" style="border: none;"><span class="icon ion-log-in"> Logout</button>
  </form>
  </div>
</div>
@endauth
@endsection

@section('content')
<link href="{{ asset('asset/lib-list/main.css') }}" rel="stylesheet" /> 
<link href="{{ asset('asset/lib-list/main.min.css') }}" rel="stylesheet" />

<style>
#calendar {
  max-width: 1000px;
  width: 100%;
  margin: 0 auto;
}
</style>
<div class="container">
<h3 class="card-title mb-3"><center>Schedule Booking</center></h3>
<div id="calendar" class="bg-light p-4"></div>
</div>

<script>
var listBooking = JSON.parse('<?php echo json_encode(@$dataBooking); ?>');
var nowDate = '{{date("Y-m-d")}}';
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: 'prev,next',
      center: 'title',
      right: 'dayGridMonth,listMonth'
    },
    initialDate: nowDate,
    navLinks: true, // can click day/week names to navigate views
    businessHours: true, // display business hours
    editable: true,
    selectable: true,
    events: listBooking
  });

  calendar.render();
});
</script>


<script src="{{ asset('asset/lib-list/main.js') }}"></script>
@endsection