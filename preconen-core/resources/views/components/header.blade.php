<header class="navbar bg-base-100 z-20 justify-between max-w-7xl mx-auto">
    <a class="flex-none" href="/">
        <img src="{{ asset('img/preconen-logo.svg') }}" alt="" class="h-12">
        <h1 class="text-3xl ml-3 font-bold">Preconen</h1>
    </a>

    <div class="flex-none">
        <a href="{{ $link }}" class="btn btn-ghost shadow-lg mr-3 normal-case text-xl py-1">
            {{ $buttonText }}
        </a>
    </div>
</header>
