
 export default {
     methods: {
         attachToken() {
             this.$store.$axios.onRequest((config) => {
                 config.headers.common['Authorization'] = `Bearer ${this.$store.getters['auth/token']}`
                 // return config
             })
         }
     }
 }