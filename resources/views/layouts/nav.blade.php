<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Garagiste</a>

        <div id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    @if(Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.clientlist') }}">Client Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.mechaniclist') }}">Mechanic Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.vehiclelist') }}">Vehicle Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.sparepartslist') }}">SpareParts Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.invoicelist') }}">Invoices Management</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.repairlist') }}">Repairs Management</a>
                    </li>
                    @elseif(Auth::user()->role === 'client')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('client.client') }}">Dashboard</a>
                        </li>
                        <!-- Ajoutez d'autres liens spécifiques aux clients ici -->
                    @elseif(Auth::user()->role === 'mechanic')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('mechanic.mechanic') }}">Dashboard</a>
                        </li>
                        <!-- Ajoutez d'autres liens spécifiques aux mécaniciens ici -->
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
