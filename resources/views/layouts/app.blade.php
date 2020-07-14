<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Lara' }}</title>
    <!-- style -->
    <!-- <link rel="stylesheet" href="{{asset ('css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
    @include('layouts.navigation')
    <div class="py-4">
        @yield('content')
    </div>

    @yield('script')
</body>
</html>