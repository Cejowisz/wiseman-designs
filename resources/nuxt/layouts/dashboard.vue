<template>
    <div :class="[toggleSidebar ? mobileClass : desktopClass]">

        <dashboard-sidebar></dashboard-sidebar>

        <div class="dashboard-content">

            <dashboard-header></dashboard-header>

            <section>
                <nuxt/>
            </section>
        </div>

    </div>
</template>

<script>
    import DashboardHeader from '../components/dashboardLayout/header'
    import DashboardSidebar from '../components/dashboardLayout/sidebar'

    export default {

        components: {
            DashboardHeader,
            DashboardSidebar
        },

        data() {
            return {
                mobileClass: 'dashboard-container-mobile',
                desktopClass: 'dashboard-container'
            }
        },

        computed: {
            toggleSidebar() {
                return this.$store.getters['common/toggleSidebar']
            }
        }

    }
</script>

<style>
    @import "../assets/css/userDashboard.css";
</style>