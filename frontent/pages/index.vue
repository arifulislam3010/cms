<template>
  <div class="c">
    <!-- <nuxt-link to="/about">Abouts</nuxt-link> -->

    <!-- <font-awesome-icon :icon="['fab', 'linkedin']"/> -->

      <div>
        <b-navbar toggleable="lg" type="dark" variant="info">
      <b-navbar-brand href="#">NavBar</b-navbar-brand>

        <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

          <b-collapse id="nav-collapse" is-nav>
            
              <MainNavbar :categories = "categories"/>
          </b-collapse>
      </b-navbar>
      </div>
    <hero/>
  
    <!-- ##### Featured Post Area Start ##### -->
    <div class="featured-post-area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="row">

                        <!-- Single Featured Post -->
                        <div class="col-12 col-lg-7" v-for="section in sections">
                            <div v-if="section.section_id == 1">
                              <div v-for="post in articles.slice(0,1)">
                                  <div class="single-blog-post featured-post" >
                                <div class="card" >
                                    <a href="#"><img src="@/assets/images/16.jpg" alt="" style="height: 250px; width: 400px;" class="card-body"></a>
                                </div>
                                <div class="post-data">
                                    
                                    <a href="#" class="post-title">
                                        <h4>{{post.headline}}</h4>
                                    </a>
                                    <div class="post-meta">
                                        <p class="post-excerp">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. <span style="color: red">details</span>.. </p>
                                        
                                    </div>
                                </div>
                            </div>
                              </div>
                              
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="single-blog-post small-featured-post d-flex" v-for="post in articles.slice(0,4)">
                                <div class="post-thumb">
                                  <a href="#"><img src="@/assets/images/16.jpg" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <div class="post-meta">
                                        <a href="#" class="post-title">
                                            <h6> {{post.headline}} </h6>
                                        </a>
                                        
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <!-- Single Featured Post -->
                        <b-carousel
                            id="carousel-fade"
                            style="text-shadow: 0px 0px 2px #000"
                            
                            fade
                            indicators
                            img-width="1024"
                            img-height="480"
                          >
                            <b-carousel-slide
                              caption="First slide"
                              img-src="https://picsum.photos/1024/480/?image=10"
                            ></b-carousel-slide>
                            <b-carousel-slide
                              caption="Second Slide"
                              img-src="https://picsum.photos/1024/480/?image=12"
                            ></b-carousel-slide>
                            <b-carousel-slide
                              caption="Third Slide"
                              img-src="https://picsum.photos/1024/480/?image=22"
                            ></b-carousel-slide>
                          </b-carousel>
                        <br>
                       <b-card no-body>
                        <b-tabs pills card>
                        <b-tab title="সর্বশেষ" active>
                            <div class="single-blog-post small-featured-post d-flex" v-for="post in articles.slice(0,3)">
                                    
                                    <div class="post-data">
                                        <div class="post-meta" >
                                            <a href="#" class="post-title">
                                                <h6>{{post.headline}}</h6>
                                            </a>
                                            
                                        </div>
                                    </div>
                                </div>
                        </b-tab>
                        
                        <b-tab title="আলোচিত"><b-card-text>Tab Contents 2</b-card-text></b-tab>
                        </b-tabs>
                    </b-card>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Featured Post Area End ##### -->
    
    <!-- ##### Popular News Area Start ##### -->
    <div class="popular-news-area ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="section-heading">
                        
                    </div>

                    <div class="row">

                        <!-- Single Post -->
                       <div class="col-12 col-md-4" v-for="post in articles">
                          <div class="single-blog-post style-3">
                              <div class="post-thumb">
                                  <a href="#"><img src="img/bg-img/12.jpg" alt=""></a>
                              </div>
                              <div class="post-data">
                                  <a href="#" class="post-catagory">Finance</a>
                                  <a href="#" class="post-title">
                                      <h6>{{post.headline}}</h6>
                                  </a>
                                  <div class="post-meta d-flex align-items-center">
                                      <a href="#" class="post-like"><img src="img/core-img/like.png" alt=""> <span>392</span></a>
                                      <a href="#" class="post-comment"><img src="img/core-img/chat.png" alt=""> <span>10</span></a>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                    </div>
                    <a href="" class="pull-right">More News...</a>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="section-heading">
                        
                    </div>
                    <!-- Popular News Widget -->
                    <div class=" mb-30">
                        <div class="card text-center">
                            <div class="card-header">
                                অনলাইন জরিপ
                            </div>
                            <div class="card-body">
                                 
                                     <h6>"এরশাদ শেখ হাসিনার গৃহপালিত নেতা ছিলেন- বিএনপি মহাসচিব মির্জা ফখরুল ইসলাম আলমগীরের এ মন্তব্যের সঙ্গে আপনি কি একমত?"</h6>
                                     <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">হ্যাঁ </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">না </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">মন্তব্য নেই </label>
                                    </div>
                              
                               
                            </div>
                            <div class="card-body">
                                <a href="#" class="card-link btn btn-primary">ভোট দিন</a>
    <a href="#" class="card-link btn btn-light">পুরোনো ফলাফল</a>
    
  </div>
                            <div class="card-footer text-muted">
                                
					ভোট দিয়েছেন <span>656</span>  জন 
                            </div>
                        </div>
                    </div>

                    <!-- Newsletter Widget -->
                    <div class="card">
                        <div class="card ">
                            <div class="card-header text-center">
                                পুরনো সংবাদ
                            </div>
                            <form action="#" method="post">
                                <OldNews />
                                <br>
                                <div class="text-center">
                                    <nuxt-link to="" class="btn btn-outline-primary">Search</nuxt-link>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <Loader v-if="loading"></Loader>
    </div>
    <!-- ##### Popular News Area End ##### -->
    <NewsBlock2 />
    <Footer />
    
