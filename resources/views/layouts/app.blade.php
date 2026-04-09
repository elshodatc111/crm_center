<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="{{ asset('images/icon1.jpg') }}" rel="icon">
  <link href="{{ asset('images/icon1.jpg') }}" rel="apple-touch-icon">
  <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css') }}">
  <link href="{{ asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">
  <link href="{{ asset('https://atkopanel.uz/umka/public/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  @include('layouts.layout')

  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/quill/quill.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('https://atkopanel.uz/umka/public/assets/js/main.js') }}"></script>
  @yield('scripts')
  
  <script src="{{ asset('./js/table2excel.js')}}"></script>
  <script>
    var table2excel = new Table2Excel();
    document.getElementById('export').addEventListener('click', function() {
      table2excel.export(document.getElementById('table'));
    });
  </script>
</body>
</html>