<div class="navbar bg-base-100 shadow-md z-20 sticky top-0 max-w-[100%]">
    <div class="flex-1">
        <button class="p-2 ml-1 mr-2" @click="isSidebarExpanded = !isSidebarExpanded">
            <svg viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round" class="h-6 w-6 transform" :class="isSidebarExpanded ? 'rotate-180' : 'rotate-0'">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="4" y1="6" x2="14" y2="6" />
                <line x1="4" y1="18" x2="14" y2="18" />
                <path d="M4 12h17l-3 -3m0 6l3 -3" />
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
                <li>

                    <form action="{{ route('logout') }}" method="post">
                        @csrf

                        <button type="submit" class="font-semibold">Logout</button>
                    </form>

                </li>
            </ul>
        </div>
    </div>
</div>
