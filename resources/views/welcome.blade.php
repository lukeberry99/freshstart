<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ env('APP_NAME') }}</title>

        <link rel="stylesheet" href="css/app.css">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>

        <script>
            // Set some config vars
            window.config = {
                'app_name': '{{ env('APP_NAME') }}'
            }
        </script>
        <script src="js/app.js"></script>
    </body>
</html>
