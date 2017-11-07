<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  {{-- csrf --}}
  <meta name="_token" content="{!! csrf_token() !!}" />

  <title>E-Book Archives</title>

  <link rel="icon" href="{{ url('uploads/book-icon.png') }}">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ url('adminlte/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->

  {{-- datatables --}}
  <link rel="stylesheet" href="{{ url('datatables/css/datatables.bootstrap.css') }}">

  <link rel="stylesheet" href="{{ url('adminlte/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('adminlte/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/skins/_all-skins.min.css') }}">

  {{-- searh bar ui --}}
  <link rel="stylesheet" href="{{ url('css/searchbar.css') }}">

</head>