<!doctype html>
<html class="no-js">
<head>
    <meta charset="">
    <title></title>

    <link href="//www.google-analytics.com" rel="dns-prefetch">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    
    <!-- build:css /styles/vendor.css -->
    <!-- bower:css -->
    <link rel="stylesheet" href="/public/bower_components/components-font-awesome/css/font-awesome.css" />
    <!-- endbower -->
    <!-- endbuild -->


    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.css">

    <!-- build:css /styles/main.css -->
    <link rel="stylesheet" href="/styles/main.css">
    <!-- endbuild -->

</head>
<body>


    <!-- wrapper -->
    <div class="wrapper">
        
        {{ partial('partials/side-menu') }}

        <main class="main">
            {{ partial('partials/header') }}
            {{ content() }}
        </main>

    </div>
    <!-- /wrapper -->

    <!-- analytics -->
    <script>
    (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
    (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
    l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-XXXXXXXX-XX', 'yourdomain.com');
    ga('send', 'pageview');
    </script>



    <!-- build:js /scripts/vendor.js -->
    <!-- bower:js -->
    <script src="/public/bower_components/jquery/dist/jquery.js"></script>
    <!-- endbower -->
    <!-- endbuild -->

    <!-- Compressed JavaScript -->
    <script src="https://cdn.jsdelivr.net/foundation/6.2.1/foundation.min.js"></script>

    <!-- build:js /scripts/main.js -->
     
    <script src="scripts/main.js"></script> 
     
    <!-- endbuild -->
</body>
</html>