<br>
<br>
<div v-for="post in categories">
  <h3>dgdg</h3>
<h2>{{post.id}}</h2>
</div>
<br>
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
import MainNavbar from "~/components/MainNavbar"
import Featured from '@/components/FeaturedPost/Featured.vue'
import Carousel1 from '@/components/carousels/Carousel1'
import NewsBlock1 from '@/components/home/NewsBlock1'
import NewsBlock2 from '@/components/home/NewsBlock2'
import Footer from '@/components/Footer'
// import Featured2 from './Featured2'
import FeaturedSmall from '@/components/FeaturedPost/FeaturedSmall'
import News from '@/components/home/News'
import OldNews from '@/components/OldNews'
// import Tab1 from '../tabs/Tab1'
// import Carousel1 from '../carousels/Carousel1'
export default {
  components: {
    Logo,Hero,Featured,Carousel1,NewsBlock1,NewsBlock2,Footer,FeaturedSmall,News,OldNews,MainNavbar
  },

  data() {
    return {
      title : 'Home',
      demo: {
        id : '',
        shoulder: '',
        headline: '',
        hanger: '',
        athor_id: '',
        reporter_id: '',
        featured_image_id: '',
        featured_video_id: '',
        video_position: '',
        share_at: '',
        published_at: '',
        status: '',
        Instant_article: '',
        created_by: ''
      },

      
      
    }
  },
  head() {
    return {
      title: this.title,
      meta: [
        // hid is used as unique identifier. Do not use `vmid` for it as it will not work
        {
          hid: "description",
          name: "description",
          content: "My custom description"
        }
      ]
    };
  },
  async asyncData ({ params }) {
    const ar = await axios.get('/api/frontend/posts');
    const cat = await axios.get('/api/frontend/categories');
    const se = await axios.get('/api/frontend/postSections');
    return {articles:ar.data, sections: se.data, categories: cat.data}
  },

  // async asyncSection () {
   
  //   const {section} = await axios.get('/api/frontend/postSections')
  //   return {sections:section}
  // },

//  async created(){
//       const config = {
//         headers: {
//           'Accept' : 'application/json'
//         }
//       }

//       try{
//         const res = await axios.get('/api/frontend/categories', config)

//         this.categories = res.data.results;
//       } catch(err){
//         console.log(err)
//       }

      
//   },

  
  methods:{
      //   async fetchSomething() {
      //   const ip = await this.$axios.$get('http://icanhazip.com')
      //   this.ip = ip
        
      
     
    },
    mounted(){
        // this.getResults()
        // this.fetchBranches();
        // this.getPermission()
    },
    computed: {
      ...mapGetters(['posts']),
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