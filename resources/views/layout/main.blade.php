<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/script.js')}}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/app.css')}}">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid mt-3 d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0"
                    href="{{url('/')}}">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Laundry kuy</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" href="{{ url('/')}}" style="padding: 8px 16px;">
                            <i class="fas fa-tachometer-alt" style="margin: 0px 6px 0px 0px;"></i>
                            <span>Dashboard</span>
                        </a>

                        <a class="nav-link active" href="{{url('member')}}" style="padding: 8px 16px;">
                            <i class="fas fa-user-alt" style="margin: 0px 6px 0px 0px;"></i>
                            <span>Member</span>
                        </a>

                        <a class="nav-link active" href="{{url('laundry')}}" style="padding: 8px 16px;">
                            <i class="fas fa-box" style="margin: 0px 6px 0px 0px;"></i>
                            <span>Paket Laundry</span>
                        </a>

                        <a class="nav-link active" href="{{url('management')}}" style="padding: 8px 16px;">
                            <i class="fas fa-coins" style="margin: 0px 6px 0px 0px;"></i>
                            <span>Manajemen</span>

                            <a class="nav-link active" href="{{url('laundriin')}}" style="padding: 8px 16px;">
                                <i class="fas fa-water" style="margin: 0px 6px 0px 0px;"></i>
                                <span>Laundry</span>
                            </a>
                        </a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0"
                        id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        @yield('container')
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="{{ asset('assets/js/script.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.1/jspdf.debug.js"
            integrity="sha384-THVO/sM0mFD9h7dfSndI6TS0PgAGavwKvB5hAxRRvc0o9cPLohB0wb/PTA7LdUHs" crossorigin="anonymous">
        </script>
</body>
</html>