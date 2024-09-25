export default (user) => ({
    user: user,
    messages: [],
    message: "",
    channel: null,

    init() {
        this.channel = Echo.private('chat.globalroom')
            .listenForWhisper('message', (message) => {
                this.messages.push(message)
            })
    },

    sendMessage() {
        let message = {
            message: this.message,
            username: this.user.name,
            userid: this.user.id,
        }

        this.messages.push(message);
        this.message = "";

        this.channel.whisper('message', message);
    }
})
