<x-guest-layout>
    <header id="header-welcome" class="h-screen bg-green-700 text-white">
        <div class="absolute left-0 right-0">
            @include('layouts.navigation')
        </div>
        <div class="h-full flex items-center justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h1 class="text-7xl mb-6">Seja bem-vindo Dev!</h1>
                <h2 class="text-xl">Aqui nós programadores poderemos tirar dúvidas recompensando por isso, para que a ajuda chegue mais rapida e...</h2>
                <h2 class="mb-4">Para nós tentarmos ajudar alguém e ainda por cima ganhar uma recompensa.</h2>
                <small>Entre ou cadastre-se</small>
            </div>
        </div>
    </header>
</x-guest-layout>