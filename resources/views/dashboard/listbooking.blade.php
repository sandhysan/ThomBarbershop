@extends('dashboard.layouts')

@push('css-list')
    <link href="{{ asset('lib-calender-admin/main.css') }}" rel="stylesheet" /> 
    {{-- <link href="{{ asset('lib-calender-admin/main.min.css') }}" rel="stylesheet" /> --}}
@endpush

@push('js-list')
<script src="{{ asset('lib-calender-admin/main.js') }}"></script>
@endpush

@section('konten')
<style>
    #calendar {
      max-width: 1000px;
      width: 100%;
      margin: 0 auto;
    }
  </style>
  <div class="container bg-light">
    <h3 class="card-title mt-3"><center>Schedule Booking</center></h3>
    <div id="calendar"></div>
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

@endsection
