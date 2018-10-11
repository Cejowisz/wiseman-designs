export default ({ app, store, route, redirect }) => {

    if(route.path !== '/login' && !store.getters['auth/token']) {
        redirect('/login')
    }

    // Set the token on every request.
    app.$axios.onRequest((config) => {
        config.headers.common['Authorization'] = `Bearer ${store.getters['auth/token']}`
    })

    // Check if the token has expired. If so refresh first.
    const timeDiff = (Math.floor(Date.now() / 1000)) - (Math.floor(localStorage.getItem('tokenRefreshTime') / 1000))
    if (timeDiff > 3600) {
        app.$axios.$get('/api/token/refresh').then(response=> {
            localStorage.setItem('token', response)
            localStorage.setItem('timeLoggedIn', Date.now())
            localStorage.setItem('tokenRefreshTime', Date.now())
        })
    }

    // For login user out on token expiration
    app.$axios.onResponseError( e => {
        console.log('from check-auth middleware: ' + e.response.statusText + ' ' + e.response.status)
        redirect('/')
    })
}