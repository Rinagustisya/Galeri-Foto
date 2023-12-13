<nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow">
    <div class="container">
        <a class="navbar-brand h1" href="">
        <i class="fas fa-images"></i>  &nbsp; Galeri Foto
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            @auth
            <!-- <x-nav-item label="Dashboard" :link="route('login.show')" />
            <x-nav-item label="Profile" :link="route('login.show')" />
            <x-nav-item label="Data Gambar" :link="route('login.show')" />
            <x-nav-item label="Logout" :link="route('login.show')" />   -->
            @else
            <x-nav-item label="Login" :link="route('login.show')" />
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
            @endauth
        </ul>
        </div>
    </div>
</nav>