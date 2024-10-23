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
    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = '89f8da30c65d30b73115b7469d78002a215c6256';
        window.smartsupp || (function(d) {
            var s, c, o = smartsupp = function() {
                o._.push(arguments)
            };
            o._ = [];
            s = d.getElementsByTagName('script')[0];
            c = d.createElement('script');
            c.type = 'text/javascript';
            c.charset = 'utf-8';
            c.async = true;
            c.src = 'https://www.smartsuppchat.com/loader.js?';
            s.parentNode.insertBefore(c, s);
        })(document);
    </script>
    <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

</body>

</html>
