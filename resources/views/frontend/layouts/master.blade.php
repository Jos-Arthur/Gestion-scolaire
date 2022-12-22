<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.includes.header')
  	@yield('styles')
</head>
<body>
	<div id="app">

		<div id="main">

			@include('frontend.includes.nav')

  			@yield('content')

  			@include('frontend.includes.footer')

  			<script src="{{URL::asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
		    <script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>

		    <script src="{{URL::asset('assets/vendors/apexcharts/apexcharts.js')}}"></script>
		    <script src="{{URL::asset('assets/js/pages/dashboard.js')}}"></script>

		    <script src="{{URL::asset('assets/js/main.js')}}"></script>

		     @yield('scripts')
		           
        </div>

	</div>
</body>
</html>