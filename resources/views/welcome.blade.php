<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Broadcast Redis Socket.io</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="text-muter">Laravel BRoad REdis Socket.io</h1>
        <div id="chat-notification">

        </div>
    </div>

    <script>
        window.laravelEchoPort = '{{ env("LARAVEL_ECHO_PORT") }}';
    </script>
    <script src="vendor/jquery/jquery.js"></script>

    <script src="//{{ request()->getHost() }}:{{ env('LARAVEL_ECHO_PORT')}}/socket.io/socket.io.js"></script>
    <script src="/build/assets/app.4a4cd9de.js"></script>
    <script>
        const userId='{{ auth()->id() }}';
        window.Echo.channel('public-message-channel')
            .listen('.MessageEvent', (data)=>{
                $("#chat-notification").append('<div class="alert alert-warning">'+ data.message+'</div>');
            });
        window.Echo.private('message-channel.'+ userId)
            .listen('.MessageEvent', (data)=>{
                $("#chat-notification").append('<div class="alert alert-danger">'+ data.message+'</div>');
            });
    </script>
</body>
</html>
