<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>

    <!-- META DATA eta Data -->
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="{{ config('app.name') }} Sign up/Sign in">

    <!-- TITLE -->
    <title> {{ config('app.name') }} </title>

    <!-- FAVICON -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('build/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('build/assets/icon-fonts/icons.css') }}" rel="stylesheet">

    <!-- APP SCSS -->
    <link rel="preload" as="style" href="{{ asset('build/assets/app-fce3f544.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-fce3f544.css') }}" />

    <!-- MAIN JS -->
    <script src="{{ asset('build/assets/authentication-main.js') }}"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>


</head>

<body>



    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            @yield('content')
        </div>
    </div>



    <!-- SCRIPTS -->

    <!-- BOOTSTRAP JS -->
    <script src="build/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- SHOW PASSWORD JS -->
    <script src="build/assets/show-password.js"></script>



    <!-- END SCRIPTS -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/671fe5a42480f5b4f59545c5/1iba9i3f5';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>
