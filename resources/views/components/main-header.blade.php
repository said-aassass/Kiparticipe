<header id="main-header">
    <nav>
        <a href="{{ route('home') }}" id="main-logo">
            <img src="assets/images/main-logo.webp" alt="Logo de l'association">
        </a>

        <p id="header-title">Qui participe ?</p>

        <div id="login-buttons">
            @if (Auth::check() && Auth::user()->isAdmin())
                <div class="login-container">
                    <a href="{{ route('dashboard') }}" class="login-link">
                        Administration
                    </a>
                </div>

                <div class="register-container">
                    <form method="POST" action="{{ route('logout') }}" class="register-container">
                        @csrf

                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                            Déconnexion
                        </x-dropdown-link>
                    </form>
                </div>
            @else

                @if (Auth::check())
                    <div class="register-container">
                        <form method="POST" action="{{ route('logout') }}" class="register-container">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">
                                Déconnexion
                            </x-dropdown-link>
                        </form>
                    </div>
                @else
                    <div class="login-container">
                        <a href="{{ route('login') }}" class="login-link">
                            Se connecter
                        </a>
                    </div>
            
                    <div class="register-container">
                        <a href="{{ route('register') }}" class="register-link">
                            S'inscrire
                        </a>
                    </div>
                @endif
                
            @endif
        </div>
    </nav>
</header>