<template>
    <div class="register">
        <img src="../assets/img/logo.png" class="logo" alt="">
        <h1 class="tagline">The prettiest hair you will ever have</h1>
        <form class="register-form">
            <input
                    type="email"
                    :class="{'email-icon': emailExists}"
                    @input="emailExists = false"
                    :disabled="emailNotExist"
                    v-model="details.email"
                    placeholder="Enter your email"
                    id="email"
            />
            <label for="email" class="sr-only">Mail</label>
            <span v-show="emailExists">Email already exists</span>

            <input v-show="proceed" type="text" v-model="details.fullname" placeholder="Fullname" id="fullname">
            <label for="fullname" class="sr-only">Fullname</label>

            <input v-show="proceed" type="text" v-model="details.phone" placeholder="Phone" id="phone">
            <label for="phone"class="sr-only">Phone</label>

            <input v-show="proceed" type="password" v-model="details.password" placeholder="Password" id="password">
            <label for="password" class="sr-only">Password</label>

            <input
                    v-show="proceed"
                    type="password"
                    v-model="details.passwordConfirmation"
                    placeholder="Confirm password"
                    id="passwordConfirmation"
            />
            <label for="passwordConfirmation" class="sr-only">passwordConfirmation</label>
            <span v-show="passwordNotMatching">password does not match</span>

            <button class="btn register-btn" @click.prevent="continueReg">{{ registerText }}</button>
        </form>
        <p class="already-registered">Already register? <a href="#">Login</a></p>
    </div>
</template>

<script>
    export default {

        layout: 'navbarless',

        data() {
            return {
                details: {
                    fullname: null,
                    phone: null,
                    email: null,
                    password: null,
                    passwordConfirmation: null,
                },
                errors: '',
                feedback: '',
                proceed: false,
                emailExists: false,
                emailNotExist: false,
                passwordNotMatching: false,
                registerText: 'Continue'
            }
        },
        methods: {
            async continueReg() {

                if(!this.proceed) {

                    let { email } = await this.$axios.$post('/api/checkEmail', {email: this.details.email})
                    if(email === this.details.email) {
                        return this.emailExists = true
                    }
                    this.proceed = true
                    this.emailNotExist = true

                } else {
                    if(this.details.password !== this.details.passwordConfirmation) {
                        return this.passwordNotMatching = true
                    }

                    try {
                        this.registerText = '<img src="../assets/img/form_spinner.gif"/>'
                        let data = await this.$axios.$post('/api/register', this.details)
                        console.log(data)
                        localStorage.setItem('token', data)
                    } catch(e) {
                        this.errors = e
                    }

                }
            },

        },

        watch: {
            passwordConfirmation: function(e) {

                    alert(this.passwordConfirmation)

            }
        }
    }
</script>

<style>
    header{
        background: transparent !important;
    }
    .register{
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        align-items: center;
        align-content: center;
        height: 100vh;
        background: #0d0c52;
    }
    .register-form{
        grid-column: 2 / 3;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: 1fr;
        background: #fff;
        padding: 20px;
    }
    .logo, .tagline, .already-registered{
        grid-column: 2 / 3;
    }
    .tagline{
        color: #f9f9f9;
        font-size: 18px;
        text-align: center;
        margin-bottom: 40px;
    }
    .already-registered{
        color: #f9f9f9;
        text-align: center;
        margin: 25px 0;
    }
    .already-registered a{
        color: #f9f9f9;
        text-decoration: none;
    }
    input{
        background: transparent;
        border: 1px #ccc solid;
        padding: 10px;
    }
    input:focus{
        border: 2px #0d0c52 solid;
    }
    .register-btn{
        background: #0d0c52;
        color: #fff;
    }
    .email-icon[type='email'] {
        /*background-image: url(../assets/img/f.jpg);*/
        background-position: 400px 7px;
        background-repeat: no-repeat;
    }

</style>