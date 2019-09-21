<template>
  <div class="c">
    <!-- <nuxt-link to="/about">Abouts</nuxt-link> -->

    <!-- <font-awesome-icon :icon="['fab', 'linkedin']"/> -->
    <hero/>
    <Featured/>
    
    <NewsBlock1 />
    <NewsBlock2 />
    <Footer />
    <br>
    <br>
    <p>yyy</p>
    <div v-for="post in posts">
      <p> id = gfffffffffffgfggffgfg {{post.id}} </p>
    </div>

    <!-- <div>
      <section>
      <h1>GET API Result Index</h1>
      <div>
        <ul>
          <li v-for="article in articles" class="item">
            <nuxt-link :to="'/article/' + article.id">{{ article.title }}</nuxt-link>
          </li>
        </ul>
      </div>
    </section>
    </div> -->

  </div>
</template>

<script>
import axios from '@/plugins/axios'
import { mapState,mapGetters,mapActions } from "vuex"
import { All_POST} from '@/store/action.type'

import Logo from '@/components/Logo.vue'
import Hero from '@/components/Hero.vue'
import Featured from '@/components/FeaturedPost/Featured.vue'
import Carousel1 from '@/components/carousels/Carousel1'
import NewsBlock1 from '@/components/home/NewsBlock1'
import NewsBlock2 from '@/components/home/NewsBlock2'
import Footer from '@/components/Footer'

export default {
  components: {
    Logo,Hero,Featured,Carousel1,NewsBlock1,NewsBlock2,Footer
  },
  data() {
    return {
      title : 'Home'
    }
  },
  head () {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        { hid: 'description', name: 'description', content: 'My custom description' }
      ]
    }
  },

  // async asyncData () {
  //   const {data} = await axios.get('/api/posts')
  //   return {articles:data}
  // },

  methods:{
      //   async fetchSomething() {
      //   const ip = await this.$axios.$get('http://icanhazip.com')
      //   this.ip = ip
        
      // }

      // searchBranch(){
      //       this.loading = true
      //       var data = this.search
      //       var page = 1
      //       this.$store.dispatch('SEARCH_BRANCH',{page,data})
      //           .then(response=>{
      //               this.loading=false;
      //           })
      //           .catch(error=>{
      //               this.loading=true;
      //           });
      //   },
      // getResults(page =1){
      //       this.loading = true;
      //       var data = this.search
      //       if(data != ''){
      //           this.$store.dispatch('SEARCH_BRANCH',{page,data})
      //           .then(response=>{
      //               this.loading=false;
      //           })
      //           .catch(error=>{
      //               this.loading=true;
      //           });
      //       }
      //       else{
      //           alert('sss');
      //           this.$store.dispatch('All_BRANCH',page)
      //           .then(response=>{
      //               this.loading=false;
      //           })
      //           .catch(error=>{
      //               this.loading=true;
      //           });
      //       }
      //   },

     
    },
    mounted(){
        // this.getResults()
        // this.fetchBranches();
        // this.getPermission()

    },
    computed: {
      ...mapGetters(["posts"]),
    },

  //  created() {
  //    this.$store.dispatch('setPosts', this.loadedPosts)
  //  },
    

  // mounted() {
  //   this.$nextTick(function () {
      
     
  // })
  // }
}
</script>

<style scoped>
  .single-blog-post.featured-post .post-data .post-title h6 {
    font-size: 15px;
  }

  .pt-20 {
    padding-top: 20px;
  }
  
</style>
