<template>
    <div>
        <div class="alert alert-danger" v-if="errors">
            <p>There was an error, unable to sign in with those credentials.</p>
        </div>
        <form autocomplete="off" @submit.prevent="login">
            <div class="input-field">
                <input type="email" id="email" placeholder="user@example.com" v-model="email" required>
                <label for="email">E-mail</label>
            </div>
            <div class="input-field">
                <input type="password" id="password" v-model="password" autocomplete="off" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn blue">Sign in</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: '',
                password: '',
                errors: '',
            }
        },
        methods: {
            async login() {
                
                try {
                    // Get token.
                    let { token, user } = await this.$axios.$post('/api/login', {
                    email: this.email,
                    password: this.password
                })
                    // Store the token and set the login state.
                    localStorage.setItem('token', token)
                    localStorage.setItem('login', true)
                    localStorage.setItem('user', JSON.stringify(user))

                    localStorage.setItem('timeLoggedIn', Date.now())
                    localStorage.setItem('tokenRefreshTime', Date.now())

                     // Redirect to dashboard.
                    window.location.href = '/dashboard'
                } catch(errors) {
                    console.log(errors)
                    this.errors = errors
                }
            }
        }
    }
</script>