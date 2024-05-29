<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Gestion Garage')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    {{-- <header>
        <nav>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            @if(auth()->user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            @elseif(auth()->user()->role == 'mecanicien')
                <a href="{{ route('mechanic.dashboard') }}">Mécanicien Dashboard</a>
            @elseif(auth()->user()->role == 'client')
                <a href="{{ route('client.dashboard') }}">Client Dashboard</a>
            @endif
        </nav>
    </header> --}}
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; 2024 Garage Management
    </footer>
</body>
</html>
