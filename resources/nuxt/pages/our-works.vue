<template>
    <div class="service-container">
        <hi></hi>
        <div class="service-image">
            <img src="../assets/img/PRINTING_SERVICES.jpg" alt="wiseman services">
            <img src="../assets/img/PHOTOGRAPHY.jpg" alt="wiseman services">
            <img src="../assets/img/BRANDINGIDEA.jpg" alt="wiseman services">
            <img src="../assets/img/T_SHIRT_CUSTOMIZING.jpg" alt="wiseman services">
            <img src="../assets/img/CO_OPERATE_BRANDING.jpg" alt="wiseman services">
            <img src="../assets/img/SAFETY_SIGNS.jpg" alt="wiseman services">
        </div>
    </div>
</template>

<script>
    export default {

    }
</script>

<style scoped>
    .service-container{
        background-image: linear-gradient(293deg, #1F65DB 0%, #ED355B 100%);
    }
    .service-image{
        display: grid;
        grid-gap: 15px;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    }
</style>