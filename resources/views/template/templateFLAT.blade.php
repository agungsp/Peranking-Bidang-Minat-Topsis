<!DOCTYPE html>
<html>
    <head>
    	<meta charset="utf8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    	<!-- Apple devices fullscreen -->
    	<meta name="apple-mobile-web-app-capable" content="yes">
    	<!-- Apple devices fullscreen -->
    	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent">
    	<!-- Bootstrap -->
    	<link rel="stylesheet" href="/flat-template/css/bootstrap.min.css">
    	<!-- Bootstrap responsive -->
    	<link rel="stylesheet" href="/flat-template/css/bootstrap-responsive.min.css">
    	<!-- jQuery UI -->
    	<link rel="stylesheet" href="/flat-template/css/plugins/jquery-ui/smoothness/jquery-ui.css">
    	<link rel="stylesheet" href="/flat-template/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css">
    	<!-- Theme CSS -->
    	<link rel="stylesheet" href="/flat-template/css/style.css">
    	<!-- Favicon -->
    	<link rel="shortcut icon" href="/flat-template/img/favicon.ico">
    	<!-- Apple devices Homescreen icon -->
    	<link rel="apple-touch-icon-precomposed" href="/flat-template/img/apple-touch-icon-precomposed.png">
        @yield('css')

        <!-- jQuery -->
    	<script src="/flat-template/js/jquery.min.js"></script>
    	<!-- jQuery UI -->
    	<script src="/flat-template/js/plugins/jquery-ui/jquery.ui.core.min.js"></script>
    	<script src="/flat-template/js/plugins/jquery-ui/jquery.ui.widget.min.js"></script>
    	<script src="/flat-template/js/plugins/jquery-ui/jquery.ui.mouse.min.js"></script>
    	<script src="/flat-template/js/plugins/jquery-ui/jquery.ui.draggable.min.js"></script>
    	<script src="/flat-template/js/plugins/jquery-ui/jquery.ui.resizable.min.js"></script>
    	<!-- Touch enable for jquery UI -->
    	<script src="/flat-template/js/plugins/touch-punch/jquery.touch-punch.min.js"></script>
    	<!-- slimScroll -->
    	<script src="/flat-template/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    	<!-- Bootstrap -->
    	<script src="/flat-template/js/bootstrap.min.js"></script>
    	<!-- Bootbox -->
    	<script src="/flat-template/js/plugins/bootbox/jquery.bootbox.js"></script>
        <!-- Bootbox -->
    	<script src="/flat-template/js/plugins/form/jquery.form.min.js"></script>

    	<!-- Theme framework -->
    	<script src="/flat-template/js/eakroko.min.js"></script>
    	<!-- Theme scripts -->
    	<script src="/flat-template/js/application.min.js"></script>
        <title>@yield('title') - Peranking Bidang Minat [Skripsi]</title>
    </head>

    <body>
        <div id="navigation" class="">
            <div class="container-fluid">
                <a href="/" id="brand">PBM</a>
                {{-- <a href="#" class="toggle-nav" rel="tooltip" data-placement="bottom" title="Toggle navigation"><i class="icon-reorder"></i></a> --}}
                {{-- <ul class="main-nav">
                    <li class="active">
                        <a href="index.html">
                            <i class="icon-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                            <i class="icon-th-large"></i>
                            <span>Components</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="components-messages.html">Messages &amp; Chat</a>
                            </li>
                        </ul>
                    </li>
                </ul> --}}
                <div class="user">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">[User]<img src="/flat-template/img/demo/user-avatar.jpg" alt=""></a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="more-login.html">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="mobile-nav">
                <li>
                    <a href="index.html">Dashboard</a>
                </li>
                <li>
                    <a href="#">Components<i class="icon-angle-down"></i></a>
                    <ul class="open">
                        <li>
                            <a href="components-messages.html">Messages &amp; Chat</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="container" id="content">
            <div style="margin-left: 7%; margin-right: 7%;">
                @yield('content')
            </div>
        </div>
		<script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-38620714-4']);
            _gaq.push(['_trackPageview']);
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
        <div class="jqvmap-label"></div>
        @yield('js')
    </body>
</html>
