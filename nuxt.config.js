const laravelNuxt = require("laravel-nuxt");

module.exports = laravelNuxt({
    // Options such as mode, srcDir and generate.dir are already handled for you.
    head: {

    },
    css: [
        '~/assets/css/bootstrap.css',
        '~/assets/font-awesome/css/font-awesome.min.css'
    ],
    build: {
        extractCSS: true,
        vendor: [
            '@nuxtjs/axios',
            // 'lodash'
        ]
    },
    modules: [
        '@nuxtjs/axios',
    ],

    router: {
        // middleware: 'main'
    },

    plugins: [
        // { src: '~/plugins/initialization', ssr: false }
    ],
});