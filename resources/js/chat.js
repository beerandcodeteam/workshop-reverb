export default (logged_user_id, chat_user_id, chat ) => ({
    logged_user_id: logged_user_id,
    chat_user_id: chat_user_id,
    chat: chat,
    chat_user_typing: false,
    channel: null,
    typingTimer: null,

    init() {
        this.channel = Echo.private(`chat.${this.chat.id}`)
            .listen('NewMessage', (e) => {
                if (e.message.user_id != this.logged_user_id) {
                    this.chat.messages.push(e.message)
                    this.$nextTick(() => this.scrollToBottom())
                }
            })
            .listenForWhisper('typing', (e) => {
                this.chat_user_typing = true;
                this.$nextTick(() => this.scrollToBottom())
            })
            .listenForWhisper('stopTyping', (e) => {
                this.chat_user_typing = false;
                this.$nextTick(() => this.scrollToBottom())
            })

        this.$nextTick(() => this.scrollToBottom())
    },
    sendTyping() {
        if (this.typingTimer) {
            clearTimeout(this.typingTimer)
        }

        this.channel
            .whisper('typing', {})

        this.typingTimer = setTimeout(() => {
            this.channel.whisper('stopTyping', {})
        }, 1000)
    },

    scrollToBottom() {
        const container = this.$refs.messageContainer
        container.scrollTop = container.scrollHeight
    }

})
