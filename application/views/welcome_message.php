<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('title'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- build:css(.) styles/vendor.css -->
        <!-- bower:css -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css" />
        <!-- endbower -->
        <!-- endbuild -->

        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="app/styles/main.css">
        <link rel="stylesheet" href="app/styles/sb-admin-2.css">
        <link rel="stylesheet" href="app/styles/timeline.css">
        <link rel="stylesheet" href="bower_components/metisMenu/dist/metisMenu.min.css">
        <link rel="stylesheet" href="bower_components/angular-loading-bar/build/loading-bar.min.css">
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css" type="text/css">


        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/angular_material/0.9.4/angular-material.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">


        <link rel="stylesheet" href="bower_components/kendo-ui-core/styles/kendo.common-material.min.css" type="text/css">
        <link rel="stylesheet" href="bower_components/kendo-ui-core/styles/kendo.material.min.css" type="text/css">

        <!-- endbuild -->
        <script>
            var BASE_URL = "<?php echo site_url(); ?>";
        </script>
        <!-- build:js(.) scripts/vendor.js -->
        <!-- bower:js -->
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/angular/angular.min.js"></script>

        <!-- Angular Material Dependencies -->
        <script src="bower_components/angular-animate/angular-animate.min.js"></script>
        <script src="bower_components/angular-aria/angular-aria.min.js"></script>

        <script src="bower_components/angular-material/angular-material.min.js"></script>
        <script src="bower_components/kendo-ui-core/js/kendo.all.min.js"></script>

        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="bower_components/angular-ui-router/release/angular-ui-router.min.js"></script>
        <script src="bower_components/json3/lib/json3.min.js"></script>
        <script src="bower_components/oclazyload/dist/ocLazyLoad.min.js"></script>
        <script src="bower_components/angular-loading-bar/build/loading-bar.min.js"></script>
        <script src="bower_components/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="bower_components/Chart.js/Chart.min.js"></script>
        <!-- endbower -->
        <!-- endbuild -->

        <!-- build:js({.tmp,app}) scripts/scripts.js -->
        <script src="app/scripts/app.js"></script>
        <script src="app/scripts/custom.js"></script>
        <script src="app/js/sb-admin-2.js"></script>
        <!-- endbuild -->



        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-XXXXX-X');
            ga('send', 'pageview');
        </script>
        <!-- Custom CSS -->

        <!-- Custom Fonts -->

        <!-- Morris Charts CSS -->
        <!-- <link href="styles/morrisjs/morris.css" rel="stylesheet"> -->


    </head>

    <body>

        <div ng-app="ApsilonApp">

            <div ui-view></div>

        </div>

    </body>

</html>