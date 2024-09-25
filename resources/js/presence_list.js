export default (user_id) => ({
    user_id: user_id,
    users: [],
    init() {
        Echo.join('chat.globalroom')
            .here( (users) => {
                this.users = users;
            })
            .joining( (user) => {
                this.users.push(user)
            })
            .leaving((user) => {
                this.users = this.users.filter((userInPresenceList) => userInPresenceList.id !== user.id)
            })
            .error((error) => {
                console.error(error);
            })
    }
})
