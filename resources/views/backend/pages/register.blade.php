<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>G-SCOLAIRE | Register</title>
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
		<form class="container container-login animated fadeIn" method="POST" action="{{ route('users.storeUser') }}">
			@csrf
			<h3 class="text-center">G-SCOLAIRE</h3>
			<div class="login-form">
				<div class="form-group form-floating-label">
					<input  id="nom" name="nom" type="text" class="form-control input-border-bottom" required>
					<label for="nom" class="placeholder">Nom</label>
				</div>
				<div class="form-group form-floating-label">
					<input  id="prenom" name="prenom" type="text" class="form-control input-border-bottom" required>
					<label for="prenom" class="placeholder">Prenom(s)</label>
				</div>
				<div class="form-group form-floating-label">
					<input  id="username" name="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
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
				<div class="form-group form-floating-label">
					<input  id="confirmpassword" name="confirm-password" type="password" class="form-control input-border-bottom" required>
					<label for="confirmpassword" class="placeholder">Confirmer le mot de passe</label>
					<div class="show-password">
						<i class="flaticon-interface"></i>
					</div>
				</div>

				<div class="form-action">

					 <button type="submit" class="btn btn-primary btn-rounded btn-login" id="inscription">
                                   S'inscrire
                       </button>
				</div>
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
                text: "Vous etes connectez sur AFRICAIN!",
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