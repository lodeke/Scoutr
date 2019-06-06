<?php
/**
 * Created by PhpStorm.
 * User: Mayank Singh
 * Date: 5/11/2019
 * Time: 1:07 AM
 */
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="zcBFhjQSSuLRQj2AI2qd6XeO6ZtOf8l9I84MroHggCqbjjXhbVlyp-gjZbMRGKm2IeWcqz5Pgw5mtEPH26PDQA==">
    <title>Admin Dashboard</title>
    <link href="/lovedate/backend/web/themes/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/lovedate/backend/web/themes/assets/css/ready.min.css" rel="stylesheet">
    <link href="/lovedate/backend/web/themes/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <script src="/lovedate/backend/web/assets/136fcd98/yii.js"></script>
    <script src="/lovedate/backend/web/themes/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Montserrat:100,200,300,400,500,600,700,800,900"]},
            custom: {"families":["Flaticon", "LineAwesome"], urls: ['/lovedate/backend/web/themes/assets/css/fonts.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- Fonts and icons -->

</head>
<body>
<div class="wrapper">
    <div class="main-header ">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <!--
                Tip 1: You can change the background color of the logo header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
            -->
            <a href="/lovedate/backend/web/site/index" class="big-logo">
                &nbsp;
            </a>
            <a href="/lovedate/backend/web/site/index" class="logo">
                <img style="max-width: 160px;max-height: 40px" src="/lovedate/frontend/web/images/site/logo/8421550407438.png" alt="navbar brand" class="navbar-brand">
            </a>
            <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="la la-bars"></i>
					</span>
            </button>
            <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
        </div>
        <!-- End Logo Header -->

        <!-- Navbar Header -->
        <nav class="navbar navbar-header navbar-expand-lg" data-background-color="green">
            <!--
                Tip 1: You can change the background color of the navbar header using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
            -->
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button class="btn btn-minimize btn-rounded">
                        <i class="la la-navicon"></i>
                    </button>
                </div>

                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item toggle-nav-search hidden-caret">
                        <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
                            <i class="flaticon-search-1"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="flaticon-alarm"></i>
                            <span class="notification">
                                                           </span>
                        </a>
                        <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                            <li>
                                <div class="dropdown-title">You have  new notification</div>
                            </li>
                            <li>
                                <div class="notif-center">


                                </div>
                            </li>
                            <li>
                                <a class="see-all" href="/lovedate/backend/web/notifications/index">See all notifications<i class="la la-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown hidden-caret">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <i style="font-size: 26px;color: #fff;" class="flaticon-customer-support"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <li>
                                <div class="user-box">
                                    <div class="u-text">
                                        <h4>Admin</h4>
                                        <p class="text-muted">
                                            yoyo@gmail.com                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/lovedate/backend/web/settings/admin">
                                    Admin Settings
                                </a>
                                <a class="dropdown-item" href="/lovedate/backend/web/settings/site">Site Settings</a>
                                <a class="dropdown-item" href="/lovedate/backend/web/settings/default">Default Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/lovedate/backend/web/contact/index">Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-method="POST" href="/lovedate/backend/web/site/logout">Logout</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- End Navbar -->
    </div>

    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
        <!--
            Tip 1: You can change the background color of the sidebar using: data-background-color="black | dark | blue | purple | light-blue | green | orange | red"
            Tip 2: you can also add an image using data-image attribute
        -->
        <div class="sidebar-background"></div>
        <div class="scroll-wrapper sidebar-wrapper scrollbar-inner" style="position: relative;">

            <div class="sidebar-content">

                <ul class="nav">
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/site/index">
                            <i class="flaticon-home"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Users</h4>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/user/index">
                            <i class="flaticon-users"></i>
                            <p>USERS</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/user/images">
                            <i class="flaticon-diagram"></i>
                            <p>IMAGE GALLERY</p>
                        </a>
                    </li>

                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">MODELs</h4>
                    </li>

                    <li class="nav-item">
                        <a href="/lovedate/backend/web/settings/adsense">
                            <i class="flaticon-credit-card-1"></i>
                            <p>Adsense</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/payment/vip-plan">
                            <i class="flaticon-price-tag"></i>
                            <p>Vip Plan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/currency/index">
                            <i class="flaticon-coins"></i>
                            <p>currency</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/payment/index">
                            <i class="flaticon-paypal"></i>
                            <p>Payment Account</p>
                        </a>
                    </li>


                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Localise Settings</h4>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#location">
                            <i class="flaticon-location"></i>
                            <p>Location</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="location">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="/lovedate/backend/web/location/city">
                                        <span class="sub-item">Cities</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/lovedate/backend/web/location/state">
                                        <span class="sub-item">States</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/lovedate/backend/web/location/country">
                                        <span class="sub-item">Country</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Common Settings</h4>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/settings/encounter">
                            <i class="flaticon-like-1"></i>
                            <p>Encounter Settings</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/settings/default">
                            <i class="flaticon-laptop"></i>
                            <p>Theme Selection</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/gift/index">
                            <i class="la la-gift"></i>
                            <p>Gift Selection</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/payment/coin">
                            <i class="la la-money"></i>
                            <p>Coin Price</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="collapse" href="#123478S">
                            <i class="flaticon-settings"></i>
                            <p>Settings</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="123478S">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="/lovedate/backend/web/settings/site">
                                        <span class="sub-item">Logo & Others</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/lovedate/backend/web/settings/default">
                                        <span class="sub-item">Default Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/lovedate/backend/web/settings/api">
                                        <span class="sub-item">Api Keys Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/lovedate/backend/web/contact/index">
                                        <span class="sub-item">Contact Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/lovedate/backend/web/settings/faq">
                                        <span class="sub-item">FAQ</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="la la-ellipsis-h"></i>
							</span>
                        <h4 class="text-section">Others</h4>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/faker/index">
                            <i class="flaticon-pen"></i>
                            <p>Faker</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/pages/index">
                            <i class="flaticon-pen"></i>
                            <p>Pages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/lovedate/backend/web/statics/index">
                            <i class="flaticon-analytics"></i>
                            <p>Site Statics</p>
                        </a>
                    </li>



                </ul>
            </div>
        </div>
    </div>
    <!-- End Sidebar -->
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="page-header">

                    <h4 class="page-title">Admin Dashboard</h4>

                </div>
                <div class="row">


                    <div class="row col-12">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-interface"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Page View</p>
                                                <h4 class="card-title">1</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Members</p>
                                                <h4 class="card-title">4</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-success card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-gift"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Gift</p>
                                                <h4 class="card-title">44</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-secondary card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user-2"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Vip User</p>
                                                <h4 class="card-title">0</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-12 mb-12">
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-round">
                                    <div class="card-body">
                                        <div class="card-title">Top Five New People</div>
                                        <div class="card-list">
                                            <div class="item-list">
                                                <img src="/lovedate/frontend/web/images/users/6681556743763.jpg" alt="users" class="small-pic">
                                                <div class="info-user ml-3">
                                                    <div class="username">raju</div>
                                                    <div class="status">9 days </div>
                                                </div>
                                                <a href="/lovedate/backend/web/user/detail/4" class="btn btn-add">
                                                    <i class="flaticon-medical"></i>
                                                </a>
                                            </div>
                                            <div class="item-list">
                                                <img src="/lovedate/frontend/web/images/users/2471556743668.jpg" alt="users" class="small-pic">
                                                <div class="info-user ml-3">
                                                    <div class="username"></div>
                                                    <div class="status">9 days </div>
                                                </div>
                                                <a href="/lovedate/backend/web/user/detail/3" class="btn btn-add">
                                                    <i class="flaticon-medical"></i>
                                                </a>
                                            </div>
                                            <div class="item-list">
                                                <img src="/lovedate/frontend/web/images/users/8601556743476.jpg" alt="users" class="small-pic">
                                                <div class="info-user ml-3">
                                                    <div class="username"></div>
                                                    <div class="status">9 days </div>
                                                </div>
                                                <a href="/lovedate/backend/web/user/detail/2" class="btn btn-add">
                                                    <i class="flaticon-medical"></i>
                                                </a>
                                            </div>
                                            <div class="item-list">
                                                <img src="/lovedate/frontend/web/images/users/9471556731682.jpg" alt="users" class="small-pic">
                                                <div class="info-user ml-3">
                                                    <div class="username">rohan3</div>
                                                    <div class="status">9 days </div>
                                                </div>
                                                <a href="/lovedate/backend/web/user/detail/1" class="btn btn-add">
                                                    <i class="flaticon-medical"></i>
                                                </a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card card-round">
                                    <div class="card-body">
                                        <div class="card-title">Latest Website Statistics</div>
                                        <table class="table">
                                            <tr>
                                                <th>Visitor Agent</th>
                                                <th>Visitor Browser</th>
                                                <th>Visitor System</th>
                                                <th>Visitor iP</th>
                                                <th>Visitor City / Country</th>
                                                <th>Refer Url</th>

                                            </tr>
                                            <tr>

                                                <td>Windows NT 4.0</td>
                                                <td>Firefox</td>
                                                <td> DESKTOP-NN51V03</td>
                                                <td> ::1</td>
                                                <td>null - null</td>
                                                <td>
                                                    <a target="_blank" href="null">
                                                        null                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="quick-sidebar">
        <a href="#" class="close-quick-sidebar">
            <i class="flaticon-cross"></i>
        </a>
        <div class="quick-sidebar-wrapper">
            <ul class="nav nav-tabs nav-line nav-color-primary" role="tablist">
                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Messages</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Tasks</a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
                    <div class="messages-contact">
                        <div class="quick-wrapper">
                            <div class="quick-scroll scrollbar-outer">
                                <div class="quick-content contact-content">
                                    <span class="category-title mt-0">Recent</span>
                                    <div class="contact-list contact-list-recent">
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="/lovedate/backend/web/themes/assets/img/jm_denis.jpg" alt="denis">
                                                    <span class="status online"></span>
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">Jimmy Denis</span>
                                                    <span class="message">How are you ?</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="/lovedate/backend/web/themes/assets/img/chadengle.jpg" alt="chad">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">Chad</span>
                                                    <span class="message">Ok, Thanks !</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="/lovedate/backend/web/themes/assets/img/mlane.jpg" alt="john doe">
                                                    <span class="status offline"></span>
                                                </div>
                                                <div class="user-data">
                                                    <span class="name">John Doe</span>
                                                    <span class="message">Ready for the meeting today with...</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <span class="category-title">Contacts</span>
                                    <div class="contact-list">
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="/lovedate/backend/web/themes/assets/img/jm_denis.jpg" alt="denis">
                                                    <span class="status"></span>
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Jimmy Denis</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="/lovedate/backend/web/themes/assets/img/chadengle.jpg" alt="chad">
                                                    <span class="status away"></span>
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Chad</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="user">
                                            <a href="#">
                                                <div class="user-image">
                                                    <img src="/lovedate/backend/web/themes/assets/img/talha.jpg" alt="talha">
                                                    <span class="status offline"></span>
                                                </div>
                                                <div class="user-data2">
                                                    <span class="name">Talha</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="messages-wrapper">
                        <div class="messages-title">
                            <div class="user">
                                <img src="/lovedate/backend/web/themes/assets/img/chadengle.jpg" alt="chad">
                                <span class="name">Chad</span>
                                <span class="last-active">Active 2h ago</span>
                            </div>
                            <button class="return">
                                <i class="flaticon-left-arrow-3"></i>
                            </button>
                        </div>
                        <div class="messages-body messages-scroll scrollbar-outer">
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="message-pic">
                                        <img src="/lovedate/backend/web/themes/assets/img/chadengle.jpg" alt="chad">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">Hello, Rian</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-out">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="content">
                                                Hello, Chad
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="message-pic">
                                        <img src="/lovedate/backend/web/themes/assets/img/chadengle.jpg" alt="chad">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">
                                                When is the deadline of the project we are working on ?
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-out">
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="content">
                                                The deadline is about 2 months away
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="message-content-wrapper">
                                <div class="message message-in">
                                    <div class="message-pic">
                                        <img src="/lovedate/backend/web/themes/assets/img/chadengle.jpg" alt="chad">
                                    </div>
                                    <div class="message-body">
                                        <div class="message-content">
                                            <div class="name">Chad</div>
                                            <div class="content">
                                                Ok, Thanks !
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="messages-form">
                            <div class="messages-form-control">
                                <input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
                            </div>
                            <div class="messages-form-tool">
                                <a href="#" class="attachment">
                                    <i class="flaticon-file"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tasks" role="tabpanel">
                    <div class="tasks-wrapper">
                        <div class="tasks-scroll scrollbar-outer">
                            <div class="tasks-content">
                                <span class="category-title mt-0">Today</span>
                                <ul class="tasks-list">
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planning new project structure</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Add new Post</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Finalise the design proposal</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                </ul>

                                <span class="category-title">Tomorrow</span>
                                <ul class="tasks-list">
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub							</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="custom-checkbox custom-control checkbox-secondary">
                                            <input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space!				</span>
                                            <span class="task-action">
													<a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
												</span>
                                        </label>
                                    </li>
                                </ul>

                                <div class="mt-3">
                                    <div class="btn btn-primary btn-rounded btn-sm">
											<span class="btn-label">
												<i class="la la-plus"></i>
											</span>
                                        Add Task
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="settings" role="tabpanel">
                    <div class="quick-wrapper settings-wrapper">
                        <div class="quick-scroll scrollbar-outer">
                            <div class="quick-content settings-content">

                                <span class="category-title mt-0">General Settings</span>
                                <ul class="settings-list">
                                    <li>
                                        <span class="item-label">Enable Notifications</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Signin with social media</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Backup storage</span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">SMS Alert</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                </ul>

                                <span class="category-title mt-0">Notifications</span>
                                <ul class="settings-list">
                                    <li>
                                        <span class="item-label">Email Notifications</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">New Comments</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Chat Messages</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">Project Updates </span>
                                        <div class="item-control">
                                            <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                    <li>
                                        <span class="item-label">New Tasks</span>
                                        <div class="item-control">
                                            <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Custom template -->

</div>


<!-- jQuery 2.1.4 -->
<script src="/lovedate/backend/web/themes/assets/js/core/jquery.3.2.1.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="/lovedate/backend/web/themes/assets/js/core/bootstrap.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/core/popper.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/core/bootstrap.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/moment/moment.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/chart.js/chart.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/gmaps/gmaps.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/dropzone/dropzone.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/summernote/summernote-bs4.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/select2/select2.full.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/plugin/sweetalert/sweetalert.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/ready.min.js"></script>
<script src="/lovedate/backend/web/themes/assets/js/ajax.js"></script>



</body>
</html>
