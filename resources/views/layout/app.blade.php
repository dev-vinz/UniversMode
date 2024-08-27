<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>Univers Mode</title>

        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" />

        <!-- Bootstrap Icons -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />

        <!-- Global CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/navbar.css') }}" />

        <!-- Page specific CSS -->
        @stack('styles')
    </head>

    <body>
        <header class="um-navbar-brand">
            <a href="{{ route('index') }}" tabindex="-1">
                <img src="{{ asset('img/logo.png') }}" alt="Logo UniversMode" />
            </a>
        </header>

        <nav class="um-navbar">
            <input id="um-burger-toggle" type="checkbox" class="d-none" />
            <label for="um-burger-toggle" class="um-burger">
                <div class="um-burger-top-bun"></div>
                <div class="um-burger-meat"></div>
                <div class="um-burger-bottom-bun"></div>
            </label>
            <div class="um-main-menu">
                <ul class="um-navbar-nav">
                    <li class="um-navbar-item"><a href="{{ route('index') }}">Accueil</a></li>
                    <li class="um-navbar-item um-navbar-sub-menu">
                        <div class="um-sub-menu">
                            <span>Shopping</span>
                            <ul class="um-navbar-nav">
                                <li class="um-navbar-item"><a href="TODOBoutique">Boutique</a></li>
                                <li class="um-navbar-item"><a href="TODORetouches">Retouches</a></li>
                                <li class="um-navbar-item"><a href="TODOCartes">Cartes cadeaux</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="um-navbar-item"><a href="TODOCreations">Créations personnelles</a></li>
                    <li class="um-navbar-item"><a href="TODOAbout">À propos</a></li>
                    <li class="um-navbar-item"><a href="TODOContact">Contact</a></li>
                </ul>
                <ul class="um-navbar-nav">
                    <li class="um-navbar-item">
                        <a href="TODOBasket" title="Panier"><i class="bi bi-basket2-fill"></i></a>
                    </li>
                    @auth
                        <li class="um-navbar-item um-navbar-sub-menu">
                            <div class="um-sub-menu">
                                <span><i class="bi bi-person-fill-gear"></i></span>
                                <ul class="um-navbar-nav">
                                    <li class="um-navbar-item">
                                        <a href="TODOProfile">
                                            {{ Auth::user()->firstName . ' ' . Auth::user()->lastName }}
                                        </a>
                                    </li>
                                    <li class="um-navbar-separator">
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li class="um-navbar-item">
                                        <a href="{{ route('auth.logout') }}">Déconnexion</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endauth

                    @guest
                        <li class="um-navbar-item">
                            <a href="{{ route('auth.login') }}" title="Connexion">
                                <i class="bi bi-person-fill-lock"></i>
                            </a>
                        </li>
                    @endguest
                </ul>
                <img class="um-navbar-logo-mobile" src="{{ asset('img/logo.png') }}" alt="Logo UniversMode" />
            </div>
        </nav>

        <!-- Main content -->
        <main class="container">
            @yield('content')
        </main>

        <!-- Bootstrap JavaScript -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"
        ></script>

        <footer class="um-footer-copyright container text-center">&copy; 2025 Univers mode</footer>

        <!-- Global JavaScript -->
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/navbar.js') }}"></script>

        <!-- Page specific JavaScript -->
        @stack('scripts')
    </body>
</html>
