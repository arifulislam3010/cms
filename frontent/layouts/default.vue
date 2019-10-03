<template>
  <div>
    <header class="header-area">
    <!-- Top Header Area -->
    <top-header />

    <!-- Navbar Area -->
    
   
  </header>
    <div>
      <nuxt />
    </div>
    
    
  </div>
</template>

<script>
import axios from '@/plugins/axios'
import Header from "~/components/Header"
import TopHeader from "~/components/TopHeader"
import MainNavbar from "~/components/MainNavbar"
// import Loader from '~/components/loader/Loader'
export default {
  components: {
    TopHeader,
    Header,
    TopHeader,
    MainNavbar
  },
 
  data() {
    return {
      show: false,
      title : 'Home',
      
      // loading: false,
      
      
      
    }
  },

  // async asyncData () {
  //   const {data} = await axios.get('/api/frontend/categories')
  //   return {categories:data}
  // },

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
