<template>
    <div>
        <p>Dashboard</p>
    </div>
</template>

<script>
    export default {
        layout: 'dashboard',

        middleware: ['check-auth']
    }
</script>