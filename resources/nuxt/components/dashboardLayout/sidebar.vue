<template>
    <aside>
        <div class="app-brand">
            <p>HairBrace</p>
        </div>
        <div class="side-profile">
            <!--<img src="../../assets/img/user.png" alt="">-->
            Justin Obi
        </div>

        <ul class="mainmenu">
            <li><nuxt-link to="/admin-dashboard">Dashboard</nuxt-link>
                <ul class="submenu">
                    <li><nuxt-link to="/admin-dashboard/bookins">Bookings</nuxt-link></li>
                    <li><nuxt-link to="/">Routes</nuxt-link></li>
                    <li><nuxt-link to="/">Terminals</nuxt-link></li>
                </ul>
            </li>
            <li><nuxt-link to="/admin-dashboard/schedule-bus">Schedule Bus</nuxt-link></li>
            <li><nuxt-link to="/">Products</nuxt-link>
                <ul class="submenu">
                    <li><nuxt-link to="/">Tops</nuxt-link></li>
                    <li><nuxt-link to="/">Bottoms</nuxt-link></li>
                    <li><nuxt-link to="/">Footwear</nuxt-link></li>
                </ul>
            </li>
            <li><nuxt-link to="">Notifications</nuxt-link></li>
        </ul>
    </aside>
</template>

<script>
    export default {

        computed: {
            toggleSidebar() {
                return this.$store.getters['common/toggleSidebar']
            }
        }

    }
</script>


