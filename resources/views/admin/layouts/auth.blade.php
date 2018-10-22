<!DOCTYPE html>
<html>
<head>
  @include('admin.shared.front_head')
</head>
<body class="login">
  <div class="main-container">
    <div class="customscroll customscroll-10-p height-100-p xs-pd-20-10">
      <div class="container">
        <!-- Login Page Start -->
        <div class="login-page">
          @yield('content')
        </div>
        <!-- Login Page End -->
      </div>
      <!-- <?php // include('include/footer.php'); ?> -->
    </div>
  </div>
  <script src="{!! asset('/js/jquery-3.1.1.min.js') !!}"></script>
  @yield('scripts')
</body>
</html>