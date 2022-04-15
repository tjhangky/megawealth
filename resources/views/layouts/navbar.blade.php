<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between sticky-top mb-5">
    <div class="container">


        <a class="navbar-brand" href="#">megAWealth</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="/">Home</span></a>
                <a class="nav-item nav-link" href="/about-us">About Us</a>
                <a class="nav-item nav-link" href="/properties/buy">Buy</a>
                <a class="nav-item nav-link" href="/properties/rent">Rent</a>
                @guest
                    <a class="nav-item nav-link" href="/login">Login</a>
                    <a class="nav-item nav-link" href="/register">Register</a>
                @endguest

                @auth
                    <a class="nav-item nav-link" href="/cart">Cart</a>

                    {{-- FOR ADMIN
                <a class="nav-item nav-link" href="/buy">Manage Company</a>
                <a class="nav-item nav-link" href="/rent">Manage Real Estate</a> --}}

                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
