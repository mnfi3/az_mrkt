<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script src="{{ asset('js/jquery.min.js') }}" ></script>
<script src="{{ asset('js/persian-date.min.js') }}" ></script>
<script src="{{ asset('js/persian-datepicker.min.js') }}" ></script>
<script>
  (function ($) {
    $(document).ready(function () {
      $(".start-day").persianDatepicker({
        format: 'YYYY/MM/DD',
        timePicker: {
          enabled: false
        }
      })
    });
  })
  (window.jQuery);
</script>


<title>فروشگاه محصولات و خدمات فناورانه دانشگاه شهید مدنی آذربایجان</title>




<!-- Styles -->

<link rel="stylesheet" href="{{asset('css/persian-datepicker.min.css')}}">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}"/>

<!-- Scripts -->
<script src="{{ asset('js/bundle.js') }}" defer></script>
