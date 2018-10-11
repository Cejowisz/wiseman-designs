<template></template>

<script>
    export default {

        methods: {
            clearAll() {
                localStorage.clear()
                window.location.href = '/'
            }
        },

        mounted() {
            this.clearAll()
        }
    }
</script>