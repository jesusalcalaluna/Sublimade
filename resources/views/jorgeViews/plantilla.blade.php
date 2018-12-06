<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta name=viewport content="width=device-width, user-scalable=no initial-scale=1">
    {{--<link rel="stylesheet" href="css/bootstrap.css">--}}
    <script src="js/jquery-3.2.1.min.js"></script>
    {{--<script src="js/bootstrap.js"></script>--}}
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script src="https://unpkg.com/ionicons@4.4.8/dist/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sublimade</title>
    <style>
        body{
            background-image: url("images/universo-espacio-interestelar-2903.jpg");
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
        }
             /* Media query for mobile viewport */
        @media screen and (max-width: 400px) {
            #paypal-button-container {
                width: 100%;
            }
        }

        /* Media query for desktop viewport */
        @media screen and (min-width: 400px) {
            #paypal-button-container {
                width: 250px;
                display: inline-block;
            }
        }
        @yield('cssextra')
    </style>

<body>

@yield('contenido')
<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

