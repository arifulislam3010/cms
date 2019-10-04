<template>
  <div>
    <header class="header-area">
    <!-- Top Header Area -->
    <top-header />

    <!-- Navbar Area -->
    
   <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

          <b-collapse id="nav-collapse" is-nav>
            
              <MainNavbar :categories = "categories"/>
          </b-collapse>
      </b-navbar>
      </div>
  </header>
    <div>
      <nuxt />
    </div>
    <Footer />
    
  </div>
</template>

<script>
import axios from '@/plugins/axios'
import Header from "~/components/Header"
import TopHeader from "~/components/TopHeader"
import MainNavbar from "~/components/MainNavbar"
import Footer from '@/components/Footer'
// import Loader from '~/components/loader/Loader'
export default {
  components: {
    TopHeader,
    Header,
    TopHeader,
    MainNavbar,
    Footer
  },
 
  data() {
    return {
      show: false,
      title : 'Home',
      
      // loading: false,
      
      
      
    }
  },

  async asyncData () {
    const {data} = await axios.get('/api/frontend/categories')
    return {categories:data}
  },

  methods: {
    toggleNavbar() {
      this.show = !this.show;
    }
  },

  
  
}
</script>

<style scoped>
a:hover {
  color: #ee002d;
}
</style>
