<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/lnr-icon.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>Dashboard Page</title>
</head>
<body>
<div class="inner-wrapper">
<div id="loader-wrapper">
<div class="loader">
<div class="dot"></div>
<div class="dot"></div>
<div class="dot"></div>
<div class="dot"></div>
<div class="dot"></div>
</div>
</div>
<header class="header">
<div class="top-header-section">
<div class="container-fluid">
<div class="row align-items-center">
<div class="col-lg-3 col-md-3 col-sm-3 col-6">
<div class="logo my-3 my-sm-0">
<a href="/">
<img src="assets/img/logo.png" class="rounded-logo" alt="logo">
</a>
</div>
</div>
<div class="col-lg-9 col-md-9 col-sm-9 col-6 text-right">
<div class="user-block d-none d-lg-block">
<div class="row align-items-center">
<div class="col-lg-12 col-md-12 col-sm-12">
<div class="user-notification-block align-right d-inline-block">
<div class="top-nav-search">
<form>
<input type="text" class="form-control" placeholder="Search here">
<button class="btn" type="submit"><i class="fa fa-search"></i></button>
</form>
</div>
</div>
<div class="user-info align-right dropdown d-inline-block header-dropdown">
<a href="#" class="dropdown-toggle menu-style">
<div class="user-avatar d-inline-block">
<img src="assets/img/profiles/img-6.jpg" alt="user" class="rounded-circle img-fluid" width="55">
</div>
</a>
<div class="dropdown-menu notification-dropdown-menu shadow-lg border-0 p-3 m-0 dropdown-menu-right">
<a class="dropdown-item p-2" href="/view-home-page">
<span class="media align-items-center">
<span class="lnr lnr-user mr-3"></span>
<span class="media-body text-truncate">
<span class="text-truncate">Profile</span>
</span>
</span>
</a>
<a class="dropdown-item p-2" href="/view-staff-management-index">
<span class="media align-items-center">
<span class="lnr lnr-cog mr-3"></span>
<span class="media-body text-truncate">
<span class="text-truncate">Settings</span>
</span>
</span>
</a>
<a class="dropdown-item p-2" href="/handle-logout">
<span class="media align-items-center">
<span class="lnr lnr-power-switch mr-3"></span>
<span class="media-body text-truncate">
<span class="text-truncate">Logout</span>
</span>
</span>
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</header>
<div class="page-wrapper">
<div class="container-fluid">
<div class="row">
<!-- Sidebar -->
<aside class="sidebar sidebar-user">
<!-- Sidebar content -->
</aside>
<!-- Main Content -->
<div class="col-xl-9 col-lg-8 col-md-12">
<div class="quicklink-sidebar-menu ctm-border-radius shadow-sm bg-white card grow">
<div class="card-body">
<ul class="list-group list-group-horizontal-lg">
<li class="list-group-item text-center active button-5"><a href="/" class="text-white">Admin Dashboard</a></li>
<li class="list-group-item text-center button-6"><a class="text-dark" href="/">Employees Dashboard</a></li>
</ul>
</div>
</div>
<br>
@yield('dashboard-admin-content')
<div class="sidebar-overlay" id="sidebar_overlay"></div>
<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/Chart.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
