@section('header')
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
  מערכת לניהול מודעות תכנון ובניה
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
  />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
  />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Markazi Text font include just for persian demo purpose, don't include it in your project -->
  <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">

  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="../assets/css/material-dashboard-rtl.css?v=1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.css"> 
  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <!-- Style Just for persian demo purpose, don't include it in your project -->
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4 {
      font-family: "Cairo";
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
        שלום  {{ Auth::user()->name }} 
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="/home">
              <i class="material-icons">dashboard</i>
              <p>מסך ראשי</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/list_announcement">
              <i class="material-icons">content_paste</i>
              <p>רשימת מודעות</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/worker_list">
              <i class="material-icons">person</i>
              <p>רשימת עובדים</p>
            </a>
          </li>
          <li class="nav-item ">
                <a class="nav-link" href="/app_users_list">
                  <i class="material-icons">person</i>
                  <p>  רשימת משתמשים </p>
                </a>
          </li>
         
      
          <li class="nav-item ">
            <a class="nav-link" href="/users_requests">
              <i class="material-icons">notifications</i>
              <p>בקשות חדשות</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="/list_problem_objections">
              <i class="material-icons">notifications</i>
              <p>ערעורים ותקלות</p>
            </a>
          </li>
        
        </ul>
      </div>
    </div>



    {{-- start  --}}

    <div class="main-panel">
      
           <!-- Navbar -->
           <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
              <div class="container-fluid">
                <div class="navbar-wrapper">
                
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
                  aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                  <span class="navbar-toggler-icon icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                
                  <ul class="navbar-nav">
               
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">8</span>
                        
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">סתם מודעה</a>
                        <a class="dropdown-item" href="#">סתם מודעה</a>
                        <a class="dropdown-item" href="#">סתם מודעה</a>
                        <a class="dropdown-item" href="#">סתם מודעה</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="material-icons">person</i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="#">הגדרות משתמש</a>
                          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">התנתק</a>
                          
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form> 
                        </div>
                      </li>
                 
                  </ul>
                </div>
              </div>
            </nav>
            <!-- End Navbar -->
       
       
            <div class="content">
          <div class="container-fluid">

    {{--  --}}
@endsection