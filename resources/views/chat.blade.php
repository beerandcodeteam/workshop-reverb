<x-app-layout>
    <div class="flex flex-col justify-end h-full w-full" x-data="chat({{auth()->id()}}, {{ $user->id }}, {{ $chat }})">

        <div class="flex flex-row w-full justify-center font-bold text-md text-gray-400">
            <p class="underline">{{ $user->name }}</p>
        </div>

        <div class="flex flex-col flex-1 gap-y-2 pt-8 pr-4 overflow-y-auto" x-ref="messageContainer">

            <template x-for="message in chat.messages" :key="message.id">
                <div :class="{'flex flex-row justify-end w-full': message.user_id == logged_user_id, 'flex flex-row justify-start w-full': message.user_id != logged_user_id}">
                    <p :class="{'rounded-full px-4 py-2 bg-blue-100': message.user_id == logged_user_id, 'rounded-full px-4 py-2 bg-gray-100': message.user_id != logged_user_id}" x-text="message.content"></p>
                </div>
            </template>

            <template x-if="chat_user_typing">
                <div class="mt-4 flex flex-row">
                    <p>{{ $user->name }} está digitando</p>
                    <div class="flex flex-row gap-x-1">
                        <div class="ml-1 animate-bounce">.</div>
                        <span class="animate-[bounce_1.5s_infinite]">.</span>
                        <span class="animate-bounce">.</span>
                    </div>
                </div>
            </template>
        </div>


        <form action="{{ route('chat.store', $chat->id) }}" method="POST" @submit="channel.whisper('stopTyping', {})">
            @csrf
            <div class="mt-2 flex rounded-md shadow-sm">
                <div class="relative flex flex-grow items-stretch focus-within:z-10">
                    <input
                        type="text"
                        @input="sendTyping"
                        class="block w-full rounded-none rounded-l-md border-0 py-1.5  text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        placeholder="Aoba"
                        name="content"
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
