<!DOCTYPE html>
<html data-theme="synthwave" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Hardlight Academy</title>
    </head>

    <body>
        @include('partials.modals')

        <div class="content">
            @include('partials.navbar')
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/systems.js') }}"></script>
    </body>
</html>