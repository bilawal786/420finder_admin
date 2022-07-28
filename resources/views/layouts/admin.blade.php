<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="https://420finder.net/assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://420finder.net/assets/img/logo.png">
    <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/toastr/toastr.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Loader CSS -->
    {{-- <link href="{{ asset('assets/vendor/loader/css/introLoader.css') }}" rel="stylesheet"> --}}
    <!-- End Loader CSS -->

    {{-- <link rel="stylesheet" href="{{ asset('admin/css/tags.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('css/tags.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    @yield('styles')
</head>
<body>
  <div id="element" class="introLoading"></div>
    <div id="wrapper">

        @if(!empty(session('admin_id')))

            <!-- NAVBAR -->
          @include('partials/top-nav')
          <!-- END NAVBAR -->

          <!-- LEFT SIDEBAR -->
          @include('partials/side-nav')
          <!-- END LEFT SIDEBAR -->

        @else
            @if(Request::url() != route('login'))
                <script>
                    window.location.href = "{{route('login')}}";
                </script>
            @endif
        @endif
        <div class="main">
            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN -->
        <div class="clearfix"></div>
        <footer>
            <div class="container-fluid">
                <!-- <p class="copyright">Designed & Developed by <i class="fa fa-love"></i><a href="https://www.codingclips.com/" target="_blank" class="text-red">Coding Clips</a>
                </p> -->
            </div>
        </footer>
    </div>
    <!-- Javascript -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chartist/js/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>
    <script src="{{ asset('assets/vendor/toastr/toastr.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Loader JS -->
    <script src="{{ asset('assets/vendor/loader/helpers/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('assets/vendor/loader/helpers/spin.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/loader/jquery.introLoader.js') }}"></script>

    <!-- End Loader JS -->
    <script>
        $(document).ready(function() {
            $('.selectOne').select2({
                placeholder: "Select",
                allowClear: true
            });
            $('.selectTwo').select2({
                placeholder: "Select",
                allowClear: true
            });
        });
    </script>
    <script>

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif

    </script>
    <script>
        toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": false,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
    </script>
    <script>
        $(document).ready( function () {
            $('#DataTable').DataTable();
            $('#DataTable2').DataTable();
            $('#DataTable3').DataTable();
        } );
    </script>
    <script src="https://cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('editor1');
      CKEDITOR.replace('editor2');
    </script>
    <script>
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>

    <!-- Runtime Image Code -->
    <script>
        $("#featuredImage").change(function(e) {
            $(".rmvImg").remove();
            for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {

                var file = e.originalEvent.srcElement.files[i];

                var img = document.createElement("img");
                img.classList.add('rmvImg');
                var reader = new FileReader();
                reader.onloadend = function() {
                    img.src = reader.result;
                }
                reader.readAsDataURL(file);
                $("#featuredImage").before(img);
            }
        });
    </script>

    @yield('scripts')
    @stack('scripts')

</body>
</html>
