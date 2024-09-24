<x-app-layout>
    <div class="flex flex-col justify-end h-full w-full" x-data="chat_global({{ auth()->user() }})">

        <div class="flex flex-col flex-1 gap-y-2 pt-8 pr-4 overflow-y-auto" x-ref="messageContainer">

            <template x-for="(message, index) in messages" :key="index">
                <div :class="{'flex flex-col items-end w-full': message.userid == user.id, 'flex flex-col items-start w-full': message.from_user_id != user.id}">
                    <p class="font-bold text-xs mb-1" x-text="message.username"></p>
                    <p :class="{'rounded-full px-4 py-2 bg-blue-100': message.userid == user.id, 'rounded-full px-4 py-2 bg-gray-100': message.userid != user.id}" x-text="message.message"></p>
                </div>
            </template>
        </div>


        <form action="" method="POST" @submit.prevent="sendMessage">
            @csrf
            <div class="mt-2 flex rounded-md shadow-sm">
                <div class="relative flex flex-grow items-stretch focus-within:z-10">
                    <input
                        type="text"
                        class="block w-full rounded-none rounded-l-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Aoba"
                        name="text"
                        x-model="message"
                    >
                </div>
                <button  type="submit"
                         class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r-md px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                    enviar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
