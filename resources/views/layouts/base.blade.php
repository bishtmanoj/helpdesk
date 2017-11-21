<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('pageTitle')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @yield('stylesheet-top')
  @include('elements.stylesheet')
  @yield('stylesheet')
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ url('/') }}" class="navbar-brand">{{ trans('main.site_name') }}</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right pull-left1" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('sessions.login') }}">{{ trans('navigation.login') }} </a></li>
            <li><a href="{{ route('sessions.signup') }}">{{ trans('navigation.signup') }}</a></li>
            @include('elements.language')
        </div>
        <!-- /.navbar-collapse -->
        
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
        </h1>
       
      </section>

      <!-- Main content -->
      <section class="content">

        @yield('content')
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  @include('elements.footer')
</div>
<!-- ./wrapper -->
@include('elements.javascript')
@yield('javascript')

</body>
</html>
