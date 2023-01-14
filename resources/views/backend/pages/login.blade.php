<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>G-SCOLAIRE | Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('admin/assets/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{asset('admin/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['admin/assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/azzara.min.css')}}">
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<form class="container container-login animated fadeIn" method="post" action="{{ route('login') }}">
			@csrf
			<h3 class="text-center">G-SCOLAIRE</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input  id="email" name="email" type="email" class="form-control input-border-bottom" required>
					<label for="email" class="placeholder">Email</label>
				</div>
                <div class="form-group form-floating-label">
					<input  id="passwordsignin" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="passwordsignin" class="placeholder">Mot de passe</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login" id="connexion">
                           Connexion
                        </button>						
                </div>
				<div class="d-flex align-items-center justify-content-center pb-4">
					<p class="mb-0 me-2">Veuillez vous inscrire ici!</p>
					<a href="{{route('users.register')}}" type="button" class="btn btn-outline-danger">S'inscrire</a>
				  </div>
			</div>
		</form>
	</div>
	<script src="{{asset('admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
	<script src="{{asset('admin/assets/js/ready.js')}}"></script>
	<!-- Sweet Alert -->
	<script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<script>
		$('#connexion').click(function(){
			swal({
				title: 'Connexion',
                text: "Vous etes connectez sur G-SCOLAIRE!",
                type: 'success',
				 buttons: false,
				 timer:12000,
				})
			.then(() => {
			    dispatch(redirect('/admin/dashboard'));
			})
		});
	</script>
</body>
</html>