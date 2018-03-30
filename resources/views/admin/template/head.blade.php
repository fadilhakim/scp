<?php
    $head_script = !empty($head_script) ? $head_script : "admin";
    $title       = !empty($title) ? $title : "WebPage";
?>
<title><?=$title ." - ". DESCRIPTION ?></title>
<!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Meta -->
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="Codedthemes">
<meta name="keywords" content="flat ui, admin flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="Codedthemes">
<!-- Favicon icon -->
<link rel="icon" href="<?=asset(BASE_ADMIN_ASSET."assets/images/favicon.ico")?>" type="image/x-icon">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/plugins/bootstrap/dist/css/bootstrap.min.css")?>">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/icon/themify-icons/themify-icons.css")?>">
<link href="<?=asset(BASE_ADMIN_ASSET."assets/css/jquery-ui.min.css")?>" rel="stylesheet" type="text/css" />
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/icon/icofont/css/icofont.css")?>">
<!-- flag icon framework css -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/pages/flag-icon/flag-icon.min.css")?>">
<!-- Menu-Search css -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/pages/menu-search/css/component.css")?>">
<!-- amchart css -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/pages/dashboard/amchart/css/amchart.css")?>">
<!-- Horizontal Timeline -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/pages/dashboard/horizontal-timeline/css/style.css")?>">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/css/style.css")?>">
<!--color css-->
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/css/linearicons.css")?>" >
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/css/simple-line-icons.css")?>">
<link rel="stylesheet" type="text/css" href="<?=asset(BASE_ADMIN_ASSET."assets/css/jquery.mCustomScrollbar.css")?>">
<!-- Datatables -->
<script type="text/javascript" src="<?=asset(BASE_ADMIN_ASSET."assets/plugins/DataTables/datatables.min.js")?>"></script>
<link rel="stylesheet" type="text/css" href="<?=asset("resources/assets/plugins/DataTables/datatables.min.css")?>">
<link rel="stylesheet" type='text/css' href="<?=asset(BASE_ADMIN_ASSET."assets/plugins/jquery-ui/themes/base/jquery-ui.min.css")?>" > 

<script type="text/javascript" src="<?=asset(BASE_ADMIN_ASSET."assets/plugins/jquery/dist/jquery.min.js")?>"></script>
<script type="text/javascript" src="<?=asset(BASE_ADMIN_ASSET."assets/plugins/jquery-ui/jquery-ui.min.js")?>"></script>
<script type="text/javascript" src="<?=asset(BASE_ADMIN_ASSET."assets/plugins/tether/dist/js/tether.min.js")?>"></script>
<script type="text/javascript" src="<?=asset(BASE_ADMIN_ASSET."assets/plugins/bootstrap/dist/js/bootstrap.min.js")?>"></script>
<script type="text/javascript" src="<?=asset("resources/assets/plugins/DataTables/datatables.min.js")?>"></script>