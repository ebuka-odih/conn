<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="description" content="{{ env('APP_NAME') }}- Personal Portfolio">
    <meta name="author" content="{{ env('APP_NAME') }} - Personal Portfolio">
    <meta name="keywords" content="{{ env('APP_NAME') }} - Personal Portfolio">

    <!-- Favicon -->
    <link rel="icon" href="../main/assets/img/brand/favicon.ico" type="image/x-icon" />

    <!-- Title -->
    <title>{{ env('APP_NAME') }} - Trading Center</title>

    <!-- Bootstrap css-->
    <link id="style" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Icons css-->
    <link href="../main/assets/web-fonts/icons.css" rel="stylesheet" />
    <link href="{{ asset('client/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/plugin.css') }}" rel="stylesheet" />

    <!-- Style css-->
    <link href="{{ asset('client/css/1style.css') }}" rel="stylesheet">
    <link href="{{ asset('client/css/plugins.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/sweetalert2.min.css') }}">
    <!-- INTERNAL Switcher css -->
    <link href="{{ asset('client/css/switcher.css') }}" rel="stylesheet" />
    <link href="{{ asset('client/css/demo.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</head>

<body class="main-body leftmenu ltr dark-theme dark-menu">
<style>
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(1), div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(2), div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:nth-of-type(3){display:none;}

    div#google_translate_element div.goog-te-gadget-simple {margin:0px; padding:10px; display:inline-block; background-color:#000000; border:1px solid #000;}
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value {color:white;}
    div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value::after{content:"Translate Site"; padding-right:5px;}

    div#google_translate_element div.goog-te-gadget-simple img:nth-of-type(1) {display:none;}

</style>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



<!-- Page -->
<div  class="page">

    <style>
        .button {
            float: left;
            margin: 15px 15px 15px 15px;
            width: 100px;
            height: 40px;
            position: relative;
            display: block;
            margin: 0 auto;
        }

        .button label,
        .button input {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .button input[type="radio"] {
            opacity: 0.011;
            z-index: 100;
        }

        .button input[type="radio"]:checked + label {
            background: transparent;
            border-radius: 4px;
        }

        .button label {
            cursor: pointer;
            z-index: 90;
            line-height: 1.8em;
            width: 100px;
            height: 40px;
        }

    </style>
    <!-- Main Content-->
    <div  class="main-content side-content pt-0">

        <div class="container mt-5">
          <div class="card" >
              <div class="card-header">
                  <h3 class="text-center">{{ env("APP_NAME") }}</h3>
              </div>
              <div class="card-body">
                <div class="col-md-8 offset-lg-2">
                    <h4 class="mb-4">Welcome Back, Sign In</h4>
                    <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                          </div>
                          <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>
                            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
                        <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                        </form>
                </div>
              </div>
          </div>
     </div>


    </div>



</div>

    <!-- End Page -->
    <script src="sweetalert2/sweetalert2.min.js"></script>
    <!-- Jquery js-->
    <script src="{{ asset('client/js/jquery.min.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('client/js/popper.min.js') }}"></script>
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>

    <!-- Select2 js-->
    <script src="{{ asset('client/js/select2.min.js') }}"></script>

    <!-- INTERNAL Data tables js-->
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="../main/assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="{{ asset('client/dataTables.responsive.min.js') }}"></script>

    <!-- Perfect-scrollbar js -->
    <script src="../main/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('client/js/pscroll1.js') }}"></script>

    <!-- Apex charts js -->
    <script src="{{ asset('client/js/apexcharts.js') }}"></script>

    <script src="{{ asset('client/js/form-elements.js') }}"></script>

    <!-- Sidemenu js -->
    <script src="{{ asset('client/js/sidemenu.js') }}"></script>

    <!-- Internal Fileuploads js-->
    <script src="{{ asset('client/js/fileupload.js') }}"></script>
    <script src="{{ asset('client/js/file-upload.js') }}"></script>


    <!-- Internal Clipboard js-->
    <script src="{{ asset('client/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('client/js/clipboard.js') }}"></script>

    <!-- Sidebar js -->
    <script src="{{ asset('client/js/sidebar.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('client/js/sticky.js') }}"></script>

    <!-- Internal Dashboard js-->
    <script src="{{ asset('client/js/index.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('client/js/circle-progress.min.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('client/js/themeColors.js') }}"></script>

    <!-- swither styles js -->
    <script src="{{ asset('client/js/swither-styles.js') }}"></script>

    <!-- Custom js -->
    <script src="{{ asset('client/js/custom.js') }}"></script>



</body>

</html>
