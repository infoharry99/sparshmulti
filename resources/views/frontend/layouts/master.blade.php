<!DOCTYPE html>
<html lang="zxx">
<head>
	@include('frontend.layouts.head')	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		:root {
			--primary-color: {{ $settings->primary_color ?? '#3490dc' }} !important;
			--secondary-color: {{ $settings->secondary_color ?? '#ffed4a' }} !important;
			--background-color: {{ $settings->background_color ?? '#ffffff' }} 	!important;
			--text-color: {{ $settings->text_color ?? '#000000' }} !important;
		}

		body {
			background-color: var(--background-color) !important;
			color: var(--text-color) !important;
		}

		.btn-primary {
			background-color: var(--primary-color) !important;
			border-color: var(--primary-color) !important;
		}

		.btn-secondary {
			background-color: var(--secondary-color) !important;
			border-color: var(--secondary-color) !important;
		}
	</style>
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