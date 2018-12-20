<!DOCTYPE html>
<html lang="en" class="no-js">  
    <head>
        <title>Administrasi Desa - Login</title>
        
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="Kemendagri" name="description" />
        <meta content="http://edi-profile.co.nf" name="author" />

        <link rel="shortcut icon" href="{{ asset('assets/images/admin.png') }}" />
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}"  media="screen">
        
        <link rel="stylesheet" href="{{ asset('assets/css/main-responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/skin.css') }}" id="skin_color">
        <link rel="stylesheet" href="{{ asset('assets/plugins/iCheck/skins/all.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css') }}"> 

    </head>
    <body class="login">

        @yield('main')

        <script src="{{ asset('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
        <script src="{{ asset('assets/js/login.js') }}"></script>
        <script>
            jQuery(document).ready(function() {
                Main.init();
                Login.init();
            });
        </script>   
    </body>
</html>




