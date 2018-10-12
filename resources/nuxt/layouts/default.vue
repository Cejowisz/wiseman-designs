<template>
    <div class="guest-container">
        <TheHeader @sidenavToggle="displaySidenav = !displaySidenav" />
        <TheSidenav
                :show="displaySidenav"
                @close="displaySidenav = false"/>
        <div class="nuxt">
            <nuxt/>
        </div>
        <TheFooter/>
    </div>
</template>

<script>
    import TheHeader from '~/components/guest-layout/TheHeader'
    import TheFooter from '~/components/guest-layout/TheFooter'
    import TheSidenav from '~/components/guest-layout/TheSidenav'
    export default {
        components: {
            TheHeader,
            TheSidenav,
            TheFooter
        },
        data() {
            return {
                displaySidenav: false
            }
        }
    }
</script>

<style>
    @import "../assets/css/style.css";
</style>
