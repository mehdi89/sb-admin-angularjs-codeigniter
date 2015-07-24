<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html class="no-js">
  <head>
    <meta charset="utf-8">
    <title><?php echo $this->config->item('title'); ?></title>
    <script>
        var BASE_URL = "<?php echo site_url(); ?>";
    </script>
    <script>
        var SRC_BASE = "<?php echo site_url(); ?>app/libs/";
    </script>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!-- build:css(.) styles/vendor.css -->
    <!-- bower:css -->
  <link rel="stylesheet" href="app/styles/libs/bootstrap.min.css" />
    <!-- endbower -->
    <!-- endbuild -->

    <!-- build:css(.tmp) styles/main.css -->
    <link rel="stylesheet" href="app/styles/main.css">
    <link rel="stylesheet" href="app/styles/sb-admin-2.css">
    <link rel="stylesheet" href="app/styles/timeline.css">
    <link rel="stylesheet" href="app/styles/libs/metisMenu.min.css">
    <link rel="stylesheet" href="app/styles/libs/loading-bar.min.css">
    <link rel="stylesheet" href="app/styles/libs/font-awesome.min.css" type="text/css">

    <link rel="stylesheet" href="app/styles/libs/angular-material.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=RobotoDraft:300,400,500,700,400italic">


    <link rel="stylesheet" href="app/styles/libs/kendo.common-material.min.css" type="text/css">
    <link rel="stylesheet" href="app/styles/libs/kendo.material.min.css" type="text/css">

<!-- endbuild -->

    <!-- build:js(.) scripts/vendor.js -->
    <!-- bower:js -->
    <script src="app/js/libs/jquery.min.js"></script>
    <script src="app/js/libs/angular.min.js"></script>

    <!-- Angular Material Dependencies -->
    <script src="app/js/libs/angular-animate.min.js"></script>
    <script src="app/js/libs/angular-aria.min.js"></script>

    <script src="app/js/libs/angular-material.min.js"></script>
    <script src="app/js/libs/kendo.all.min.js"></script>

    <script src="app/js/libs/bootstrap.min.js"></script>
    <script src="app/js/libs/angular-ui-router.min.js"></script>
    <script src="app/js/libs/json3.min.js"></script>
    <script src="app/js/libs/ocLazyLoad.min.js"></script>
    <script src="app/js/libs/loading-bar.min.js"></script>
    <script src="app/js/libs/ui-bootstrap-tpls.min.js"></script>
    <script src="app/js/libs/metisMenu.min.js"></script>


    <!-- build:js({.tmp,app}) scripts/scripts.js -->
    <script src="app/scripts/app.js"></script>
    <script src="app/scripts/custom.js"></script>
    <script src="app/js/sb-admin-2.js"></script>
    <!-- endbower -->
    <!-- endbuild -->



    <script>
       (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
       (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
       m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
       })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
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
