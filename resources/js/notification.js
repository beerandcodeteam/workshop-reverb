export default (user_id) => ({
    user_id: user_id,
    open: false,
    notifications: [],

    init() {
        Echo.private(`App.Models.User.${this.user_id}`)
            .notification((notification) => {
                if (!route().current('chat.user', { user: notification.user.id })) {
                    this.notifications.push(notification)
                }
            })
    }
})
