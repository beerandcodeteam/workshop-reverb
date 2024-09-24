<div x-data="presence_list({{ auth()->user()->id }})">
    <!-- Static sidebar for desktop -->
    <div class="fixed inset-y-0 z-50 flex w-72 flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex grow flex-col gap-y-5 overflow-y-auto border-r border-gray-200 bg-white px-6 pb-4">
            <div class="flex h-16 shrink-0 items-center">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                     alt="Your Company">
            </div>
            <nav class="flex flex-1 flex-col">
                <ul role="list" class="flex flex-1 flex-col gap-y-7">

                        <li>
                            <div class="text-xs font-semibold leading-6 text-gray-400">Usuários</div>
                            <ul role="list" class="-mx-2 mt-2 space-y-1">
                                <template x-for="user in users">
                                    <template x-if="user.id !== user_id">
                                        <li>
                                            <!-- Current: "bg-gray-50 text-indigo-600", Default: "text-gray-700 hover:text-indigo-600 hover:bg-gray-50" -->
                                            <a href="#"
                                               class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                                                <span
                                                    x-text="user.name.charAt(0)"
                                                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white text-[0.625rem] font-medium text-gray-400 group-hover:border-indigo-600 group-hover:text-indigo-600">
                                                </span>
                                                <span class="truncate" x-text="user.name"></span>
                                            </a>
                                        </li>
                                    </template>
                                </template>

                            </ul>
                        </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
