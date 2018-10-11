<template>
    <nav>
        <div class="left-dashboard-nav-item">
            <button @click="toggleSidebar">click</button>
            <p>Dashboard</p>
            <div>
                <input type="text" placeholder="search">
            </div>
        </div>
        <div class="right-dashboard-nav-item">
            <!--<img src="../../assets/img/user.png" alt="">-->
            <!--<img src="../../assets/img/user.png" alt="">-->
        </div>
    </nav>
</template>

<script>
    export default {

        methods: {
            toggleSidebar() {
                this.$store.dispatch('common/toggleSidebar')
            }
        }

    }
</script>