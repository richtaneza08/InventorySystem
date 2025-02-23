<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="{{ asset('assets/img/fav.png') }}" />

		<!-- Title -->
		<title>Le Rouge Admin Template - Admin Dashboard</title>

		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{ asset('assets/fonts/style.css')}}">
		<!-- Main css -->
		<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">

		<link rel="stylesheet" href="{{ asset('assets/vendor/daterange/daterange.css') }}" />

		<!-- Data Tables -->
		<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4.css')}}" />
		<link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs4-custom.css')}}" />
		<link href="{{ asset('assets/vendor/datatables/buttons.bs.css')}}" rel="stylesheet" />

	</head>

	<body>

		<!-- Loading starts -->
		{{-- <div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div> --}}
		<!-- Loading ends -->


		<!-- Page wrapper start -->
		<div class="page-wrapper">

			<!-- Sidebar wrapper start -->
			<nav id="sidebar" class="sidebar-wrapper">

				<!-- Sidebar brand start  -->
				<div class="sidebar-brand">
					<a href="index.html" class="logo">
						<img src="{{ asset('assets/img/logo.png') }}" alt="Le Rouge Admin Dashboard" />
					</a>
				</div>
				<!-- Sidebar brand end  -->

				<!-- Sidebar content start -->
				<div class="sidebar-content">

					<!-- sidebar menu start -->
					<div class="sidebar-menu">
						<ul>
							<li>
								<a href="{{ route('admin') }}">
									<i class="icon-message-circle"></i>
									<span class="menu-text">Dashboards</span>
								</a>
							</li>
							<li>
								<a href="{{ route('suppliers.index') }}">
									<i class="icon-shopping-bag"></i>
									<span class="menu-text">Supplies</span>
								</a>
							</li>
							<li>
								<a href="{{ route('orders.index') }}">
									<i class="icon-truck"></i>
									<span class="menu-text">Purchase Orders</span>
								</a>
							</li>
							<li>
								<a href="{{ route('suppliers.index') }}">
									<i class="icon-user"></i>
									<span class="menu-text">Suppliers</span>
								</a>
							</li>
							<li class="sidebar-dropdown">
								<a href="#">
									<i class="icon-grid"></i>
									<span class="menu-text">Utilities</span>
								</a>
								<div class="sidebar-submenu">
									<ul>
										<li>
											<a href="{{ route('categories.index') }}">Category</a>
										</li>
										<li>
											<a href="{{ route('products.index') }}">Products</a>
										</li>
										<li>
											<a href="{{ route('units.index') }}">Units</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
					<!-- sidebar menu end -->

				</div>
				<!-- Sidebar content end -->

			</nav>
			<!-- Sidebar wrapper end -->

			<!-- Page content start  -->
			<div class="page-content">

				<!-- Header start -->
				<header class="header">
					<div class="toggle-btns">
						<a id="toggle-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
						<a id="pin-sidebar" href="#">
							<i class="icon-list"></i>
						</a>
					</div>
					<div class="header-items">
						<!-- Custom search start -->
						<div class="custom-search">
							<input type="text" class="search-query" placeholder="Search here ...">
							<i class="icon-search1"></i>
						</div>
						<!-- Custom search end -->

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									<span class="user-name">Julie Sweet</span>
									<span class="avatar">
										<img src="{{ asset('assets/img/user24.png')}}" alt="avatar">
										<span class="status busy"></span>
									</span>
								</a>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
									<div class="header-profile-actions">
										<div class="header-user-profile">
											<div class="header-user">
												<img src="{{ asset('assets/img/user24.png')}}" alt="Admin Template">
											</div>
											<h5>Julie Sweet</h5>
											<p>Admin</p>
										</div>
										<a href="user-profile.html"><i class="icon-user1"></i> My Profile</a>
										<a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>
										<a href="login.html"><i class="icon-log-out1"></i> Sign Out</a>
									</div>
								</div>
							</li>
						</ul>
						<!-- Header actions end -->
					</div>
				</header>
				<!-- Header end -->


                @yield('content')
                @stack('modals')


            </div>
			<!-- Page content end -->

		</div>
		<!-- Page wrapper end -->

		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{ asset('assets/js/moment.js')}}"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Slimscroll JS -->
		<script src="{{ asset('assets/vendor/slimscroll/slimscroll.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/slimscroll/custom-scrollbar.js')}}"></script>

		<!-- Daterange -->
		<script src="{{ asset('assets/vendor/daterange/daterange.js')}}"></script>
		<script src="{{ asset('assets/vendor/daterange/custom-daterange.js')}}"></script>

		<!-- Polyfill JS -->
		<script src="{{ asset('assets/vendor/polyfill/polyfill.min.js')}}"></script>

		<!-- Apex Charts -->
		<script src="{{ asset('assets/vendor/apex/apexcharts.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/apex/admin/visitors.js')}}"></script>
		<script src="{{ asset('assets/vendor/apex/admin/deals.js')}}"></script>
		<script src="{{ asset('assets/vendor/apex/admin/income.js')}}"></script>
		<script src="{{ asset('assets/vendor/apex/admin/customers.js')}}"></script>

        <!-- Data Tables -->
		<script src="{{ asset('assets/vendor/datatables/dataTables.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js')}}"></script>

        <!-- Custom Data tables -->
		<script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/custom/fixedHeader.js')}}"></script>

		<!-- Download / CSV / Copy / Print -->
		<script src="{{ asset('assets/vendor/datatables/buttons.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/jszip.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/pdfmake.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/vfs_fonts.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/html5.min.js')}}"></script>
		<script src="{{ asset('assets/vendor/datatables/buttons.print.min.js')}}"></script>

		<!-- Main JS -->
		<script src="{{ asset('assets/js/main.js') }}"></script>

	</body>
</html>

