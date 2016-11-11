<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resource.com</title>
    <meta name="description" content="Spirit8 is a Digital agency one page template built based on bootstrap framework. This template is design by Robert Berki and coded by Jenn Pereira. It is simple, mobile responsive, perfect for portfolio and agency websites. Get this for free exclusively at ThemeForces.com">
    <meta name="keywords" content="bootstrap theme, portfolio template, digital agency, onepage, mobile responsive, spirit8, free website, free theme, themeforces themes, themeforces wordpress themes, themeforces bootstrap theme">
    <meta name="author" content="ThemeForces.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ URL::asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ URL::asset('img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('img/apple-touch-icon-114x114.png') }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="{{ URL::asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('fonts/font-awesome/css/font-awesome.css') }}">

    <!-- Slider
    ================================================== -->
    <link href="{{ URL::asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen">
    <link href="{{ URL::asset('css/owl.theme.css') }}" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/responsive.css') }}">

    <link href="{{ URL::asset('http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic') }}" rel='stylesheet' type='text/css'>
    <link href="{{ URL::asset('http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400') }}" rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ URL::asset('http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/datatables/dataTables.bootstrap.css')}}">
    
    <!-- ClockPicker -->
    <link rel="stylesheet" href="{{ URL::asset('plugins/clockpicker/src/clockpicker.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/clockpicker/src/standalone.css')}}">

    <script type="text/javascript" src="{{ URL::asset('js/modernizr.custom.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Navigation
    ==========================================-->
    <nav id="tf-menus" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Resource</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            @yield ('navbar')
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                    {{ Auth::user()->name }} (ID: {{ Auth::user()->id }}) <span class="caret"></span>
                </a>

                <ul class="dropdown-menu nav navbar-header navbar-right" role="menu">
                    
                    <li>
                       <!-- <a href="{{ url('/admin/edit') }}" ><p> Setting  <i class="fa fa-gear"> </i></p></a> -->
                        {{ link_to_route('admin.edit','Setting ',[$user=Auth::user()->id],['align'=>'center']) }}
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <p> Logout  <i class="fa fa-sign-out"></i></p>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
                    
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <!-- Clients Section
    ==========================================-->
    <div id="tf-clientss" class="text-center">
        <div class="overlay">
            <div class="container">

                <div class="section-title center">
                    @yield ('header')
                    <div class="line">
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

<!-- jQuery 2.1.4
    <script src="{{ URL::asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    jQuery (necessary for Bootstrap's JavaScript plugins) 
    <script src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.1.11.1.js') }}"></script>-->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script src="{{ URL::asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/SmoothScroll.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.isotope.js') }}"></script>
    <script src="{{ URL::asset('/js/app.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.js') }}"></script>
    
    <!-- DataTables -->
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <!-- DataTables -->
    <script src="{{ URL::asset('plugins/clockpicker/jquery.clockpicker.min.js')}}"></script>
    <script src="{{ URL::asset('plugins/clockpicker/jquery.clockpicker.js')}}"></script>

    <!-- Clockpicker -->
    <script src="{{ URL::asset('plugins/clockpicker/src/clockpicker.js')}}"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
        <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });    
    </script>
    <script>
      function ConfirmDelete()
      {
      var x = confirm("Are you sure you want to delete?");
      if (x)
        return true;
      else
        return false;
      }
    </script>
    <script type="text/javascript">
    $('.clockpicker').clockpicker();
    </script>
  </body>
</html>