<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	@include('frontend.layouts.header')
	@yield('main-content')
	@include('frontend.layouts.notification')
	@include('frontend.layouts.footer')

</body>
</html>