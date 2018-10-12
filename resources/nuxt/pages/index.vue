<template>
    <div>
        <div class="home-banner">
            <router-link to="/">
                <img src="../assets/img/logo.png" alt="wiseman logo">
            </router-link>
            <div class="slide-container" @mouseout="startSlide" @mouseover="stopSlide">
                <div v-for="number in [currentNumber]" :key='number' class="fade-in">
                    <img class="slide" :src="`img/${slides[currentNumber].link}`" />
                </div>
            </div>
        </div>
        <div class="cta">
            <div>
                <h3>Cost for your next graphics project</h3>
                <p>Get started today and complete the request to get free estimate</p>
            </div>
            <nuxt-link to="/contact">FREE ESTIMATE</nuxt-link>
        </div>
        <div class="intro">
            <img src="../assets/img/intro.jpg" alt="wiseman image">
            <div class="intro-text">
                <p>
                    Wiseman designs studio is a branding, customizing and Media Outfit that is
                    dedicated to meet the needs of people who love good things.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import NuxtLink from "../../../.nuxt/components/nuxt-link";

    export default {
    
        components: {
            NuxtLink
//            Search
        },
        
        data() {
            return {
                currentNumber: 0,
                timer: null,
                slides: [
                    {link: 'WISEMAN_ADVERT_1.jpg'},
                    {link: 'WISEMAN_ADVERT_2.jpg'},
                    {link: 'WISEMAN_ADVERT_3.jpg'},
                    {link: 'WISEMAN_ADVERT_4.jpg'}
                ]
            }
        },

        methods: {
            startSlide() {
                this.timer = setInterval(this.next, 6000);
            },

            next() {
                if(this.currentNumber >= this.slides.length - 1) {
                    return this.currentNumber = 0
                }
                this.currentNumber += 1
            },

            stopSlide() {
                clearTimeout(this.timer);
                this.timer = null;
            }
        },

        mounted() {
            this.startSlide()
        }
    }
</script>

<style scoped>
    img{
        height: auto;
        width: 100%;
    }
    .home-banner{
        display: grid;
        grid-template-columns: 20% 80%;
    }
    .cta{
        display: grid;
        grid-template-columns: 65% 35%;
        justify-items: center;
        align-items: center;
        color: #fefefe;
        text-shadow: 2px 2px 5px #D9D9D9;
        background-image: linear-gradient(293deg, #1F65DB 0%, #ED355B 100%);
        height: 200px;
    }
    .cta a{
        text-shadow: none;
        color: #fefefe;
        text-decoration: none;
        border: 1px solid #fefefe;
        border-radius: 5%;
        padding: 10px 20px;
    }
    /*.fade-in {
        opacity: 1;
        animation: fade 6s linear;
    }
    @keyframes fade {
        0%,100% { opacity: 0 }
        50% { opacity: 1 }
    }*/
    .intro{
        display: grid;
        width: 100%;
        grid-template-columns: repeat(3, 1fr);
    }

    .intro img{
        grid-column: 1 / 2;
    }

    .intro-text{
        grid-column: 2 / 4;
        display: grid;
        text-align: center;
        align-content: center;
        background: #f7f7f7;
        text-shadow: 2px 2px 5px #D9D9D9;
        padding: 100px;
        font-size: 2rem;
    }
</style>