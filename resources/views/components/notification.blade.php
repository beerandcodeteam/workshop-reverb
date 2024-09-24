<div  x-data="notification({{ auth()->id() }})" aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
    <div class="flex w-full flex-col items-center space-y-4 sm:items-end">

        <template x-for="notification in notifications" :key="notification.message.id">
            <div
                x-data="open = true"
                x-init="setTimeout(() => {open = false; notifications = notifications.filter(not => not.message.id != notification.message.id)}, 2000)"
                x-show="open"
                x-transition:enter="transform ease-out duration-300 transition"
                x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="pointer-events-auto flex w-full max-w-md rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="w-0 flex-1 p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0 pt-0.5">
                            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.2&w=160&h=160&q=80" alt="">
                        </div>
                        <div class="ml-3 w-0 flex-1">
                            <p class="text-sm font-medium text-gray-900" x-text="notification.user.name"></p>
                            <p class="mt-1 text-sm text-gray-500" x-text="notification.message.content"></p>
                        </div>
                    </div>
                </div>
                <div class="flex border-l border-gray-200">
                    <a
                        :href="route('chat.user', notification.user.id)"
                        class="flex w-full items-center justify-center rounded-none rounded-r-lg border border-transparent p-4 text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">Responder</a>
                </div>
            </div>
        </template>
    </div>
</div>

