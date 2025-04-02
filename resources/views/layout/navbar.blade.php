<nav class="bg-gray-800 shadow-md">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ route('notebooks.index') }}"
                class="flex items-center text-2xl font-bold text-white hover:text-blue-400 transition-colors duration-300">
                <i class="fas fa-graduation-cap mr-2 text-blue-500"></i>Método Cornell
            </a>


            <div class="relative flex items-center ml-4" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random"
                        class="w-10 h-10 rounded-full" alt="Avatar">
                </button>

                <div x-show="open" @click.away="open = false"
                    class="absolute right-0 top-10 mt-2 w-48 bg-white dark:bg-gray-700 shadow-lg rounded-lg py-2 z-10 origin-top-right">
                    <a href="#"
                        class="block px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Perfil</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full text-left px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Logout</button>
                    </form>
                </div>
            </div>

            <button id="menu-btn"
                class="md:hidden text-gray-300 focus:outline-none ml-4 hover:text-blue-400 transition-colors duration-300">☰</button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-2 px-4 pb-4 bg-gray-800">
        <a href="{{ route('notebooks.index') }}"
            class="text-gray-300 hover:text-blue-400 transition-colors duration-300 border-b-2 border-transparent hover:border-blue-400 pb-1">Cadernos</a>
    </div>
</nav>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.getElementById("menu-btn").addEventListener("click", function() {
            document.getElementById("mobile-menu").classList.toggle("hidden");
        });
    </script>
@endpush
