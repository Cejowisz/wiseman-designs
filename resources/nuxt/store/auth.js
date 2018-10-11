export const state = () => ({
    user: localStorage.getItem('user'),
    token: localStorage.getItem('token'),
    loginStatus: false
})

export const mutations = {

    SET_USER(state, user) {
        state.user = user
    },

    LOGIN_STATUS(state) {
        state.loginStatus = !state.loginStatus
    }
}

export const actions = {
    setUsers({ commit }, users) {
        commit('SET_USERS', users)
    },
}

export const getters = {
    user: state => {
        if(state.user) {
            return state.user
        }
    },
    token: state => state.token,
    loginStatus: state => state.isLoggedIn
}