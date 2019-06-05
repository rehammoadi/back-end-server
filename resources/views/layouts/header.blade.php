@section('header')
{{-- <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>הודעות תכנון ובניה</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

--}}







<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="utf-8" />
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
            <a class="nav-link" href="#">
              <i class="material-icons">library_books</i>
              <p>רשימת עובדים</p>
            </a>
          </li>
          <li class="nav-item ">
                <a class="nav-link" href="/user_list">
                  <i class="material-icons">person</i>
                  <p>רשימת משתמשים</p>
                </a>
          </li>
         
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">location_ons</i>
              <p>מפה</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="#">
              <i class="material-icons">notifications</i>
              <p>בקשות חדשות</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="/settings">
                <i class="material-icons">bubble_chart</i>
                <p>הגדרות משתמש</p>
              </a>
            </li>
        </ul>
      </div>
    </div>



@endsection