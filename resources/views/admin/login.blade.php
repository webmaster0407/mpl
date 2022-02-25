<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>{{ $page_title }}</title>
		<meta name="csrf_token" content="{{ csrf_token() }}">
		<meta name="description" content="{{ $page_description }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ asset('assets/admin/css/pages/login/classic/login-6.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('assets/admin/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('assets/admin/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('assets/admin/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/front/images/favicon//apple-touch-icon.png')}}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/front/images/favicon/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/front/images/favicon/favicon-16x16.png')}}">
		<link rel="shortcut icon" href="{{ asset('assets/front/images/favicon/favicon.ico')}}" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-6 login-signin-on login-signin-on d-flex flex-column-fluid" id="kt_login">
				<div class="d-flex flex-column flex-lg-row flex-row-fluid text-center" style="background-image: url('{{ asset('assets/admin/media/bg/bg-3.jpg')}}');">
					<!--begin:Aside-->
					<div class="d-flex w-100 flex-center p-15">
						<div class="login-wrapper">
							<!--begin:Aside Content-->
							<div class="text-dark-75">
								<h3 class="mb-8 mt-22 font-weight-bold">{{ __('JOIN TO ADMIN PANEL')}}</h3>
								<p class="mb-15 text-muted font-weight-bold">{{ __('Footer Text')}}</p>
						<!-- 		<button type="button" id="kt_login_signup" class="btn btn-outline-primary btn-pill py-4 px-9 font-weight-bold">Get An Account</button> -->
							</div>
							<!--end:Aside Content-->
						</div>
					</div>
					<!--end:Aside-->
					<!--begin:Divider-->
					<div class="login-divider">
						<div></div>
					</div>
					<!--end:Divider-->
					<!--begin:Content-->
					<div class="d-flex w-100 flex-center p-15 position-relative overflow-hidden">
						<div class="login-wrapper">
							<!--begin:Sign In Form-->
							<div class="login-signin">
								<div class="text-center mb-10 mb-lg-20">
									<h2 class="font-weight-bold">Sign In</h2>
									<p class="text-muted font-weight-bold">Enter your username and password</p>
								</div>
								<form class="form text-left" id="kt_login_signin_form">
									<div class="form-group py-2 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Username" name="username" id="username" autocomplete="off" />
									</div>
									<div class="form-group py-2 border-top m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="Password" placeholder="Password" name="password" id="password" />
									</div>
									<div class="form-group d-flex flex-wrap justify-content-between align-items-center mt-5">
										<div class="checkbox-inline">
											<label class="checkbox m-0 text-muted font-weight-bold">
											<input type="checkbox" name="remember" id="remember"/>
											<span></span>Remember me</label>
										</div>
									</div>
									<div class="text-center mt-15">
										<button id="kt_login_signin_submit" type="button" class="btn btn-primary btn-pill shadow-sm py-4 px-9 font-weight-bold">Sign In</button>
									</div>
								</form>
							</div>
							<!--end:Sign In Form-->
							<!--begin:Sign Up Form-->
<!-- 							<div class="login-signup">
								<div class="text-center mb-10 mb-lg-20">
									<h3 class="">Sign Up</h3>
									<p class="text-muted font-weight-bold">Enter your details to create your account</p>
								</div>
								<form class="form text-left" id="kt_login_signup_form">
									<div class="form-group py-2 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Fullname" name="fullname" />
									</div>
									<div class="form-group py-2 m-0 border-top">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Email" name="email" autocomplete="off" />
									</div>
									<div class="form-group py-2 m-0 border-top">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Password" name="password" />
									</div>
									<div class="form-group py-2 m-0 border-top">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="password" placeholder="Confirm Password" name="cpassword" />
									</div>
									<div class="form-group mt-5">
										<div class="checkbox-inline">
											<label class="checkbox checkbox-outline font-weight-bold">
											<input type="checkbox" name="agree" />
											<span></span>I Agree the
											<a href="#" class="ml-1">terms and conditions</a>.</label>
										</div>
									</div>
									<div class="form-group d-flex flex-wrap flex-center">
										<button id="kt_login_signup_submit" class="btn btn-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Submit</button>
										<button id="kt_login_signup_cancel" class="btn btn-outline-primary btn-pill font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
									</div>
								</form>
							</div> -->
							<!--end:Sign Up Form-->
						</div>
					</div>
					<!--end:Content-->
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ asset('assets/admin/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{ asset('assets/admin/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{ asset('assets/admin/js/scripts.bundle.js')}}"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('assets/admin/js/custom/login-general.js')}}"></script>
		<!--end::Page Scripts-->
		<script type="text/javascript">
			var loginUrl = "{{ route('admin.doLogin') }}";
			var adminHomeUrl = "{{ route('admin.home') }}";
		</script>
	</body>
	<!--end::Body-->
</html>