<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>My BKM</title>

	<!-- General CSS Files -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- CSS Libraries -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/node_modules/jqvmap/dist/jqvmap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/node_modules/summernote/dist/summernote-bs4.css">
	<!-- <link rel="stylesheet" href="<?= base_url('assets') ?>/node_modules/owlcarousel2/dist/assets/owl.carousel.min.css"> -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/node_modules/owlcarousel2/dist/assets/owl.theme.default.min.css">


	<!-- Icon -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/ionicons/css/ionicons.min.css">
	<!-- Template CSS -->
	<link rel="stylesheet" href="<?= base_url('assets') ?>/css/style.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/css/components.css">
	<link rel="stylesheet" href="<?= base_url('assets') ?>/css/scroll.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">


	<style>
		.sidebar-footer {
			position: absolute;
			bottom: 0;
			width: 100%;
		}

		.sidebar-bkm-logo {
			width: 40%;
			margin: auto;
		}

		.sidebar-bkm-container {
			width: 100%;
			text-align: center;
			margin-top: 20px;
		}

		.card-profile img {
			width: 20%;
			margin: auto;
			border-radius: 50%;
			border: 3px solid #D7D7D7;
		}

		.myprofile-detail {
			text-align: left;
			font-size: 20px;
			font-weight: bold;
		}

		.logout a i span :hover {
			background-color: blue;
		}

		@media (max-width: 575.98px) {
			.card-profile img {
				width: 60%;
				margin: auto;
				border-radius: 50%;
				border: 3px solid #D7D7D7;
			}

			.myprofile-detail {
				font-size: 16px;
			}
		}
	</style>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<!-- Top Navbar -->
			<nav class="navbar navbar-expand-lg main-navbar">
				<!-- Search -->
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
						<div class="search-backdrop"></div>
						<div class="search-result">
							<div class="search-header">
								Histories
							</div>
							<div class="search-item">
								<a href="#">How to hack NASA using CSS</a>
								<a href="#" class="search-close"><i class="fas fa-times"></i></a>
							</div>
							<div class="search-item">
								<a href="#">Kodinger.com</a>
								<a href="#" class="search-close"><i class="fas fa-times"></i></a>
							</div>
							<div class="search-item">
								<a href="#">#Stisla</a>
								<a href="#" class="search-close"><i class="fas fa-times"></i></a>
							</div>
							<div class="search-header">
								Result
							</div>
							<div class="search-item">
								<a href="#">
									<img class="mr-3 rounded" width="30" src="<?= base_url('assets') ?>/img/products/product-3-50.png" alt="product">
									oPhone S9 Limited Edition
								</a>
							</div>
							<div class="search-item">
								<a href="#">
									<img class="mr-3 rounded" width="30" src="<?= base_url('assets') ?>/img/products/product-2-50.png" alt="product">
									Drone X2 New Gen-7
								</a>
							</div>
							<div class="search-item">
								<a href="#">
									<img class="mr-3 rounded" width="30" src="<?= base_url('assets') ?>/img/products/product-1-50.png" alt="product">
									Headphone Blitz
								</a>
							</div>
							<div class="search-header">
								Projects
							</div>
							<div class="search-item">
								<a href="#">
									<div class="search-icon bg-danger text-white mr-3">
										<i class="fas fa-code"></i>
									</div>
									Stisla Admin Template
								</a>
							</div>
							<div class="search-item">
								<a href="#">
									<div class="search-icon bg-primary text-white mr-3">
										<i class="fas fa-laptop"></i>
									</div>
									Create a new Homepage Design
								</a>
							</div>
						</div>
					</div>
				</form>
				<!-- Search End -->

				<!-- Message, Notification, Logout -->
				<ul class="navbar-nav navbar-right">
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right">
							<div class="dropdown-header">Messages
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-list-content dropdown-list-message">
								<a href="#" class="dropdown-item dropdown-item-unread">
									<div class="dropdown-item-avatar">
										<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-1.png" class="rounded-circle">
										<div class="is-online"></div>
									</div>
									<div class="dropdown-item-desc">
										<b>Kusnaedi</b>
										<p>Hello, Bro!</p>
										<div class="time">10 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item dropdown-item-unread">
									<div class="dropdown-item-avatar">
										<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-2.png" class="rounded-circle">
									</div>
									<div class="dropdown-item-desc">
										<b>Dedik Sugiharto</b>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
										<div class="time">12 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item dropdown-item-unread">
									<div class="dropdown-item-avatar">
										<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-3.png" class="rounded-circle">
										<div class="is-online"></div>
									</div>
									<div class="dropdown-item-desc">
										<b>Agung Ardiansyah</b>
										<p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
										<div class="time">12 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-avatar">
										<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-4.png" class="rounded-circle">
									</div>
									<div class="dropdown-item-desc">
										<b>Ardian Rahardiansyah</b>
										<p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
										<div class="time">16 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-avatar">
										<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-5.png" class="rounded-circle">
									</div>
									<div class="dropdown-item-desc">
										<b>Alfa Zulkarnain</b>
										<p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
										<div class="time">Yesterday</div>
									</div>
								</a>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right">
							<div class="dropdown-header">Notifications
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-list-content dropdown-list-icons">
								<a href="#" class="dropdown-item dropdown-item-unread">
									<div class="dropdown-item-icon bg-primary text-white">
										<i class="fas fa-code"></i>
									</div>
									<div class="dropdown-item-desc">
										Template update is available now!
										<div class="time text-primary">2 Min Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-info text-white">
										<i class="far fa-user"></i>
									</div>
									<div class="dropdown-item-desc">
										<b>You</b> and <b>Dedik Sugiharto</b> are now friends
										<div class="time">10 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-success text-white">
										<i class="fas fa-check"></i>
									</div>
									<div class="dropdown-item-desc">
										<b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
										<div class="time">12 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-danger text-white">
										<i class="fas fa-exclamation-triangle"></i>
									</div>
									<div class="dropdown-item-desc">
										Low disk space. Let's clean it!
										<div class="time">17 Hours Ago</div>
									</div>
								</a>
								<a href="#" class="dropdown-item">
									<div class="dropdown-item-icon bg-info text-white">
										<i class="fas fa-bell"></i>
									</div>
									<div class="dropdown-item-desc">
										Welcome to Stisla template!
										<div class="time">Yesterday</div>
									</div>
								</a>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-1.png" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, Ujang Maman</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>
							<a href="features-profile.html" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<a href="features-activities.html" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a href="features-settings.html" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('home/') ?>logout" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
				<!-- Message, Notification, Logout End-->
			</nav>
			<!-- Top Navbar End -->
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<!-- Sidebar Brand -->
					<div class="sidebar-bkm-container">
						<img src="<?= base_url('assets/img/bkm.png') ?>" class="sidebar-bkm-logo">
					</div>
					<div class="sidebar-brand">
						<a href="index.html">MyBKM</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="index.html">MB</a>
					</div>
					<!-- Sidebar Brand End -->

					<ul class="sidebar-menu">
						<li class="menu-header">Main Menu</li>
						<li class="active">
							<a class="nav-link" href="<?= base_url('home') ?>">
								<i class="ion ion-ios-home"></i>
								<span>Home</span>
							</a>
						</li>

						<li class="nav-item dropdown">
							<a href="#" class="nav-link has-dropdown " data-toggle="dropdown">
								<i class="ion ion-cube"></i>
								<span>Admin</span>
							</a>
							<ul class="dropdown-menu tabs">

								<li class="nav-link" data-source="a_manage_candidate" id="a_manage_candidate" menu_id="1">
									<a href="#">
										<i class="ion ion-ios-people"></i><span>Candidate List</span>
									</a>
								</li>
								<li class="nav-link" data-source="a_question" id="a_question" menu_id="2">
									<a href="#">
										<i class="ion ion-android-create"></i><span>Manage Question</span>
									</a>
								</li>
							</ul>
						</li>


						<li class="nav-item dropdown">
							<a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="ion ion-ios-paper"></i> <span>Candidate</span></a>
							<ul class="dropdown-menu">
								<li class="nav-link" data-source="c_profile" id="c_profile" menu_id="6">
									<a href="#">
										<i class="ion ion-ios-people"></i><span>My Profile</span>
									</a>
								</li>
								<li class="nav-link" data-source="home/my_profile" id="c_parent" menu_id="7">
									<a href="#">
										<i class="ion ion-android-people"></i><span>My Parent</span>
									</a>
								</li>
								<li class="nav-link" data-source="home/my_profile" id="c_document" menu_id="8">
									<a href="#">
										<i class="ion ion-android-attach"></i><span>My Document</span>
									</a>
								</li>
								<li class="nav-link" data-source="c_test" id="c_test" menu_id="9">
									<a href="#">
										<i class="ion ion-android-create"></i><span>Test</span>
									</a>
								</li>
								<li class="nav-link" data-source="home/my_profile" id="c_result_test" menu_id="10">
									<a href="#">
										<i class="ion ion-android-clipboard"></i><span>Result Test</span>
									</a>
								</li>
								<li class="nav-link" data-source="home/my_profile" id="c_interview" menu_id="11">
									<a href="#">
										<i class="ion ion-ios-eye"></i><span>Interview</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="logout">
							<a class="nav-link" href="<?= base_url('home/') ?>logout">
								<i class="fas fa-sign-out-alt"></i>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</aside>
			</div>


			<div class="main-content page-load" style="min-height: 557px;">
