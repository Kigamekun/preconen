<div class="navbar bg-base-100 shadow-md z-20">
    <div class="flex-none">
        <button class="btn btn-circle btn-cirlce-outline btn-ghost" @click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="inline-block w-5 h-5 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <div class="flex-none">
        <div class="dropdown dropdown-button dropdown-end">
            <button class="btn btn-ghost mr-3 normal-case">
                @if (Auth::check())
                    <p class="mr-2 text-xl">{{ Auth::user()->name }}</p>
                @endif
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                    class="bi bi-person-circle text-black" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd"
                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </button>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a class="font-semibold">Logout</a></li>
            </ul>
        </div>
    </div>
</div>
