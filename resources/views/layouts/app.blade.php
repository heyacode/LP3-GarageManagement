<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Gestion Garage')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
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
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        &copy; 2024 Garage Management
    </footer>
</body>
</html>
