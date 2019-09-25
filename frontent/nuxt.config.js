const webpack = require("webpack");

export default {
  mode: 'universal',
  /*
  ** Headers of the page
  */
  head: {
    title: process.env.npm_package_name || '',
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      { hid: 'description', name: 'description', content: process.env.npm_package_description || '' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' },

    ],
    script: [
      { src: 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js' }
    ]
  },
  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },
  /*
  ** Global CSS
  */
  css: [
    '~/assets/css/style.css',
    // 'bootstrap',
    'bootstrap-vue',
    'jquery',
    // '~/assets/css/bootstrap.min.css',
    '~/assets/css/owl.carousel.min.css',
    '~/assets/css/animate.css',
    '~/assets/css/magnific-popup.css',
    '~/assets/css/custom-icon.css',
    '~/assets/css/classy-nav.min.css',
    '~/assets/css/nice-select.min.css',
    '~/assets/css/owl.carousel.min.css',
  ],
  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    '~/plugins/vue-jquery'
  ],
  /*
  ** Nuxt.js dev-modules
  */
  buildModules: [
  ],
  /*
  ** Nuxt.js modules
  */
  modules: [
    // Doc: https://bootstrap-vue.js.org/docs/
    'bootstrap-vue/nuxt',
      [
        'nuxt-fontawesome', {
          imports: [
          {
            set: '@fortawesome/free-solid-svg-icons',
            icons: ['fas']
          },
          {
            set:'@fortawesome/free-brands-svg-icons',
            icons: ['fab']
          }
        ]
        }
    ]
  ],
  /*
  ** Build configuration
  */
  build: {
     /**
     * add external plugins
     */
    vendor: ["jquery"],
    plugins: [
      new webpack.ProvidePlugin({
        $: "jquery"
      })
    ],
    /*
    ** You can extend webpack config here
    */
    extend (config, ctx) {
    }
  }
}