<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between sticky-top">
    <div class="container">
        <a class="navbar-brand" href="/" style="font-family: 'Yellowtail'">megAWealth</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">

                {{-- display role biar mudah cek --}}
                @guest
                    <span class="nav-link text-warning button-outline">GUEST</span>
                @endguest

                @auth
                    @cannot('admin')
                        <span class="nav-link text-warning">MEMBER</span>
                    @endcannot

                @endauth

                @can('admin')
                    <span class="nav-link text-warning">ADMIN</span>
                @endcan

                <a class="nav-item nav-link {{ $active == 'home' ? 'active' : '' }}" href="/">Home</span></a>

                @cannot('admin')
                    <a class="nav-item nav-link {{ $active == 'about-us' ? 'active' : '' }}" href="/about-us">About Us</a>
                    <a class="nav-item nav-link {{ $active == 'buy' ? 'active' : '' }}" href="/properties/buy">Buy</a>
                    <a class="nav-item nav-link {{ $active == 'rent' ? 'active' : '' }}" href="/properties/rent">Rent</a>
                @endcannot

                @guest
                    <a class="nav-item nav-link {{ $active == 'login' ? 'active' : '' }}" href="/login">Login</a>
                    <a class="nav-item nav-link {{ $active == 'register' ? 'active' : '' }}" href="/register">Register</a>
                @endguest

                @auth
                    @cannot('admin')
                        <a class="nav-item nav-link {{ $active == 'cart' ? 'active' : '' }}" href="/cart">Cart</a>
                    @endcannot

                    {{-- for admin --}}
                    @can('admin')
                        <a class="nav-item nav-link {{ $active == 'manage-company' ? 'active' : '' }}"
                            href="/manage-company">Manage Company</a>
                        <a class="nav-item nav-link {{ $active == 'manage-property' ? 'active' : '' }}"
                            href="/manage-property">Manage
                            Real Estate</a>
                    @endcan

                    <div class="d-flex align-items-center ms-3">
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-warning btn-sm">Logout</button>
                        </form>
                    </div>

                @endauth
            </div>
        </div>
    </div>
</nav>
