<template>
<div class="header-container">
  <header class="the-header">
    <TheSideNavToggle @toggle="$emit('sidenavToggle')" />
    <div class="logo">
      <nuxt-link to="/">WISEMAN DESIGN</nuxt-link>
    </div>
    <div class="spacer"></div>
    <div class="navigation-items">
      <ul class="nav-list">
        <li class="nav-item"><nuxt-link to="/">Home</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/about">About</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/services">Services</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/our-works">Our Works</nuxt-link></li>
        <li class="nav-item"><nuxt-link to="/contact">Contact</nuxt-link></li>
        <!--<li class="nav-item"><nuxt-link :to="loginLink">{{ loginText }}</nuxt-link></li>-->
        <!--<li class="nav-item" v-show="register"><nuxt-link to="/register">Register</nuxt-link></li>-->
      </ul>
    </div>
  </header>
</div>
</template>

<script>
import TheSideNavToggle from "~/components/guest-layout/TheSideNavToggle";

export default {
    name: "TheHeader",

    components: {
        TheSideNavToggle
    },

    data() {
        return {
//            loginText: 'Login',
//            loginLink: '/login',
            register: true
        }
    },

    methods: {
        isLoggedIn() {
            if(this.$store.getters['auth/loginStatus'] === true) {
                this.loginText = 'Logout'
                this.register = false
                return this.loginLink = '/logout'
            }
            this.loginText = 'Login'
            return this.loginLink = '/Login'
        }
    },

    mounted() {
//        this.isLoggedIn()
    }
}
</script>


<style scoped>
.header-container {
  height: 60px;
}

.the-header {
  width: 100%;
  position: fixed;
  height: 60px;
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: black;
  z-index: 100;
  box-sizing: border-box;
  padding: 0 20px;
}

.logo {
  margin: 0 10px;
  font-size: 1.3rem;
}

.logo a {
  text-decoration: none;
  color: white;
}

.spacer {
  flex: 1;
}

.navigation-items {
  display: none;
}

@media (min-width: 768px) {
  .navigation-items {
    display: block;
  }
}

.nav-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
}

.nav-item {
  margin: 0 10px;
}

.nav-item a {
  text-decoration: none;
  color: white;
}

.nav-item a:hover,
.nav-item a:active{
  color: red;
}
</style>
