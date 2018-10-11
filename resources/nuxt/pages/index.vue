<template>
    <div class="">
        <div class="home-banner">
            <h1>
                Discover and Book <br> Hair Salon Appointments
            </h1>
        </div>
    </div>
</template>

<script>
    export default {
    
        components: {
//            Search
        },

        methods: {
            async getDetails() {
                // Get all the purposes
                let data = await this.$axios.$get('/api/property-purpose')
                this.$store.dispatch('property/setAllPurposes', data)
            }
        },

        mounted() {
            // this.getDetails()
        }
    }
</script>

<style>
    header{
        background: #2e022d !important;
    }
    .header-container{
        height: 0 !important;
    }
    .home-banner{
        display: grid;
        grid-template: repeat(1, 650px) / repeat(auto-fit, minmax(300px, 12fr));
        grid-gap: 10px;
        background: url('../assets/img/back.jpg');
        background-size: cover;
        align-items: center;
        padding: 20px;
    }
    .search{
        grid-column: 1 / 3;
    }
</style>