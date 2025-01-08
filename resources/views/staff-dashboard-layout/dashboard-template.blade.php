<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/lnr-icon.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Index Page</title>
</head>
<body>
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
                        <a href="employees-dashboard.html">
                            <img src="assets/img/logo.png" class="img-fluid rounded-logo" alt="logo image" width="100">
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
                                            <input type="text" class="form-control" placeholder="{{ __('search.placeholder') }}">
                                            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                <!-- More optimized content -->
                            </div>
                        </div>
                    </div>
                    <div class="d-block d-lg-none">
                        <button type="button" class="menu-style dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            <span class="lnr lnr-user d-block display-5 text-white" id="open_navSidebar"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
