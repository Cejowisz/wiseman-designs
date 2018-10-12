<template>
    <div class="contact-container">
        <form>
            <p v-if="feedback">Message delivered successfully!</p>
            <h1>GET IN TOUCH</h1>
            <p>Please fill out form and we will get back to you as soon as possible</p>

            <input type="text" v-model="details.fullname" placeholder="Fullname" id="fullname">
            <label for="fullname" class="sr-only">fullname</label>

            <input type="email" v-model="details.email" placeholder="Email" id="email">
            <label for="email" class="sr-only">email</label>

            <input type="text" v-model="details.phone" placeholder="Phone" id="phone">
            <label for="phone"></label>

            <textarea @focus="goDown" v-model="details.message" placeholder="Message" id="message" cols="30" rows="3"></textarea>
            <label for="message"></label>

            <button @click.prevent="send">SEND</button>
        </form>
        <div class="contact-left">
            <h3>CONTACT INFO</h3>
            <h4>Address</h4>
            <p>32, Edem Udo street <br> Akwa Ibom State </p>
            <h4>Phone</h4>
            <p>+2345353535</p>
            <h4>Email</h4>
            <p>info@wisemandesigns.com</p>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                details: {},
                feedback: false
            }
        },


        methods: {
            async send() {
                let res = await this.$axios.$post('/api/feedback', this.details)
                if(res) return this.feedback = true
            },

            goDown() {

            }
        }
    }
</script>


<style scoped>
    .contact-container{
        height: 100vh;
        display: grid;
        grid-template-columns: 50% 50%;
        background: #1A2462;
        color: #fefefe;
        padding: 100px;
    }
    form{
        display: grid;
        grid-template-columns: auto auto;
        grid-gap: 10px;
    }
    form p, form h1, #fullname, #message{
        grid-column: 1 / -1;
    }
    .contact-left{
        padding-left: 100px;
    }
    h4{
        margin-top: 35px;
    }
    p{
        color: #ccc;
    }
    button{
        background: transparent;
        border-radius: 3%;
        padding: 10px;
        color: #fefefe;
        border: 1px solid #fefefe;
        grid-column: 1 / 2;
        cursor: pointer;
    }
    button:hover{
        background: #fefefe;
        color: #1A2462;
        transition: .9s ease-in-out;
    }
    input[type="email"], input[type="text"], textarea{
        padding: 10px;
    }
</style>