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
                    <p class="mr-2 mb-2 text-xl">{{ Auth::user()->name }}</p>
                @endif
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt=""
                    class="h-12 rounded-full mb-2">
            </button>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a href="{{ route('profile.edit') }}" class="font-semibold">Profil</a>
                </li>
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
