<head>

    <title>Socialyte's newsfeed</title>

    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Main Font -->
    <script src="{{ asset('socialyte/js/libs/webfontloader.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                families: ['Roboto:300,400,500,700:latin']
            }
        });
    </script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('socialyte/Bootstrap/dist/css/bootstrap-reboot.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('socialyte/Bootstrap/dist/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('socialyte/Bootstrap/dist/css/bootstrap-grid.css') }}">

    <!-- Main Styles CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('socialyte/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('socialyte/css/fonts.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
