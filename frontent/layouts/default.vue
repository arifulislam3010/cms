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
import Loader from '~/components/loader/Loader'
export default {
  components: {
    TopHeader,
    Header,
    TopHeader,
    MainNavbar,
    Footer,
    Loader
  },
 
  data() {
    return {
      show: false,
      title : 'Home',
      categories:[],
      loading: false,
      
      
      
    }
  },
  asyncData () {
    alert('aa');
    return axios.get(`/api/frontend/categories`)
    .then((res) => {
      return { categories: res.data }
    })
    .catch((e) => {
     alert('ss');
    })
  },
  mounted() {            
      this.getCategories();
  },
 
  // async asyncData () {
  //   const {data} = await axios.get('/api/frontend/categories')
  //   return {categories:data}
  // },

  methods: {
       getCategories(){
           axios.get('/api/frontend/categories').then((response) => {      
                  this.categories = response.data;

                }).catch(function (error) {

                });
        },
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
