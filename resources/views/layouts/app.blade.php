<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TravelTales</title>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500;700&display=swap" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container-fluid shadow-lg header">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <h1 class="text-center" style="font-family: 'Roboto Slab', serif; color:#F6F9FC; padding: 20px; font-size:1cm;><a href="{{route('home')}} class="h3 text-white text-decoration-none">Travel-Tales</a></h1>
                    <div class="d-flex align-items-center navigation">
                        @if (Auth::check())
                        <a href="{{ route('account.profile') }}" class="text-white" style="font-family: 'Roboto Slab', serif;">My Account</a>
                        @else
                        <a href="{{ route('account.login') }}" class="text-white">Login</a><t> &emsp;
                        <a href="{{ route('account.register') }}" class="text-white">Register</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @yield('main')
       
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        @yield('script')
    </body>
</html>
