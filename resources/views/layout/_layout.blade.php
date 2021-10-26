<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Agendamento Instituto Mais Visão</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('img/ico.png')}}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/d5e0d5b45e.js" crossorigin="anonymous"></script>
    <style>
        @yield('styles');
    </style>

</head>
<header>
    @include('layout.navbar')
</header>
<body>
    <main class="container">
        @include('layout.messages')
        @yield('content')
    </main>
</body>
<script src="{{asset('js/bootstrap.js')}}"></script>
@yield('scripts')
</html>
