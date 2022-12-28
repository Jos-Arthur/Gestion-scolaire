<!DOCTYPE html>
<html lang="en">
<head>
	@include('backend.includes.header')
    @yield('styles')
</head>
<body>
    <div id="ts-preloader-absolute53">
        <div id="tscssload-global">
            <div id="tscssload-top" class="tscssload-mask">
                <div class="tscssload-plane"></div>
            </div>
            <div id="tscssload-middle" class="tscssload-mask">
                <div class="tscssload-plane"></div>
            </div>
            <div id="tscssload-bottom" class="tscssload-mask">
                <div class="tscssload-plane"></div>
            </div>
        </div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
	<div class="wrapper">

		@include('backend.includes.nav')

        @include('backend.includes.menu')

        @yield('content')


	</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('admin/assets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('admin/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Moment JS -->
<script src="{{asset('admin/assets/js/plugin/moment/moment.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('admin/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('admin/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('admin/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- Bootstrap Toggle -->
<script src="{{asset('admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('admin/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Google Maps Plugin -->
<script src="{{asset('admin/assets/js/plugin/gmaps/gmaps.js')}}"></script>

<!-- Dropzone -->
<script src="{{asset('admin/assets/js/plugin/dropzone/dropzone.min.js')}}"></script>

<!-- Fullcalendar -->
<script src="{{asset('admin/assets/js/plugin/fullcalendar/fullcalendar.min.js')}}"></script>

<!-- DateTimePicker -->
<script src="{{asset('admin/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js')}}"></script>

<!-- Bootstrap Tagsinput -->
<script src="{{asset('admin/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>

<!-- Bootstrap Wizard -->
<script src="{{asset('admin/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js')}}"></script>

<!-- jQuery Validation -->
<script src="{{asset('admin/assets/js/plugin/jquery.validate/jquery.validate.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('admin/assets/js/plugin/summernote/summernote-bs4.min.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('admin/assets/js/plugin/select2/select2.full.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('admin/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Azzara JS -->
<script src="{{asset('admin/assets/js/ready.min.js')}}"></script>

<script src="{{asset('admin/assets/js/preloader.js')}}"></script>

<!-- Azzara DEMO methods, don't include it in your project! -->
<script src="{{asset('admin/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('admin/assets/js/demo.js')}}"></script>
    <script>
        function deconnexion(){
            swal({
                title: 'Êtes-vous sûr?',
                text: "Vous serez deconnecter!",
                type: 'info',
                buttons:{
                    confirm: {
                        text : 'Oui, deconnexion!',
                        className : 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    event.preventDefault();
                    document.getElementById('logout-form').submit();
                } else {
                    swal.close();
                }
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
