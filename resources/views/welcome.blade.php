<x-guest-layout>
    <main>
        <nav class="absolute left-0 right-0 bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center">
                    <!-- Logo -->
                    <a href="{{ url('/') }}">
                        <x-application-logo class="h-10 w-auto" />
                    </a>

                    <!-- Navigation Links -->
                    <div class="hidden sm:-my-px sm:ml-10 sm:flex justify-between grow">
                        <div class="space-x-8 flex h-16">
                            <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                                Postagens
                            </x-nav-link>

                            <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                                Participantes
                            </x-nav-link>

                            <x-nav-link :href="route('tags.index')" :active="request()->routeIs('tags.index')">
                                Tecnologias
                            </x-nav-link>
                        </div>

                        <div class="space-x-8 flex h-16">
                            @guest
                            <x-nav-link :href="route('login')" :active="request()->routeIs('login')">Log in</x-nav-link>

                            <x-nav-link :href="route('register')" :active="request()->routeIs('register')">Register</x-nav-link>
                            @else
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <header class="h-screen bg-green-700 text-white flex items-center justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-7xl mb-6">Seja bem-vindo Dev!</h1>
                <h2 class="text-xl">Aqui nós programadores poderemos tirar dúvidas compensando por isso, para que a ajuda chegue mais rapida e...</h2>
                <h2 class="mb-4">Para nós tentarmos ajudar alguém e ainda por cima ganhar uma recompensa.</h2>
                <small>Entre ou cadastre-se</small>
            </div>
        </header>
    </main>
</x-guest-layout>