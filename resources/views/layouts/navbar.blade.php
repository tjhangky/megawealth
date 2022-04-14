<nav class="navbar navbar-expand-lg navbar-dark bg-primary justify-content-between">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/">Home</span></a>
            <a class="nav-item nav-link" href="/about-us">About Us</a>
            <a class="nav-item nav-link" href="/buy">Buy</a>
            <a class="nav-item nav-link" href="/rent">Rent</a>
            @guest
                <a class="nav-item nav-link" href="/login">Login</a>
                <a class="nav-item nav-link" href="/register">Register</a>
            @endguest

            @auth
                <a class="nav-item nav-link" href="/cart">Cart</a>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link">Logout</button>
                </form>
            @endauth


        </div>
    </div>
</nav>
