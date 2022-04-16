<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between sticky-top mb-5">
    <div class="container">


        <a class="navbar-brand" href="/">megAWealth</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Home</span></a>

                @cannot('admin')
                    <a class="nav-item nav-link" href="/about-us">About Us</a>
                    <a class="nav-item nav-link" href="/properties/buy">Buy</a>
                    <a class="nav-item nav-link" href="/properties/rent">Rent</a>
                @endcannot

                @guest
                    <a class="nav-item nav-link" href="/login">Login</a>
                    <a class="nav-item nav-link" href="/register">Register</a>
                @endguest

                @auth
                    @cannot('admin')
                        <a class="nav-item nav-link" href="/cart">Cart</a>
                    @endcannot

                    {{-- for admin --}}
                    @can('admin')
                        <a class="nav-item nav-link" href="/manage-company">Manage Company</a>
                        <a class="nav-item nav-link" href="/manage-property">Manage Real Estate</a>
                    @endcan

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-item nav-link">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
