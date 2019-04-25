<!DOCTYPE html>
<html>  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <title>Shopping Hermo Test</title>

    <!-- Essential styles -->

    <link href="{{ URL::asset('landing/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('landing/font-awesome/css/font-awesome.min.css') }}" type="text/css"> 
    <link rel="stylesheet" href="{{ URL::asset('landing/assets/fancybox/jquery.fancybox.css?v=2.1.5') }}" media="screen"> 

    <!-- Boomerang styles -->
    <link id="wpStylesheet" type="text/css" href="{{ URL::asset('landing/css/global-style.css')}}" rel="stylesheet" media="screen">


    <!-- Favicon -->
    <link href="{{ URL::asset('landing/images/favicon.png') }}" rel="icon" type="image/png">


    <!-- Assets -->
    <link rel="stylesheet" href="{{ URL::asset('landing/assets/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('landing/owl-carousel/owl.theme.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('landing/assets/sky-forms/css/sky-forms.css')}}">    
    <!--[if lt IE 9]>
        <link rel="stylesheet" href="assets/sky-forms/css/sky-forms-ie8.css">
        <![endif]-->

        <!-- Required JS -->
        <script src="{{ URL::asset('landing/js/jquery.js')}}"></script>
        <script src="{{ URL::asset('landing/js/jquery-ui.min.js')}}"></script>

        <!-- Page scripts -->
        <link rel="stylesheet" href="{{ URL::asset('landing/assets/ui-kit/css/jslider.css') }}">

    </head>
<!-- Body BEGIN -->
<body class="">
    <div class="body-wrap">

        <?php echo $content; ?>
    </div>

                <!-- MAIN CONTENT -->


            

            <!-- FOOTER -->

    </div>

    <!-- Essentials -->
    <script src="{{ URL::asset('landing/js/modernizr.custom.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('landing/js/jquery.mousewheel-3.0.6.pack.js')}}"></script>
    <script src="{{ URL::asset('landing/js/jquery.easing.js')}}"></script>
    <script src="{{ URL::asset('landing/js/jquery.metadata.js')}}"></script>
    <script src="{{ URL::asset('landing/js/jquery.hoverup.js')}}"></script>
    <script src="{{ URL::asset('landing/js/jquery.hoverdir.js')}}"></script>
    <script src="{{ URL::asset('landing/js/jquery.stellar.js')}}"></script>

    <!-- Boomerang mobile nav - Optional  -->
    <script src="{{ URL::asset('landing/assets/responsive-mobile-nav/js/jquery.dlmenu.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/responsive-mobile-nav/js/jquery.dlmenu.autofill.js')}}"></script>

    <!-- Forms -->
    <script src="{{ URL::asset('landing/assets/ui-kit/js/jquery.powerful-placeholder.min.js')}}"></script> 
    <script src="{{ URL::asset('landing/assets/ui-kit/js/cusel.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/sky-forms/js/jquery.form.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/sky-forms/js/jquery.validate.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/sky-forms/js/jquery.maskedinput.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/sky-forms/js/jquery.modal.js')}}"></script>

    <!-- Assets -->
    <script src="{{ URL::asset('landing/assets/hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/page-scroller/jquery.ui.totop.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/mixitup/jquery.mixitup.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/mixitup/jquery.mixitup.init.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/fancybox/jquery.fancybox.pack.js?v=2.1.5')}}"></script>
    <script src="{{ URL::asset('landing/assets/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/milestone-counter/jquery.countTo.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/easy-pie-chart/js/jquery.easypiechart.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/social-buttons/js/rrssb.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/nouislider/js/jquery.nouislider.min.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/bootstrap/js/tooltip.js')}}"></script>
    <script src="{{ URL::asset('landing/assets/bootstrap/js/popover.js')}}"></script>

    <!-- Sripts for individual pages, depending on what plug-ins are used -->

    <!-- Boomerang App JS -->
    <script src="{{ URL::asset('landing/js/wp.app.js')}}"></script>
<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- Temp -- You can remove this once you started to work on your project -->
    <script src="{{ URL::asset('landing/js/jquery.cookie.js')}}"></script>
    <script src="{{ URL::asset('landing/js/wp.switcher.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('landing/js/wp.ga.js')}}"></script>
    <link href="{{ URL::asset('landing/assets/css/sweetalert.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('landing/assets/js/sweetalert.min.js') }}"></script>
</body>
<!-- END BODY -->
</html>