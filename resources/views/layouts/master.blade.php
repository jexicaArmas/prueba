<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Admin</title>

        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="au theme template">
        <meta name="author" content="Hau Nguyen">
        <meta name="keywords" content="au theme template">

        <!-- Fontfaces CSS-->
        <link href="{{ asset('CoolAdmin/css/font-face.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

        <!-- Bootstrap CSS-->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="all">

          <!-- Vendor CSS-->
        <link href="{{ asset('CoolAdmin/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
        <link href="{{ asset('CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
        <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

        <link href="{{ asset('CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

        <!-- Main CSS-->
       {{-- Laravel Mix - CSS File --}}
        <link rel="stylesheet" href="{{ asset('CoolAdmin/css/theme.css') }}"> 
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap" style="float:right">
                                <div class="header-button" style="float:right">
                                    <div class="account-wrap">
                                    </div>
                                    <br>
                                    <div class="account-wrap">
                                        <div class="account-item clearfix js-item-menu">
                                            <div class="content">
                                                <i class="fa fa-user"></i>
                                                <a class="js-acc-btn" href="#">{{$user->name}}</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">
                                                <div class="account-dropdown__footer">
                                                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- END HEADER DESKTOP-->
                @yield('content')
            </div>
        </div>
        {{-- Laravel Mix - JS File --}}

        <!-- Jquery JS-->
        <script src="{{ asset('CoolAdmin/vendor/jquery-3.2.1.min.js') }}"></script>
        <!-- Bootstrap JS-->
        <script src="{{ asset('CoolAdmin/vendor/bootstrap-4.1/popper.min.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
        <!-- Vendor JS       -->
        <script src="{{ asset('CoolAdmin/vendor/slick/slick.min.js') }}">
        </script>
        <script src="{{ asset('CoolAdmin/vendor/wow/wow.min.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/animsition/animsition.min.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
        </script>
        <script src="{{ asset('CoolAdmin/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/counter-up/jquery.counterup.min.js') }}">
        </script>
        <script src="{{ asset('CoolAdmin/vendor/circle-progress/circle-progress.min.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/chartjs/Chart.bundle.min.js') }}"></script>
        <script src="{{ asset('CoolAdmin/vendor/select2/select2.min.js') }}">
        </script>

        <!-- Main JS-->
        <script src="{{ asset('CoolAdmin/js/main.js') }}"></script>

        @yield('scripts')
       <script>
           var time = setTimeout("showOffAlertMessage()", 5000);
           function showOffAlertMessage() {
               $("#message_alert").fadeOut(300);
               clearTimeout(time);
           }</script>
    </body>
</html>
