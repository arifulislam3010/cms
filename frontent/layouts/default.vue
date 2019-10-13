<template>
  <div>
    <header class="header-area">
    <!-- Top Header Area -->
    <top-header />

    <!-- Navbar Area -->
    
   <div>
        <b-navbar toggleable="lg" type="dark" variant="danger">
          <div class="container">
                    <b-navbar-nav>
                      <nuxt-link to="/" style="color: #fff; font-size: 17px;" class="btn btn-danger">Home</nuxt-link>
                    </b-navbar-nav>

                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

                  <b-collapse id="nav-collapse" is-nav>
                    
                      <div v-if="!isHidden">
                        <MainNavbar :categories = "categories"/>
                      </div>

                      <form class="form-inline ml-auto" v-show="isHidden">
                          
                              <div class="input-group mb-2 mr-sm-2">
                                
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2" placeholder="search.." style="height:45px;font-size:14pt; width:800px;">
                                <div class="input-group-prepend">
                                  <div class="input-group-text">
                                      <div class="pointer">
                                        <font-awesome-icon :icon="['fas', 'search']"/>
                                      </div>
                                  </div>
                                  <div class="input-group-text" style="margin-left: 5px;" @click="isHidden = !isHidden">
                                      <div class="pointer">
                                        <font-awesome-icon :icon="['fas', 'times']"/>
                                      </div>
                                  </div>
                                </div>
                              </div>
                           
                      </form>

                      <!-- Right aligned nav items -->
                          <b-navbar-nav class="ml-auto" @click="isHidden = !isHidden">
                
                                <div class="bg-danger text-light" style="cursor: pointer; font-size: 25px" v-if="!isHidden">
                                  <font-awesome-icon :icon="['fas', 'search']"/>
                                </div>
                
                    
                          </b-navbar-nav>
                  </b-collapse>
          </div>
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
      
      isHidden: false,
      crossHide: true
      
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

.pointer{
  cursor: pointer;
}


</style>
