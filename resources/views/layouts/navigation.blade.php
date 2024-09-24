<div x-data="{ dropdown: false }"
     class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 bg-white px-4 sm:gap-x-6 sm:px-6 lg:px-8">
    <button type="button" class="-m-2.5 p-2.5 text-gray-700 lg:hidden">
        <span class="sr-only">Open sidebar</span>
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
             aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
        </svg>
    </button>

    <div class="flex justify-end flex-1 gap-x-4 self-stretch lg:gap-x-6">

        <div class="flex items-center gap-x-4 lg:gap-x-6">
            <!-- Profile dropdown -->
            <div class="relative">
                <button @click="dropdown = !dropdown" type="button" class="-m-1.5 flex items-center p-1.5"
                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <img class="h-8 w-8 rounded-full bg-gray-50"
                         src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                         alt="">
                    <span class="hidden lg:flex lg:items-center">
                        <span class="ml-4 text-sm font-semibold leading-6 text-gray-900"
                              aria-hidden="true">{{ auth()->user()->name }}</span>
                        <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                             aria-hidden="true">
                          <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd"/>
                        </svg>
                    </span>
                </button>

                <div
                    x-show="dropdown == true"
                    x-transition
                    class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                    <!-- Active: "bg-gray-50", Not Active: "" -->
                    <button wire:click="logout" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                            tabindex="-1" id="user-menu-item-1">Sign out
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
