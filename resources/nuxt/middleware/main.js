
export default ({ route, app }) => {

    // Redirect to login when user is not authenticated.
    /*if(route.path !== '/login' && app.store.getters['auth/token'] === '') {
        return app.$router.push('/login')
    }*/

    // User should not visit the login when logged in.
    if(route.path === '/login' && app.store.state.auth.isLoggedIn === true) {
        app.store.commit('auth/LOGIN_STATUS')
        app.router.push('/dashboard')
    }
}

