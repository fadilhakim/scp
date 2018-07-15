<!DOCTYPE html>
<html lang="en">
<head>
	<title>Strawberry Cellphone</title>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>

    <!-- fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet"> -->
		<!-- <link href="{{ asset("public/fonts/fontawesome-webfont.ttf") }}" rel="stylesheet"> -->

    <link href="{{ URL::to('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('public/css/bootstrap.extension.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('public/plugins/jqueryui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('public/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('public/css/swiper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('public/css/sumoselect.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('public/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/costum.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/stylesheets/screen.css') }}">

    <script src="{{ URL::to('public/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ URL::to('public/plugins/jqueryui/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::to('public/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
    <script src="{{ URL::to('public/js/global.js') }}"></script>

    <link rel="shortcut icon" href="{{ URL::to('public/favicon.png') }}" />

    <?php echo view("template/js_head") ?>
</head>
<body>
<div id="loader-wrapper"></div>
<div class="generalTemp row"></div>

