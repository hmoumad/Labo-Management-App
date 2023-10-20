<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- bootstrap css !-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- bootstrap JS !-->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <!-- Start Navigation Bar -->
    @include('nave_footer.navbare')
    <!-- End Navigation Bar -->

    @yield('content')

    <!-- Start Footer Bar -->
    @include('nave_footer.footer')
    <!-- End Footer Bar -->

</body>
</html>